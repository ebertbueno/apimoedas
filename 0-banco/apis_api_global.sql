CREATE DATABASE  IF NOT EXISTS `apis_api_global` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `apis_api_global`;
-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: apis_api_global
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cabecalhos`
--

DROP TABLE IF EXISTS `cabecalhos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cabecalhos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `conteudo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_from` varchar(255) DEFAULT NULL,
  `updated_from` varchar(255) DEFAULT NULL,
  `deleted_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabecalhos`
--

LOCK TABLES `cabecalhos` WRITE;
/*!40000 ALTER TABLE `cabecalhos` DISABLE KEYS */;
INSERT INTO `cabecalhos` VALUES (1,'/configuracoes','Painel','Configurações',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'/currencylayer','Painel','API de base',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'/moedas/criptomoedas','Painel','Moedas / CriptoMoedas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'/moedas/moedas','Painel','Moedas / Moedas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'/ips_bloqueados','Painel','IP\'s Bloqueados',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'/cadastros/clientes','Painel','Cadastros / Clientes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'/cadastros/administradores','Painel','Cadastros / Administradores',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'/consultas_realizadas','Painel','Consutas realizadas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'/relatorios/consultas_realizadas','Painel','Relatórios / Consutas realizadas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'/relatorios/consultas_por_cliente','Painel','Relatórios / Consutas por cliente',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cabecalhos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracoes`
--

DROP TABLE IF EXISTS `configuracoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT '0',
  `root` int(11) DEFAULT '0',
  `chave` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_from` varchar(255) DEFAULT NULL,
  `updated_from` varchar(255) DEFAULT NULL,
  `deleted_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracoes`
--

LOCK TABLES `configuracoes` WRITE;
/*!40000 ALTER TABLE `configuracoes` DISABLE KEYS */;
INSERT INTO `configuracoes` VALUES (1,0,0,'tempo_intervalo_entre_consultas_gratuitas','1800',NULL,NULL,'2020-11-03 18:39:57',NULL,NULL,1,NULL,NULL,'127.0.0.1',NULL),(2,1,0,'tempo_intervalo_entre_consultas_pagas','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,0,0,'tempo_intervalo_entre_atualizacao','300',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `configuracoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criptomoedas_conversoes`
--

DROP TABLE IF EXISTS `criptomoedas_conversoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `criptomoedas_conversoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moeda_origem` varchar(10) DEFAULT NULL,
  `ultimo` varchar(255) DEFAULT NULL,
  `compra` varchar(255) DEFAULT NULL,
  `venda` varchar(255) DEFAULT NULL,
  `timestamp` varchar(50) DEFAULT NULL,
  `json` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_from` varchar(255) DEFAULT NULL,
  `updated_from` varchar(255) DEFAULT NULL,
  `deleted_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criptomoedas_conversoes`
--

LOCK TABLES `criptomoedas_conversoes` WRITE;
/*!40000 ALTER TABLE `criptomoedas_conversoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `criptomoedas_conversoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencylayer`
--

DROP TABLE IF EXISTS `currencylayer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencylayer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_key` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_from` varchar(255) DEFAULT NULL,
  `updated_from` varchar(255) DEFAULT NULL,
  `deleted_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencylayer`
--

LOCK TABLES `currencylayer` WRITE;
/*!40000 ALTER TABLE `currencylayer` DISABLE KEYS */;
INSERT INTO `currencylayer` VALUES (1,'adc8612e34f5e05f3ad70739d69df1bc','ebertbueno@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'e0f48e283ce3bb4991fa02096626567d','wesleijt@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'725890433101c7bd1ff331a473a4411a','kadiil.ang@mapfnetpa.ml','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'93a7950df888ed6f2397155634458e3c','zsimo97631@vqrbaq.site','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'8e58803bf8c555b0bc12a6d63170363a','joussama.said.1@celdelest.gq','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'9224faed6d8caed4d18939a1a49f80df','9azo.tigerd@linsabe.ga','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'87238c2a88b5954a9eace12f9e0d4616','ytrofinrazvan@hlopshueh.xyz','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'87238c2a88b5954a9eace12f9e0d4616','kviolet.lover13@redvideo.site','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'87238c2a88b5954a9eace12f9e0d4616','0rafi@vmpanel.shop','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'87238c2a88b5954a9eace12f9e0d4616','schintothestar1@hanatravel.ru','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'46b6295183166462b980d297fc859ede','eharitha11q@cazzie.website','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'88df2be34e1617a06c9f7b7da765e85c','zabdelhakbosser@kingreadse.ml','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'33188c11485ea65ac1ee607c22d04156','fstayssim4@doc6.xyz','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'df721fec2e061471f2ab64c4f8a9d0ca','mabrach.1@photoprint.ga','321321',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'10','10','10',NULL,'2020-11-03 20:05:51','2020-11-04 12:43:53','2020-11-04 12:43:53',1,1,NULL,'127.0.0.1','127.0.0.1',NULL),(16,'2','2','2',NULL,'2020-11-03 20:06:29','2020-11-04 12:44:00','2020-11-04 12:44:00',1,NULL,NULL,'127.0.0.1',NULL,NULL),(17,'3','3','3',NULL,'2020-11-03 20:07:20','2020-11-04 12:44:01','2020-11-04 12:44:01',1,NULL,NULL,'127.0.0.1',NULL,NULL),(18,'4','4','4',NULL,'2020-11-03 20:07:44','2020-11-04 12:44:02','2020-11-04 12:44:02',1,NULL,NULL,'127.0.0.1',NULL,NULL);
/*!40000 ALTER TABLE `currencylayer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ips_bloqueados`
--

DROP TABLE IF EXISTS `ips_bloqueados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ips_bloqueados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `regiao` varchar(255) DEFAULT NULL,
  `motivo_bloqueio` longtext,
  `bloqueado_por` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_from` varchar(255) DEFAULT NULL,
  `updated_from` varchar(255) DEFAULT NULL,
  `deleted_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ips_bloqueados`
--

LOCK TABLES `ips_bloqueados` WRITE;
/*!40000 ALTER TABLE `ips_bloqueados` DISABLE KEYS */;
/*!40000 ALTER TABLE `ips_bloqueados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moedas_conversoes`
--

DROP TABLE IF EXISTS `moedas_conversoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moedas_conversoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moeda_origem` varchar(10) DEFAULT NULL,
  `moeda_destino` varchar(10) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `timestamp` varchar(50) DEFAULT NULL,
  `access_key` varchar(255) DEFAULT NULL,
  `json` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_from` varchar(255) DEFAULT NULL,
  `updated_from` varchar(255) DEFAULT NULL,
  `deleted_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moedas_conversoes`
--

LOCK TABLES `moedas_conversoes` WRITE;
/*!40000 ALTER TABLE `moedas_conversoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `moedas_conversoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traducoes`
--

DROP TABLE IF EXISTS `traducoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `traducoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chave` varchar(255) DEFAULT NULL,
  `pt-br` longtext,
  `en` longtext,
  `es` longtext,
  `pt` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_from` varchar(255) DEFAULT NULL,
  `updated_from` varchar(255) DEFAULT NULL,
  `deleted_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chave` (`chave`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traducoes`
--

LOCK TABLES `traducoes` WRITE;
/*!40000 ALTER TABLE `traducoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `traducoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `razao` varchar(255) DEFAULT NULL,
  `fantasia` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `tentativas` int(11) DEFAULT '0',
  `token_access` varchar(255) DEFAULT NULL,
  `chave_acesso` varchar(255) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_from` varchar(255) DEFAULT NULL,
  `updated_from` varchar(255) DEFAULT NULL,
  `deleted_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador',NULL,NULL,'adm@adm.com','$2y$10$.9gf/2Rw./B8Yg6CCGa1Nu7n4Pa7FoQBG0UDB1d4AgMIFBAXBRJ2W',NULL,NULL,0,NULL,NULL,'adm',NULL,'2020-11-04 15:18:53',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Tradoniex',NULL,NULL,'tradoniex@tradoniex.com',NULL,NULL,NULL,0,NULL,'841800114498','cli','2020-11-04 16:03:21','2020-11-04 16:03:21',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_consultas`
--

DROP TABLE IF EXISTS `users_consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_key` varchar(255) DEFAULT NULL,
  `data_ultima_consulta` varchar(50) DEFAULT NULL,
  `consulta_entrada` varchar(45) DEFAULT NULL,
  `retorno_solicitado` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_from` varchar(255) DEFAULT NULL,
  `updated_from` varchar(255) DEFAULT NULL,
  `deleted_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_consultas`
--

LOCK TABLES `users_consultas` WRITE;
/*!40000 ALTER TABLE `users_consultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'apis_api_global'
--

--
-- Dumping routines for database 'apis_api_global'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-04 22:52:25
