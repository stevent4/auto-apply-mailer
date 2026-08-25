-- MySQL dump 10.13  Distrib 8.4.11, for Linux (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.4.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `application_histories`
--

DROP TABLE IF EXISTS `application_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `email_hrd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Terkirim',
  PRIMARY KEY (`id`),
  KEY `application_histories_user_id_index` (`user_id`),
  CONSTRAINT `application_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_histories`
--

LOCK TABLES `application_histories` WRITE;
/*!40000 ALTER TABLE `application_histories` DISABLE KEYS */;
INSERT INTO `application_histories` VALUES (1,NULL,'achoslah@gmail.com','PT Wahana','STAFF LOGISTIK','STAFF LOGISTIK - Stevent - Jombang','2026-08-25 14:42:56','2026-08-25 14:42:56','Terkirim');
/*!40000 ALTER TABLE `application_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_replies`
--

DROP TABLE IF EXISTS `feedback_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_replies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feedback_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_replies_feedback_id_foreign` (`feedback_id`),
  KEY `feedback_replies_user_id_foreign` (`user_id`),
  CONSTRAINT `feedback_replies_feedback_id_foreign` FOREIGN KEY (`feedback_id`) REFERENCES `feedbacks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `feedback_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_replies`
--

LOCK TABLES `feedback_replies` WRITE;
/*!40000 ALTER TABLE `feedback_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedbacks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `type` enum('feedback','report') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'feedback',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenshot_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','in_progress','resolved','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `related_application_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedbacks_user_id_foreign` (`user_id`),
  KEY `feedbacks_related_application_id_foreign` (`related_application_id`),
  CONSTRAINT `feedbacks_related_application_id_foreign` FOREIGN KEY (`related_application_id`) REFERENCES `application_histories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `feedbacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `google_accounts`
--

DROP TABLE IF EXISTS `google_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `google_accounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci,
  `refresh_token` text COLLATE utf8mb4_unicode_ci,
  `token_expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `google_accounts_user_id_unique` (`user_id`),
  UNIQUE KEY `google_accounts_google_id_unique` (`google_id`),
  CONSTRAINT `google_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `google_accounts`
--

LOCK TABLES `google_accounts` WRITE;
/*!40000 ALTER TABLE `google_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `google_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_08_17_122040_create_application_histories_table',1),(5,'2026_08_17_123749_add_status_to_application_histories_table',1),(6,'2026_08_17_175748_add_profile_fields_to_users_table',1),(7,'2026_08_17_181826_create_templates_table',1),(8,'2026_08_17_214055_create_google_accounts_table',1),(9,'2026_08_17_231737_add_user_id_to_application_histories_table',1),(10,'2026_08_18_034546_add_profile_completed_to_users_table',1),(11,'2026_08_25_095457_add_role_to_users_table',1),(12,'2026_08_25_102051_create_feedbacks_table',1),(13,'2026_08_25_102053_create_feedback_replies_table',1),(14,'2026_08_25_102055_create_system_logs_table',1),(15,'2026_08_25_140645_add_status_to_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1kaeq1ATtEf33pwfY94baOqgdHCn0ZYXAaPoSYPa',1,'172.19.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJpcFNSUVpOWkZ2N1RiRkNxOENWc3VnVFVVMFhhbXNScmtvZ2RlSzBPIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0XC9hZG1pblwvdXNlcnMiLCJyb3V0ZSI6ImFkbWluLnVzZXJzLmluZGV4In0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1787671695);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_logs`
--

DROP TABLE IF EXISTS `system_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level` enum('info','warning','error') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'info',
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `system_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_logs`
--

LOCK TABLES `system_logs` WRITE;
/*!40000 ALTER TABLE `system_logs` DISABLE KEYS */;
INSERT INTO `system_logs` VALUES (1,'info','application_sent','Lamaran dikirim ke ',NULL,'2026-08-25 14:42:56','2026-08-25 14:42:56');
/*!40000 ALTER TABLE `system_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `templates_type_category_index` (`type`,`category`),
  KEY `templates_user_id_type_index` (`user_id`,`type`),
  CONSTRAINT `templates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES (1,NULL,'Formal Profesional','email','formal','Lamaran {{posisi}} - {{nama}}','Yth. HRD / Tim Rekrutmen {{perusahaan}},\n\nPerkenalkan, nama saya {{nama}}. Menanggapi informasi mengenai lowongan pekerjaan yang sedang dibuka, saya bermaksud mengajukan lamaran untuk posisi {{posisi}} di perusahaan yang Bapak/Ibu pimpin.\n\nSaya memiliki latar belakang pendidikan {{pendidikan}} dan memiliki ketertarikan untuk mengembangkan kemampuan serta memberikan kontribusi terbaik melalui posisi tersebut.\n\nSaya memiliki kemampuan yang relevan dengan kebutuhan pekerjaan dan siap mengikuti seluruh proses seleksi yang ditetapkan oleh perusahaan.\n\nSebagai bahan pertimbangan Bapak/Ibu, saya telah melampirkan Curriculum Vitae (CV) beserta dokumen pendukung lainnya pada email ini.\n\nSaya sangat mengharapkan kesempatan untuk dapat mengikuti tahapan seleksi dan wawancara agar dapat menjelaskan kemampuan serta pengalaman yang saya miliki secara lebih lanjut.\n\nTerima kasih atas waktu dan perhatian Bapak/Ibu.\n\nHormat saya,\n{{nama}}\n{{phone}}\n{{email}}',1,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(2,NULL,'Singkat & Profesional','email','simple','Lamaran Pekerjaan - {{posisi}} - {{nama}}','Yth. HRD {{perusahaan}},\n\nPerkenalkan, saya {{nama}}.\n\nSaya bermaksud mengajukan lamaran pekerjaan untuk posisi {{posisi}} di perusahaan Bapak/Ibu.\n\nSaya memiliki latar belakang pendidikan {{pendidikan}} dan siap mengikuti proses rekrutmen serta memberikan kontribusi terbaik apabila diberikan kesempatan.\n\nSebagai bahan pertimbangan, saya melampirkan CV dan dokumen pendukung pada email ini.\n\nTerima kasih atas perhatian Bapak/Ibu.\n\nHormat saya,\n{{nama}}\n{{phone}}\n{{email}}',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(3,NULL,'Fresh Graduate','email','fresh_graduate','Lamaran {{posisi}} - Fresh Graduate - {{nama}}','Yth. HRD / Tim Rekrutmen {{perusahaan}},\n\nPerkenalkan, saya {{nama}}, lulusan {{pendidikan}}.\n\nSaya mengetahui adanya kesempatan untuk posisi {{posisi}} dan bermaksud mengajukan lamaran untuk posisi tersebut.\n\nSebagai fresh graduate, saya memiliki semangat belajar yang tinggi, mampu beradaptasi dengan lingkungan baru, serta memiliki keinginan untuk terus mengembangkan kemampuan yang saya miliki.\n\nSaya berharap mendapatkan kesempatan untuk mengikuti proses seleksi dan membuktikan kemampuan saya secara langsung.\n\nCV dan dokumen pendukung telah saya lampirkan sebagai bahan pertimbangan.\n\nTerima kasih atas waktu dan perhatian Bapak/Ibu.\n\nHormat saya,\n{{nama}}\n{{phone}}\n{{email}}',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(4,NULL,'IT / Programmer','email','it','Application for {{posisi}} - {{nama}}','Yth. HRD / Recruitment Team {{perusahaan}},\n\nPerkenalkan, saya {{nama}}, dengan latar belakang pendidikan {{pendidikan}}.\n\nSaya bermaksud mengajukan lamaran untuk posisi {{posisi}} di perusahaan Bapak/Ibu.\n\nSaya memiliki ketertarikan pada bidang teknologi dan pengembangan sistem, serta memiliki kemampuan untuk mempelajari teknologi baru sesuai dengan kebutuhan pekerjaan.\n\nSaya juga memiliki kemampuan pengolahan data dan terbiasa menggunakan berbagai tools pendukung pekerjaan.\n\nCV dan dokumen pendukung telah saya lampirkan pada email ini sebagai bahan pertimbangan.\n\nSaya sangat terbuka untuk mengikuti technical test, interview, maupun tahapan seleksi lainnya.\n\nTerima kasih atas perhatian Bapak/Ibu.\n\nHormat saya,\n{{nama}}\n{{phone}}\n{{email}}',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(5,NULL,'Formal Standar','pdf','formal',NULL,'<div style=\"font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.6;\">\n\n    <div style=\"text-align: right; margin-bottom: 20px;\">\n        {{kota}}, {{tanggal}}\n    </div>\n\n    <table style=\"margin-bottom: 20px; border-collapse: collapse;\">\n\n        <tr>\n            <td style=\"width: 80px;\">Hal</td>\n            <td style=\"width: 15px;\">:</td>\n            <td>Lamaran Pekerjaan</td>\n        </tr>\n\n        <tr>\n            <td>Lampiran</td>\n            <td>:</td>\n            <td>-</td>\n        </tr>\n\n    </table>\n\n    <p>\n        Yth. HRD <strong>{{perusahaan}}</strong>\n    </p>\n\n    <p>\n        Dengan Hormat,\n    </p>\n\n    <p>\n        Saya yang bertanda tangan di bawah ini:\n    </p>\n\n    <table style=\"margin-left: 30px; border-collapse: collapse;\">\n\n        <tr>\n            <td style=\"width: 170px;\">Nama</td>\n            <td style=\"width: 15px;\">:</td>\n            <td>{{nama}}</td>\n        </tr>\n\n        <tr>\n            <td>Tempat, Tanggal Lahir</td>\n            <td>:</td>\n            <td>{{tempat_lahir}}, {{tanggal_lahir}}</td>\n        </tr>\n\n        <tr>\n            <td>Pendidikan</td>\n            <td>:</td>\n            <td>{{pendidikan}}</td>\n        </tr>\n\n        <tr>\n            <td>Alamat</td>\n            <td>:</td>\n            <td>{{alamat}}</td>\n        </tr>\n\n        <tr>\n            <td>No. HP</td>\n            <td>:</td>\n            <td>{{phone}}</td>\n        </tr>\n\n        <tr>\n            <td>Email</td>\n            <td>:</td>\n            <td>{{email}}</td>\n        </tr>\n\n    </table>\n\n    <p style=\"text-align: justify;\">\n        Dengan segala hormat, saya bermaksud mengajukan lamaran pekerjaan\n        di perusahaan yang dipimpin oleh Bapak/Ibu sebagai\n        <strong>{{posisi}}</strong>.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya memiliki latar belakang pendidikan {{pendidikan}}\n        dan memiliki motivasi untuk memberikan kontribusi terbaik\n        bagi perusahaan.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Sebagai bahan pertimbangan, bersama surat ini saya melampirkan\n        dokumen pendukung yang diperlukan.\n    </p>\n\n    <ol style=\"padding-left: 24px;\">\n        <li>Riwayat Hidup</li>\n        <li>Pas Foto</li>\n        <li>KTP</li>\n        <li>KK</li>\n        <li>SKCK</li>\n        <li>Fotokopi Ijazah</li>\n        <li>Fotokopi Transkrip Nilai</li>\n    </ol>\n\n    <p style=\"text-align: justify;\">\n        Demikian surat lamaran ini saya buat.\n        Atas perhatian dan pertimbangan Bapak/Ibu,\n        saya ucapkan terima kasih.\n    </p>\n\n    <table style=\"width: 100%; margin-top: 40px;\">\n        <tr>\n            <td style=\"width: 65%;\"></td>\n\n            <td style=\"width: 35%; text-align: center;\">\n                Hormat saya,\n                <br><br><br><br><br>\n                ({{nama}})\n            </td>\n        </tr>\n    </table>\n\n</div>',1,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(6,NULL,'Profesional Modern','pdf','professional',NULL,'<div style=\"font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.65;\">\n\n    <div style=\"text-align: right; margin-bottom: 25px;\">\n        {{kota}}, {{tanggal}}\n    </div>\n\n    <p>\n        Kepada Yth.<br>\n        <strong>HRD {{perusahaan}}</strong>\n    </p>\n\n    <p>\n        Dengan Hormat,\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Perkenalkan, saya <strong>{{nama}}</strong>,\n        lulusan <strong>{{pendidikan}}</strong>.\n        Melalui surat ini saya ingin mengajukan lamaran untuk posisi\n        <strong>{{posisi}}</strong> di perusahaan Bapak/Ibu.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya memiliki semangat belajar, kemampuan beradaptasi,\n        serta motivasi untuk berkembang dan memberikan kontribusi\n        positif terhadap perusahaan.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Bersama surat ini saya melampirkan CV dan dokumen pendukung\n        sebagai bahan pertimbangan.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya berharap dapat diberikan kesempatan untuk mengikuti\n        proses seleksi lebih lanjut.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Demikian surat lamaran ini saya sampaikan.\n        Terima kasih atas perhatian Bapak/Ibu.\n    </p>\n\n    <table style=\"width: 100%; margin-top: 45px;\">\n        <tr>\n            <td style=\"width: 65%;\"></td>\n\n            <td style=\"width: 35%; text-align: center;\">\n                Hormat saya,\n                <br><br><br><br><br>\n                <strong>{{nama}}</strong>\n            </td>\n        </tr>\n    </table>\n\n</div>',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(7,NULL,'Fresh Graduate','pdf','fresh_graduate',NULL,'<div style=\"font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.65;\">\n\n    <div style=\"text-align: right; margin-bottom: 20px;\">\n        {{kota}}, {{tanggal}}\n    </div>\n\n    <p>\n        Yth. HRD <strong>{{perusahaan}}</strong>\n    </p>\n\n    <p>\n        Dengan Hormat,\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya yang bertanda tangan di bawah ini:\n    </p>\n\n    <table style=\"margin-left: 30px; border-collapse: collapse;\">\n\n        <tr>\n            <td style=\"width: 170px;\">Nama</td>\n            <td style=\"width: 15px;\">:</td>\n            <td>{{nama}}</td>\n        </tr>\n\n        <tr>\n            <td>Pendidikan</td>\n            <td>:</td>\n            <td>{{pendidikan}}</td>\n        </tr>\n\n        <tr>\n            <td>Alamat</td>\n            <td>:</td>\n            <td>{{alamat}}</td>\n        </tr>\n\n        <tr>\n            <td>No. HP</td>\n            <td>:</td>\n            <td>{{phone}}</td>\n        </tr>\n\n        <tr>\n            <td>Email</td>\n            <td>:</td>\n            <td>{{email}}</td>\n        </tr>\n\n    </table>\n\n    <p style=\"text-align: justify;\">\n        Dengan ini saya bermaksud mengajukan lamaran pekerjaan\n        sebagai <strong>{{posisi}}</strong>.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Sebagai lulusan {{pendidikan}}, saya memiliki semangat belajar\n        yang tinggi dan siap mengembangkan kemampuan melalui pengalaman\n        profesional di perusahaan Bapak/Ibu.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya siap mengikuti seluruh tahapan seleksi yang ditetapkan\n        perusahaan dan berharap mendapat kesempatan untuk bergabung\n        serta memberikan kontribusi terbaik.\n    </p>\n\n    <p>\n        Terima kasih atas perhatian Bapak/Ibu.\n    </p>\n\n    <table style=\"width: 100%; margin-top: 40px;\">\n        <tr>\n            <td style=\"width: 65%;\"></td>\n\n            <td style=\"width: 35%; text-align: center;\">\n                Hormat saya,\n                <br><br><br><br><br>\n                <strong>{{nama}}</strong>\n            </td>\n        </tr>\n    </table>\n\n</div>',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(8,NULL,'Surat Lamaran Lengkap','pdf','formal_lengkap',NULL,'<div style=\"\n    font-family: Arial, Helvetica, sans-serif;\n    font-size: 12pt;\n    line-height: 1.4;\n    color: #111;\n\">\n\n    <!-- TANGGAL -->\n    <div style=\"\n        text-align: right;\n        margin-top: 0;\n        margin-bottom: 10px;\n    \">\n        {{kota}}, {{tanggal}}\n    </div>\n\n    <!-- PERIHAL -->\n    <table style=\"\n        border-collapse: collapse;\n        margin-top: 0;\n        margin-bottom: 10px;\n    \">\n        <tr>\n            <td style=\"width: 80px; padding: 0;\">\n                Hal\n            </td>\n\n            <td style=\"width: 15px; padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                Lamaran Pekerjaan\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Lampiran\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                -\n            </td>\n        </tr>\n    </table>\n\n    <!-- TUJUAN -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n    \">\n        Yth. HRD <strong>{{perusahaan}}</strong>\n    </p>\n\n    <!-- SALAM -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 0px;\n    \">\n        Dengan Hormat,\n    </p>\n\n    <!-- PEMBUKA -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        text-align: justify;\n    \">\n        Saya yang bertanda tangan di bawah ini:\n    </p>\n\n    <!-- BIODATA -->\n    <table style=\"\n        border-collapse: collapse;\n        margin-top: 0;\n        margin-left: 30px;\n        margin-bottom: 10px;\n    \">\n\n        <tr>\n            <td style=\"\n                width: 170px;\n                padding: 0;\n            \">\n                Nama\n            </td>\n\n            <td style=\"\n                width: 15px;\n                padding: 0;\n            \">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{nama}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Tempat, Tanggal Lahir\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{tempat_lahir}}, {{tanggal_lahir}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Pendidikan\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{pendidikan}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Alamat\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{alamat}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                No. HP\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{phone}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Email\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{email}}\n            </td>\n        </tr>\n\n    </table>\n\n    <!-- PARAGRAF 1 -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        text-align: justify;\n    \">\n        Dengan segala hormat, saya ingin mengajukan lamaran pekerjaan\n        di perusahaan yang dipimpin oleh Bapak/Ibu sebagai\n        <strong>{{posisi}}</strong>.\n        Saya sangat antusias untuk bergabung dengan tim\n        <strong>{{perusahaan}}</strong> dan berkontribusi dalam mencapai\n        visi dan misi yang telah ditetapkan.\n    </p>\n\n    <!-- PARAGRAF 2 -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        text-align: justify;\n    \">\n        Bersama dengan surat lamaran ini, saya melampirkan semua\n        dokumen yang relevan dan berharap agar diberikan kesempatan\n        untuk mengikuti proses seleksi lebih lanjut.\n    </p>\n\n    <!-- PARAGRAF 3 -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        text-align: justify;\n    \">\n        Terima kasih atas perhatian Bapak/Ibu, sebagai bahan\n        pertimbangan bersama ini saya lampirkan:\n    </p>\n\n    <!-- LAMPIRAN -->\n    <ol style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        padding-left: 28px;\n        line-height: 1.35;\n    \">\n\n        <li style=\"margin: 0; padding: 0;\">\n            Riwayat Hidup\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            Pas Foto\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            KTP\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            KK\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            SKCK\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            Fotokopi Ijazah\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            Fotokopi Transkrip Nilai\n        </li>\n\n    </ol>\n\n    <!-- PENUTUP -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 6px;\n        text-align: justify;\n    \">\n        Demikian surat lamaran ini saya buat.\n        Atas perhatian dan pertimbangan Ibu/Bapak,\n        saya ucapkan terima kasih.\n    </p>\n\n    <!-- TANDA TANGAN -->\n    <table style=\"\n        width: 100%;\n        border-collapse: collapse;\n        margin-top: 25px;\n    \">\n\n        <tr>\n\n            <td style=\"\n                width: 65%;\n                padding: 0;\n            \">\n            </td>\n\n            <td style=\"\n                width: 35%;\n                padding: 0;\n                text-align: center;\n                vertical-align: top;\n            \">\n\n                Hormat saya,\n\n                <br>\n                <br>\n                <br>\n                <br>\n\n                <strong>\n                    {{nama}}\n                </strong>\n\n            </td>\n\n        </tr>\n\n    </table>\n\n</div>',0,'2026-08-25 14:38:37','2026-08-25 14:38:37');
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_completed` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','test@example.com','admin','Kediri','2026-08-27','S1 Peternakan','assas','6289620276245',0,'2026-08-25 14:38:37','$2y$12$0jvrD3wm2oJQENyvLjnrLehsyyKCTJnZFReH3dU36OJAbeasifhby','U9yDqaz6ZtqiipljBzuun65F5okWwJnA7vE7xmcz7EaGBfL5eHhlW3jzm8Eq','2026-08-25 14:38:37','2026-08-25 14:41:09','active');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-25 15:45:18
