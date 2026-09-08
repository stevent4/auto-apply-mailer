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
  `email_template_id` bigint unsigned DEFAULT NULL,
  `cover_letter_template_id` bigint unsigned DEFAULT NULL,
  `email_hrd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` longtext COLLATE utf8mb4_unicode_ci,
  `cover_letter_body` longtext COLLATE utf8mb4_unicode_ci,
  `cover_letter_pdf_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Terkirim',
  PRIMARY KEY (`id`),
  KEY `application_histories_user_id_index` (`user_id`),
  KEY `application_histories_email_template_id_foreign` (`email_template_id`),
  KEY `application_histories_cover_letter_template_id_foreign` (`cover_letter_template_id`),
  CONSTRAINT `application_histories_cover_letter_template_id_foreign` FOREIGN KEY (`cover_letter_template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL,
  CONSTRAINT `application_histories_email_template_id_foreign` FOREIGN KEY (`email_template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL,
  CONSTRAINT `application_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_histories`
--

LOCK TABLES `application_histories` WRITE;
/*!40000 ALTER TABLE `application_histories` DISABLE KEYS */;
INSERT INTO `application_histories` VALUES (1,NULL,NULL,NULL,'achoslah@gmail.com','PT Wahana','STAFF LOGISTIK','STAFF LOGISTIK - Stevent - Jombang',NULL,NULL,NULL,'2026-08-25 14:42:56','2026-08-25 14:42:56','Terkirim'),(2,4,NULL,NULL,'ahmadstevent3@gmail.com','PT Wahana','STAFF ADMIN','Staff Admin - Stevent - Jombang',NULL,NULL,NULL,'2026-09-07 16:31:10','2026-09-07 16:31:10','Terkirim'),(3,4,NULL,NULL,'ahmadstevent3@gmail.com','PT Anjay','FINANCE','Finance - Stevent - Jombang',NULL,NULL,NULL,'2026-09-07 16:37:41','2026-09-07 16:37:41','Terkirim'),(4,4,NULL,NULL,'ahmadstevent3@gmail.com','PT Mekar Sari','BACKEND DEVELOPER','Backend Developer - Stevent - Jombang',NULL,NULL,NULL,'2026-09-07 16:51:12','2026-09-07 16:51:12','Terkirim'),(5,4,NULL,NULL,'ahmadstevent3@gmail.com','PT ABC','STAFF ADMIN','Staff Admin - Stevent - Jombang',NULL,NULL,NULL,'2026-09-07 17:06:45','2026-09-07 17:06:45','Terkirim'),(6,4,NULL,NULL,'ahmadstevent3@gmail.com','PT Testing','STAFF LOGISTIK','Staff Logistik - Stevent - Jombang',NULL,NULL,NULL,'2026-09-07 17:20:23','2026-09-07 17:20:23','Terkirim'),(7,4,NULL,NULL,'ahmadstevent3@gmail.com','PT Mekar Sari','STAFF ADMIN','Staff Admin - Stevent - Jombang',NULL,NULL,NULL,'2026-09-07 18:56:08','2026-09-07 18:56:08','Terkirim'),(8,4,NULL,NULL,'ahmadstevent3@gmail.com','PT Testing','STAFF LOGISTIK','Staff Logistik - Stevent - Jombang',NULL,NULL,NULL,'2026-09-07 19:17:39','2026-09-07 19:17:39','Terkirim'),(9,4,NULL,NULL,'ahmadstevent3@gmail.com','PT Mekar Sari','FINANCE','Finance - Stevent - Jombang',NULL,NULL,NULL,'2026-09-07 19:28:49','2026-09-07 19:28:49','Terkirim'),(10,4,NULL,NULL,'achoslah@gmail.com','PT Mekar Sari','BACKEND DEVELOPER','BACKEND DEVELOPER - Stevent - Jombang',NULL,NULL,NULL,'2026-09-07 19:32:47','2026-09-07 19:32:47','Terkirim'),(11,4,NULL,NULL,'ahmadstevent3@gmail.com','PT Anjay','STAFF LOGISTIK','Staff Logistik_Stevent',NULL,NULL,NULL,'2026-09-08 04:27:03','2026-09-08 04:27:03','Terkirim');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `google_accounts`
--

LOCK TABLES `google_accounts` WRITE;
/*!40000 ALTER TABLE `google_accounts` DISABLE KEYS */;
INSERT INTO `google_accounts` VALUES (2,4,'112536023636358444375','blastofams@gmail.com','eyJpdiI6ImpBeHJxZjhnb2NQTjZ0alBaclU4dWc9PSIsInZhbHVlIjoiQm5KNlN0WHIxR3V0SUVSVkp4ZVM0bWpjVSt5aHA2NlFFUjZOeFA2UFlMbWZkVXdrYXhGd3BvRWdFa3hSa3M5NTdYVHJuRmhuQllYSktrUnRSUGE5R0d3UU1nZnFqcG9jQjJ2QjZHeVFjZlRLQWc4eFU2OXNxL3k5RE10aUo5MlYxdTVZd1ZvZzAvVUV0dmMwMm1GS0ViOTBOTWltT1NhUTZPcmhCT0NtMWdQTzZIWHNjU210MVJ5MXlmTzF0ajBFMDlCT3ZWcld4UXVDR2VBZDZuVkxtSWJDcUk2L3lXWFhWeUpINFBGbUVXOXVDNm1hR2FqejcrZmRSZXNPTm82MHM1Y1FWb213SFk1TitUcUFDZ3Yrem5XY0hZVkdrT0hTR3lCWTBTeUE4NWtpU1pEZEZVOG9lcDBVUThwRExTKzVCS0thd3J6MitDR1UzZyt1V0U5L3RBPT0iLCJtYWMiOiJmMjUyMTA1ZjBhOTQ4NDg1ZWU5NjEyMjlkN2U3ODdhYjljMDQ1NjBhYWEzMTM4ZTdhNWZlMGNjZDdmYmE4ZmYxIiwidGFnIjoiIn0=','eyJpdiI6Ik9PeVgvbng2Vmxaazg4b2dsRDA5L3c9PSIsInZhbHVlIjoiV0VEWFkyZVJEMFFDS1RHWHV3TXdvUXFteit5SHZvU2tvMHZIR08yL3Q3eXMxK2UvazNhR3ExdzZZeWtjQS81ZWZSRzZWS0ZaL2JGcE03LzBzSjFwTG9GUjRkV0kwd0VjSk9RYVBTVFNMaXFXSSt0eEJEeElBYTBmWm13Ty9DS3luVnNPUTNLMVljVzY0eWpnNjV2eWlBPT0iLCJtYWMiOiI5NDIzMjhiZjhlYThiNmM4MWFjMmUwZGU4NzVkMjQyNDYyZGNiNTFhNTkxNzZlOWEzNThhOWE2NTZiNmQ1MDUyIiwidGFnIjoiIn0=','2026-09-08 05:27:00','2026-09-07 16:30:42','2026-09-08 04:27:01');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_08_17_122040_create_application_histories_table',1),(5,'2026_08_17_123749_add_status_to_application_histories_table',1),(6,'2026_08_17_175748_add_profile_fields_to_users_table',1),(7,'2026_08_17_181826_create_templates_table',1),(8,'2026_08_17_214055_create_google_accounts_table',1),(9,'2026_08_17_231737_add_user_id_to_application_histories_table',1),(10,'2026_08_18_034546_add_profile_completed_to_users_table',1),(11,'2026_08_25_095457_add_role_to_users_table',1),(12,'2026_08_25_102051_create_feedbacks_table',1),(13,'2026_08_25_102053_create_feedback_replies_table',1),(14,'2026_08_25_102055_create_system_logs_table',1),(15,'2026_08_25_140645_add_status_to_users_table',1),(16,'2026_08_30_045122_add_template_snapshot_to_application_histories_table',2);
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
INSERT INTO `password_reset_tokens` VALUES ('blastofams@gmail.com','$2y$12$hAotcBlqRQ8HvmPPAstEw.CxY2BKceVEiyfyTp6vf10YgawBhT/cG','2026-08-27 09:31:45');
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
INSERT INTO `sessions` VALUES ('9UBXJmYRmvMkxIowfMPKcg76OFChGUg3mMzF1TuW',NULL,'172.19.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJHUFBXMFhwdjFSeTdjSmh6MXc1aG1oM09saUp0YXVNZjZSdTMxSWpnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdCIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1788838376),('V6siS1yTQuUuW0cy2NEIifoL7Rvy65bSN8DKcSCa',4,'172.19.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJNdjN0QTZTbFo1S2lhMkFHMkVWU2NVSjV4QWNmNWtJSHhnUzhzNnpTIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvdGVtcGxhdGVzP3R5cGU9cGRmIiwicm91dGUiOiJ0ZW1wbGF0ZXMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6NH0=',1788842151);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_logs`
--

LOCK TABLES `system_logs` WRITE;
/*!40000 ALTER TABLE `system_logs` DISABLE KEYS */;
INSERT INTO `system_logs` VALUES (1,'info','application_sent','Lamaran dikirim ke ',NULL,'2026-08-25 14:42:56','2026-08-25 14:42:56'),(2,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-07 16:31:10','2026-09-07 16:31:10'),(3,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-07 16:37:41','2026-09-07 16:37:41'),(4,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-07 16:51:12','2026-09-07 16:51:12'),(5,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-07 17:06:45','2026-09-07 17:06:45'),(6,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-07 17:20:23','2026-09-07 17:20:23'),(7,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-07 18:56:08','2026-09-07 18:56:08'),(8,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-07 19:17:39','2026-09-07 19:17:39'),(9,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-07 19:28:49','2026-09-07 19:28:49'),(10,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-07 19:32:47','2026-09-07 19:32:47'),(11,'info','application_sent','Lamaran dikirim ke ',4,'2026-09-08 04:27:03','2026-09-08 04:27:03');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES (1,NULL,'Formal Profesional','email','formal','Lamaran {{posisi}} - {{nama}}','Yth. HRD / Tim Rekrutmen {{perusahaan}},\n\nPerkenalkan, nama saya {{nama}}. Menanggapi informasi mengenai lowongan pekerjaan yang sedang dibuka, saya bermaksud mengajukan lamaran untuk posisi {{posisi}} di perusahaan yang Bapak/Ibu pimpin.\n\nSaya memiliki latar belakang pendidikan {{pendidikan}} dan memiliki ketertarikan untuk mengembangkan kemampuan serta memberikan kontribusi terbaik melalui posisi tersebut.\n\nSaya memiliki kemampuan yang relevan dengan kebutuhan pekerjaan dan siap mengikuti seluruh proses seleksi yang ditetapkan oleh perusahaan.\n\nSebagai bahan pertimbangan Bapak/Ibu, saya telah melampirkan Curriculum Vitae (CV) beserta dokumen pendukung lainnya pada email ini.\n\nSaya sangat mengharapkan kesempatan untuk dapat mengikuti tahapan seleksi dan wawancara agar dapat menjelaskan kemampuan serta pengalaman yang saya miliki secara lebih lanjut.\n\nTerima kasih atas waktu dan perhatian Bapak/Ibu.\n\nHormat saya,\n{{nama}}\n{{phone}}\n{{email}}',1,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(2,NULL,'Singkat & Profesional','email','simple','Lamaran Pekerjaan - {{posisi}} - {{nama}}','Yth. HRD {{perusahaan}},\n\nPerkenalkan, saya {{nama}}.\n\nSaya bermaksud mengajukan lamaran pekerjaan untuk posisi {{posisi}} di perusahaan Bapak/Ibu.\n\nSaya memiliki latar belakang pendidikan {{pendidikan}} dan siap mengikuti proses rekrutmen serta memberikan kontribusi terbaik apabila diberikan kesempatan.\n\nSebagai bahan pertimbangan, saya melampirkan CV dan dokumen pendukung pada email ini.\n\nTerima kasih atas perhatian Bapak/Ibu.\n\nHormat saya,\n{{nama}}\n{{phone}}\n{{email}}',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(3,NULL,'Fresh Graduate','email','fresh_graduate','Lamaran {{posisi}} - Fresh Graduate - {{nama}}','Yth. HRD / Tim Rekrutmen {{perusahaan}},\n\nPerkenalkan, saya {{nama}}, lulusan {{pendidikan}}.\n\nSaya mengetahui adanya kesempatan untuk posisi {{posisi}} dan bermaksud mengajukan lamaran untuk posisi tersebut.\n\nSebagai fresh graduate, saya memiliki semangat belajar yang tinggi, mampu beradaptasi dengan lingkungan baru, serta memiliki keinginan untuk terus mengembangkan kemampuan yang saya miliki.\n\nSaya berharap mendapatkan kesempatan untuk mengikuti proses seleksi dan membuktikan kemampuan saya secara langsung.\n\nCV dan dokumen pendukung telah saya lampirkan sebagai bahan pertimbangan.\n\nTerima kasih atas waktu dan perhatian Bapak/Ibu.\n\nHormat saya,\n{{nama}}\n{{phone}}\n{{email}}',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(4,NULL,'IT / Programmer','email','it','Application for {{posisi}} - {{nama}}','Yth. HRD / Recruitment Team {{perusahaan}},\n\nPerkenalkan, saya {{nama}}, dengan latar belakang pendidikan {{pendidikan}}.\n\nSaya bermaksud mengajukan lamaran untuk posisi {{posisi}} di perusahaan Bapak/Ibu.\n\nSaya memiliki ketertarikan pada bidang teknologi dan pengembangan sistem, serta memiliki kemampuan untuk mempelajari teknologi baru sesuai dengan kebutuhan pekerjaan.\n\nSaya juga memiliki kemampuan pengolahan data dan terbiasa menggunakan berbagai tools pendukung pekerjaan.\n\nCV dan dokumen pendukung telah saya lampirkan pada email ini sebagai bahan pertimbangan.\n\nSaya sangat terbuka untuk mengikuti technical test, interview, maupun tahapan seleksi lainnya.\n\nTerima kasih atas perhatian Bapak/Ibu.\n\nHormat saya,\n{{nama}}\n{{phone}}\n{{email}}',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(5,NULL,'Formal Standar','pdf','formal',NULL,'<div style=\"font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.6;\">\n\n    <div style=\"text-align: right; margin-bottom: 20px;\">\n        {{kota}}, {{tanggal}}\n    </div>\n\n    <table style=\"margin-bottom: 20px; border-collapse: collapse;\">\n\n        <tr>\n            <td style=\"width: 80px;\">Hal</td>\n            <td style=\"width: 15px;\">:</td>\n            <td>Lamaran Pekerjaan</td>\n        </tr>\n\n        <tr>\n            <td>Lampiran</td>\n            <td>:</td>\n            <td>-</td>\n        </tr>\n\n    </table>\n\n    <p>\n        Yth. HRD <strong>{{perusahaan}}</strong>\n    </p>\n\n    <p>\n        Dengan Hormat,\n    </p>\n\n    <p>\n        Saya yang bertanda tangan di bawah ini:\n    </p>\n\n    <table style=\"margin-left: 30px; border-collapse: collapse;\">\n\n        <tr>\n            <td style=\"width: 170px;\">Nama</td>\n            <td style=\"width: 15px;\">:</td>\n            <td>{{nama}}</td>\n        </tr>\n\n        <tr>\n            <td>Tempat, Tanggal Lahir</td>\n            <td>:</td>\n            <td>{{tempat_lahir}}, {{tanggal_lahir}}</td>\n        </tr>\n\n        <tr>\n            <td>Pendidikan</td>\n            <td>:</td>\n            <td>{{pendidikan}}</td>\n        </tr>\n\n        <tr>\n            <td>Alamat</td>\n            <td>:</td>\n            <td>{{alamat}}</td>\n        </tr>\n\n        <tr>\n            <td>No. HP</td>\n            <td>:</td>\n            <td>{{phone}}</td>\n        </tr>\n\n        <tr>\n            <td>Email</td>\n            <td>:</td>\n            <td>{{email}}</td>\n        </tr>\n\n    </table>\n\n    <p style=\"text-align: justify;\">\n        Dengan segala hormat, saya bermaksud mengajukan lamaran pekerjaan\n        di perusahaan yang dipimpin oleh Bapak/Ibu sebagai\n        <strong>{{posisi}}</strong>.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya memiliki latar belakang pendidikan {{pendidikan}}\n        dan memiliki motivasi untuk memberikan kontribusi terbaik\n        bagi perusahaan.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Sebagai bahan pertimbangan, bersama surat ini saya melampirkan\n        dokumen pendukung yang diperlukan.\n    </p>\n\n    <ol style=\"padding-left: 24px;\">\n        <li>Riwayat Hidup</li>\n        <li>Pas Foto</li>\n        <li>KTP</li>\n        <li>KK</li>\n        <li>SKCK</li>\n        <li>Fotokopi Ijazah</li>\n        <li>Fotokopi Transkrip Nilai</li>\n    </ol>\n\n    <p style=\"text-align: justify;\">\n        Demikian surat lamaran ini saya buat.\n        Atas perhatian dan pertimbangan Bapak/Ibu,\n        saya ucapkan terima kasih.\n    </p>\n\n    <table style=\"width: 100%; margin-top: 40px;\">\n        <tr>\n            <td style=\"width: 65%;\"></td>\n\n            <td style=\"width: 35%; text-align: center;\">\n                Hormat saya,\n                <br><br><br><br><br>\n                ({{nama}})\n            </td>\n        </tr>\n    </table>\n\n</div>',1,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(6,NULL,'Profesional Modern','pdf','professional',NULL,'<div style=\"font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.65;\">\n\n    <div style=\"text-align: right; margin-bottom: 25px;\">\n        {{kota}}, {{tanggal}}\n    </div>\n\n    <p>\n        Kepada Yth.<br>\n        <strong>HRD {{perusahaan}}</strong>\n    </p>\n\n    <p>\n        Dengan Hormat,\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Perkenalkan, saya <strong>{{nama}}</strong>,\n        lulusan <strong>{{pendidikan}}</strong>.\n        Melalui surat ini saya ingin mengajukan lamaran untuk posisi\n        <strong>{{posisi}}</strong> di perusahaan Bapak/Ibu.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya memiliki semangat belajar, kemampuan beradaptasi,\n        serta motivasi untuk berkembang dan memberikan kontribusi\n        positif terhadap perusahaan.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Bersama surat ini saya melampirkan CV dan dokumen pendukung\n        sebagai bahan pertimbangan.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya berharap dapat diberikan kesempatan untuk mengikuti\n        proses seleksi lebih lanjut.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Demikian surat lamaran ini saya sampaikan.\n        Terima kasih atas perhatian Bapak/Ibu.\n    </p>\n\n    <table style=\"width: 100%; margin-top: 45px;\">\n        <tr>\n            <td style=\"width: 65%;\"></td>\n\n            <td style=\"width: 35%; text-align: center;\">\n                Hormat saya,\n                <br><br><br><br><br>\n                <strong>{{nama}}</strong>\n            </td>\n        </tr>\n    </table>\n\n</div>',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(7,NULL,'Fresh Graduate','pdf','fresh_graduate',NULL,'<div style=\"font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.65;\">\n\n    <div style=\"text-align: right; margin-bottom: 20px;\">\n        {{kota}}, {{tanggal}}\n    </div>\n\n    <p>\n        Yth. HRD <strong>{{perusahaan}}</strong>\n    </p>\n\n    <p>\n        Dengan Hormat,\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya yang bertanda tangan di bawah ini:\n    </p>\n\n    <table style=\"margin-left: 30px; border-collapse: collapse;\">\n\n        <tr>\n            <td style=\"width: 170px;\">Nama</td>\n            <td style=\"width: 15px;\">:</td>\n            <td>{{nama}}</td>\n        </tr>\n\n        <tr>\n            <td>Pendidikan</td>\n            <td>:</td>\n            <td>{{pendidikan}}</td>\n        </tr>\n\n        <tr>\n            <td>Alamat</td>\n            <td>:</td>\n            <td>{{alamat}}</td>\n        </tr>\n\n        <tr>\n            <td>No. HP</td>\n            <td>:</td>\n            <td>{{phone}}</td>\n        </tr>\n\n        <tr>\n            <td>Email</td>\n            <td>:</td>\n            <td>{{email}}</td>\n        </tr>\n\n    </table>\n\n    <p style=\"text-align: justify;\">\n        Dengan ini saya bermaksud mengajukan lamaran pekerjaan\n        sebagai <strong>{{posisi}}</strong>.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Sebagai lulusan {{pendidikan}}, saya memiliki semangat belajar\n        yang tinggi dan siap mengembangkan kemampuan melalui pengalaman\n        profesional di perusahaan Bapak/Ibu.\n    </p>\n\n    <p style=\"text-align: justify;\">\n        Saya siap mengikuti seluruh tahapan seleksi yang ditetapkan\n        perusahaan dan berharap mendapat kesempatan untuk bergabung\n        serta memberikan kontribusi terbaik.\n    </p>\n\n    <p>\n        Terima kasih atas perhatian Bapak/Ibu.\n    </p>\n\n    <table style=\"width: 100%; margin-top: 40px;\">\n        <tr>\n            <td style=\"width: 65%;\"></td>\n\n            <td style=\"width: 35%; text-align: center;\">\n                Hormat saya,\n                <br><br><br><br><br>\n                <strong>{{nama}}</strong>\n            </td>\n        </tr>\n    </table>\n\n</div>',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(8,NULL,'Surat Lamaran Lengkap','pdf','formal_lengkap',NULL,'<div style=\"\n    font-family: Arial, Helvetica, sans-serif;\n    font-size: 12pt;\n    line-height: 1.4;\n    color: #111;\n\">\n\n    <!-- TANGGAL -->\n    <div style=\"\n        text-align: right;\n        margin-top: 0;\n        margin-bottom: 10px;\n    \">\n        {{kota}}, {{tanggal}}\n    </div>\n\n    <!-- PERIHAL -->\n    <table style=\"\n        border-collapse: collapse;\n        margin-top: 0;\n        margin-bottom: 10px;\n    \">\n        <tr>\n            <td style=\"width: 80px; padding: 0;\">\n                Hal\n            </td>\n\n            <td style=\"width: 15px; padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                Lamaran Pekerjaan\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Lampiran\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                -\n            </td>\n        </tr>\n    </table>\n\n    <!-- TUJUAN -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n    \">\n        Yth. HRD <strong>{{perusahaan}}</strong>\n    </p>\n\n    <!-- SALAM -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 0px;\n    \">\n        Dengan Hormat,\n    </p>\n\n    <!-- PEMBUKA -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        text-align: justify;\n    \">\n        Saya yang bertanda tangan di bawah ini:\n    </p>\n\n    <!-- BIODATA -->\n    <table style=\"\n        border-collapse: collapse;\n        margin-top: 0;\n        margin-left: 30px;\n        margin-bottom: 10px;\n    \">\n\n        <tr>\n            <td style=\"\n                width: 170px;\n                padding: 0;\n            \">\n                Nama\n            </td>\n\n            <td style=\"\n                width: 15px;\n                padding: 0;\n            \">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{nama}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Tempat, Tanggal Lahir\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{tempat_lahir}}, {{tanggal_lahir}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Pendidikan\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{pendidikan}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Alamat\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{alamat}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                No. HP\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{phone}}\n            </td>\n        </tr>\n\n        <tr>\n            <td style=\"padding: 0;\">\n                Email\n            </td>\n\n            <td style=\"padding: 0;\">\n                :\n            </td>\n\n            <td style=\"padding: 0;\">\n                {{email}}\n            </td>\n        </tr>\n\n    </table>\n\n    <!-- PARAGRAF 1 -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        text-align: justify;\n    \">\n        Dengan segala hormat, saya ingin mengajukan lamaran pekerjaan\n        di perusahaan yang dipimpin oleh Bapak/Ibu sebagai\n        <strong>{{posisi}}</strong>.\n        Saya sangat antusias untuk bergabung dengan tim\n        <strong>{{perusahaan}}</strong> dan berkontribusi dalam mencapai\n        visi dan misi yang telah ditetapkan.\n    </p>\n\n    <!-- PARAGRAF 2 -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        text-align: justify;\n    \">\n        Bersama dengan surat lamaran ini, saya melampirkan semua\n        dokumen yang relevan dan berharap agar diberikan kesempatan\n        untuk mengikuti proses seleksi lebih lanjut.\n    </p>\n\n    <!-- PARAGRAF 3 -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        text-align: justify;\n    \">\n        Terima kasih atas perhatian Bapak/Ibu, sebagai bahan\n        pertimbangan bersama ini saya lampirkan:\n    </p>\n\n    <!-- LAMPIRAN -->\n    <ol style=\"\n        margin-top: 0;\n        margin-bottom: 10px;\n        padding-left: 28px;\n        line-height: 1.35;\n    \">\n\n        <li style=\"margin: 0; padding: 0;\">\n            Riwayat Hidup\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            Pas Foto\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            KTP\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            KK\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            SKCK\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            Fotokopi Ijazah\n        </li>\n\n        <li style=\"margin: 0; padding: 0;\">\n            Fotokopi Transkrip Nilai\n        </li>\n\n    </ol>\n\n    <!-- PENUTUP -->\n    <p style=\"\n        margin-top: 0;\n        margin-bottom: 6px;\n        text-align: justify;\n    \">\n        Demikian surat lamaran ini saya buat.\n        Atas perhatian dan pertimbangan Ibu/Bapak,\n        saya ucapkan terima kasih.\n    </p>\n\n    <!-- TANDA TANGAN -->\n    <table style=\"\n        width: 100%;\n        border-collapse: collapse;\n        margin-top: 25px;\n    \">\n\n        <tr>\n\n            <td style=\"\n                width: 65%;\n                padding: 0;\n            \">\n            </td>\n\n            <td style=\"\n                width: 35%;\n                padding: 0;\n                text-align: center;\n                vertical-align: top;\n            \">\n\n                Hormat saya,\n\n                <br>\n                <br>\n                <br>\n                <br>\n\n                <strong>\n                    {{nama}}\n                </strong>\n\n            </td>\n\n        </tr>\n\n    </table>\n\n</div>',0,'2026-08-25 14:38:37','2026-08-25 14:38:37'),(10,4,'Admin Email Body','email',NULL,'{{posisi}}_{{nama}}','Yth. \r\nHRD {{perusahaan}}.\r\n\r\nPerkenalkan nama saya {{nama}}. Menanggapi lowongan pekerjaan yang Bapak/Ibu terbitkan, saya bermaksud ingin mengajukan lamaran pekerjaan di perusahaan yang Bapak/Ibu pimpin sebagai {{posisi}}.\r\n\r\nBackground pendidikan saya sebelumnya adalah {{pendidikan}} yang terfokus pada program dan pengolahan data informasi. Yang mana masih memiliki keterkaitan dengan persyaratan dari lowongan yang Bapak/Ibu terbitkan.\r\n\r\nSaya memiliki kemampuan pengolahan data yang bagi saya familiar layaknya Database pada program aplikasi, Aplikasi pengolahan data yang saya kuasai salah satu contohnya Microsoft Excel dengan memakai berbagai rumus yang tersedia dibuktikan dengan ada sertifikat yang telah saya ampu. Rumus-rumus yang saya kuasai seperti hal nya Sum, If, Average, Hlookup, Vlookup, Mid, Right, Left, Index, Match, Pivot, dll. Saya juga siap jika nantinya ada test saat proses rekrutmen pada posisi tersebut.\r\n\r\nSebagai bahan pertimbangan Bapak/Ibu. saya telah melampirkan Curriculum Vitae (CV) beserta dokumen pendukung lainnya pada email ini. Saya sangat menantikan kesempatan untuk mengikuti tahapan wawancara agar dapat mendiskusikan lebih rinci mengenai potensi yang saya miliki.\r\n\r\nTerima kasih atas waktu dan perhatian Bapak/Ibu.\r\nHormat saya,\r\n\r\n{{nama}}\r\n{{phone}}\r\n{{email}}',1,'2026-09-07 17:04:53','2026-09-08 04:26:14'),(13,4,'Admin Terbaru','pdf',NULL,NULL,'<p style=\"text-align: right; margin-bottom: 1em; margin-top: 0px;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">{{kota}}, {{tanggal}}</span></p>\r\n<table style=\"border-collapse: collapse; width: 100.036%; background-color: rgba(0, 0, 0, 0); border: 1px hidden rgba(0, 0, 0, 0);\" border=\"1\"><colgroup><col style=\"width: 7.87459%;\"><col style=\"width: 2.01008%;\"><col style=\"width: 90.0789%;\"></colgroup>\r\n<tbody>\r\n<tr>\r\n<td style=\"border-color: rgba(0, 0, 0, 0); line-height: 1;\">\r\n<p><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">Hal</span></p>\r\n</td>\r\n<td style=\"border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">:</span></td>\r\n<td style=\"border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">Lamaran Pekerjaa</span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">Lampiran</span></td>\r\n<td style=\"border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">:</span></td>\r\n<td style=\"border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">7</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"line-height: 1.3; margin-top: 1em; margin-bottom: 0px;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">Yth. HRD <strong>{{perusahaan}}</strong></span></p>\r\n<p style=\"line-height: 1.3; margin-top: 0px; margin-bottom: 0px;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">Dengan Hormat,</span></p>\r\n<p style=\"line-height: 1.3; margin-top: 0px; margin-bottom: 1em;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 12pt;\">Saya yang bertanda tangan di bawah ini:</span></p>\r\n<table style=\"border-collapse: collapse; width: 99.9629%; height: 126.312px; background-color: rgba(0, 0, 0, 0); border: 1px hidden rgba(0, 0, 0, 0);\" border=\"1\"><colgroup><col style=\"width: 5.40646%;\"><col style=\"width: 30.8869%;\"><col style=\"width: 1.77254%;\"><col style=\"width: 61.8985%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 22.3854px;\">\r\n<td style=\"border-color: rgba(0, 0, 0, 0); height: 22.3854px; line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Nama</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\">\r\n<p><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">:</span></p>\r\n</td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">{{nama}}</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3854px;\">\r\n<td style=\"border-color: rgba(0, 0, 0, 0); height: 22.3854px; line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Tempat, Tanggal Lahir</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">:</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">{{tempat_lahir}}, {{tanggal_lahir}}</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3854px;\">\r\n<td style=\"border-color: rgba(0, 0, 0, 0); height: 22.3854px; line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Pendidikan</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">:</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">{{pendidikan}}</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3854px;\">\r\n<td style=\"border-color: rgba(0, 0, 0, 0); height: 22.3854px; line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Alamat</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">:</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">{{alamat}}</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3854px;\">\r\n<td style=\"border-color: rgba(0, 0, 0, 0); height: 22.3854px; line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Telepon</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">:</span></td>\r\n<td style=\"height: 22.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">{{phone}}</span></td>\r\n</tr>\r\n<tr style=\"height: 14.3854px;\">\r\n<td style=\"border-color: rgba(0, 0, 0, 0); height: 14.3854px; line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></td>\r\n<td style=\"height: 14.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Email</span></td>\r\n<td style=\"height: 14.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">:</span></td>\r\n<td style=\"height: 14.3854px; border-color: rgba(0, 0, 0, 0); line-height: 1;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">{{email}}</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"margin-top: 1em;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Dengan segala hormat, saya bermaksud mengajukan lamaran pekerjaan di perusahaan yang dipimpin oleh Bapak/Ibu sebagai&nbsp;<strong>{{posisi}}</strong>. Saya memiliki latar belakang pendidikan {{pendidikan}} dan memiliki motivasi untuk memberikan kontribusi terbaik bagi perusahaan. Sebagai bahan pertimbangan, bersama surat ini saya melampirkan dokumen pendukung yang diperlukan.</span></p>\r\n<ol>\r\n<li><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Riwayat Hidup</span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Pas Foto<br></span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">KTP<br></span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">KK<br></span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">SKCK<br></span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Fotokopi Ijazah<br></span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Fotokopi Transkrip Nilai</span></li>\r\n</ol>\r\n<p><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Demikian surat lamaran ini saya buat. Atas perhatian dan pertimbangan Bapak/Ibu,&nbsp;saya ucapkan terima kasih.</span></p>\r\n<p style=\"text-align: right; margin-bottom: 0px; margin-top: 1em;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Hormat Saya,</span></p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\"><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">{{nama}}</span></p>',1,'2026-09-07 18:52:21','2026-09-07 20:05:49');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','test@example.com','admin','Kediri','2026-08-27','S1 Peternakan','assas','6289620276245',0,'2026-08-25 14:38:37','$2y$12$0jvrD3wm2oJQENyvLjnrLehsyyKCTJnZFReH3dU36OJAbeasifhby','j6DntnOVvYT2HMfvRGoUeDIFLycVcHTgvD9uUT2ycmA3McOXyKunYclRTcUo','2026-08-25 14:38:37','2026-08-25 14:41:09','active'),(4,'Stevent','blastofams@gmail.com','user','Kediri','2026-08-27','S1 Peternakan','xcbxxvbbfb','6289620276245',0,NULL,'$2y$12$Tk2naN0vVli.BcVRNEhmb.NxRluwOrNzE5HhdXmszCGAodfIsWTie',NULL,'2026-08-27 09:27:49','2026-08-27 09:27:49','active');
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

-- Dump completed on 2026-09-08  4:42:47
