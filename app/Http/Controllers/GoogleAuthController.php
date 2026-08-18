<?php

namespace App\Http\Controllers;

use App\Models\GoogleAccount;
use Google\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        $client = new Client();

        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));

        $client->setAccessType('offline');
        $client->setPrompt('consent');

        $client->addScope(
            'https://www.googleapis.com/auth/gmail.send'
        );

        $client->addScope(
            'https://www.googleapis.com/auth/userinfo.email'
        );

        return redirect()->away(
            $client->createAuthUrl()
        );
    }

    public function callback(): RedirectResponse
    {
        if (!request()->has('code')) {
            return redirect()
                ->route('profile.edit')
                ->withErrors([
                    'google' => 'Google OAuth dibatalkan atau gagal.'
                ]);
        }

        $client = new Client();

        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));

        $token = $client->fetchAccessTokenWithAuthCode(
            request()->get('code')
        );

        if (isset($token['error'])) {
            return redirect()
                ->route('profile.edit')
                ->withErrors([
                    'google' => 'Gagal mendapatkan token Google.'
                ]);
        }

        $client->setAccessToken($token);

        /*
        |--------------------------------------------------------------------------
        | AMBIL EMAIL GOOGLE
        |--------------------------------------------------------------------------
        */

        $response = Http::withToken(
            $token['access_token']
        )->get(
            'https://www.googleapis.com/oauth2/v2/userinfo'
        );

        if (!$response->successful()) {
            return redirect()
                ->route('profile.edit')
                ->withErrors([
                    'google' => 'Gagal mengambil informasi akun Google.'
                ]);
        }

        $googleUser = $response->json();

        /*
        |--------------------------------------------------------------------------
        | SIMPAN / UPDATE GOOGLE ACCOUNT
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();

        $expiresIn = $token['expires_in'] ?? 3600;

        $data = [
            'google_id' => $googleUser['id'],
            'google_email' => $googleUser['email'],
            'access_token' => $token['access_token'],
            'token_expires_at' => now()->addSeconds($expiresIn),
        ];

        /*
        |--------------------------------------------------------------------------
        | REFRESH TOKEN
        |--------------------------------------------------------------------------
        |
        | Google biasanya hanya memberikan refresh_token
        | ketika consent diberikan.
        |
        */

        if (!empty($token['refresh_token'])) {
            $data['refresh_token'] = $token['refresh_token'];
        }

        // If the User model does not define a googleAccount relationship,
        // use the GoogleAccount model directly to create or update the record.
        $existingGoogleAccount = GoogleAccount::where(
            'google_id',
            $googleUser['id']
        )->first();

        if (
            $existingGoogleAccount &&
            $existingGoogleAccount->user_id !== $user->id
        ) {
            return redirect()
                ->route('profile.edit')
                ->withErrors([
                    'google' => 'Gmail ini sudah terhubung dengan akun pengguna lain.',
                ]);
        }

        $data = [
            'google_id' => $googleUser['id'],
            'google_email' => $googleUser['email'],
            'access_token' => $token['access_token'],
            'token_expires_at' => now()->addSeconds($token['expires_in']),
        ];

        if (!empty($token['refresh_token'])) {
            $data['refresh_token'] = $token['refresh_token'];
        }

        if ($existingGoogleAccount) {
            $existingGoogleAccount->update($data);
        } else {
            GoogleAccount::create([
                'user_id' => $user->id,
                ...$data,
            ]);
        }

        return redirect()
            ->route('profile.edit')
            ->with(
                'success',
                "Gmail {$googleUser['email']} berhasil terhubung."
            );
    }

    public function disconnect(): RedirectResponse
    {
        $user = Auth::user();

        $googleAccount = GoogleAccount::where('user_id', $user->id)->first();

        if ($googleAccount) {
            $googleAccount->delete();
        }

        return redirect()
            ->route('profile.edit')
            ->with(
                'success',
                'Gmail berhasil diputuskan.'
            );
    }
}
