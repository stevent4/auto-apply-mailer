<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    /**
     * Tampilkan daftar template milik user (+ template default sistem).
     */
    public function index(Request $request)
    {
        $type = $request->query('type'); // 'email' | 'pdf' | null (semua)

        $templates = Template::query()
            ->where(function ($q) {
                $q->where('user_id', Auth::id())
                    ->orWhereNull('user_id'); // ikut sertakan template bawaan sistem
            })
            ->when($type, fn($q) => $q->where('type', $type))
            ->orderByDesc('is_default')
            ->orderBy('name')
            ->get();

        $variableGroups = [
            'Pelamar'    => ['nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'email', 'phone', 'pendidikan'],
            'Lowongan'   => ['posisi', 'perusahaan'],
            'Waktu'      => ['kota', 'tanggal'],
            // 'Optional'   => ['cv_link', 'hrd_email'],
        ];

        return view('templates.index', compact('templates', 'variableGroups'));
    }

    /**
     * Simpan template baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'type'     => ['required', 'in:email,pdf'],
            'category' => ['nullable', 'string', 'max:50'],
            'subject'  => ['nullable', 'string', 'max:255'],
            'body'     => ['required', 'string'],
        ]);

        $validated['user_id'] = Auth::id();

        $template = Template::create($validated);

        return redirect()
            ->route('templates.index')
            ->with('success', "Template '{$template->name}' berhasil dibuat.");
    }

    /**
     * Update template yang sudah ada.
     */
    public function update(Request $request, Template $template)
    {
        $this->authorizeOwnership($template);

        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:50'],
            'subject'  => ['nullable', 'string', 'max:255'],
            'body'     => ['required', 'string'],
            // 'type' sengaja tidak boleh diubah setelah dibuat,
            // supaya tidak merusak relasi/histori.
        ]);

        $template->update($validated);

        return redirect()
            ->route('templates.index')
            ->with('success', "Template '{$template->name}' berhasil diperbarui.");
    }

    /**
     * Hapus template.
     */
    public function destroy(Template $template)
    {
        $this->authorizeOwnership($template);

        $name = $template->name;
        $template->delete();

        return redirect()
            ->route('templates.index')
            ->with('success', "Template '{$name}' berhasil dihapus.");
    }

    /**
     * Jadikan template ini default untuk type-nya.
     */
    public function setDefault(Template $template)
    {
        $this->authorizeOwnership($template);

        $template->makeDefault();

        return redirect()
            ->route('templates.index')
            ->with('success', "Template '{$template->name}' dijadikan default.");
    }

    /**
     * Pastikan user hanya bisa edit/hapus template miliknya sendiri,
     * bukan template bawaan sistem (user_id null) atau milik user lain.
     */
    protected function authorizeOwnership(Template $template): void
    {
        abort_if(
            $template->user_id !== Auth::id(),
            403,
            'Anda tidak memiliki akses ke template ini.'
        );
    }
}
