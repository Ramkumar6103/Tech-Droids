-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: college_website
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `academic_year` varchar(9) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `id_card_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) /*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'ram','ram@gmail.com','$2y$10$fr94xUAJoKwtVcPj3v.ivOL7nJsQJT5UTiUY//jRFCMvWLomImkz6','2025-2026','uploads/bc112e19408f1053fbdbbd208a179f5ddaf899108ed69f6c830617a9aa9fea55.jpg','uploads/22d49cdfb79ec116cecd154673a1442b046a94b7467a96c71bb30932e1d1f8d2.jpg'),(3,'suresh','suresh@gmail.com','$2y$10$8HaYzSgHwHX4xiRAweebuewmydO9GMqPr/es8SyQTLr7OP8sa8u4y','2024-2027','uploads/38a33745bcb9092a4a4917e18585d2e1505c9e16293b537383bc0f4e0d892227.jpg','uploads/461723d4ab0bf6ca8f273377755eb9e199ab0f171916d7f1792ec98a631ffa12.jpg'),(4,'vicky','vicky@gmail.com','$2y$10$3rUs0efxKCmnl1cqTlL9m.XH67ASEMKjagu1jBDLWtTyvR.Gij7OK','2023-2024','uploads/1a00375736cfa7d58b4a7423c7a9ba4bb4d3230c3867f3cdc7854697cd665b1d.jpg','uploads/cab75783f0cc435d0aecfe9c0657df2b82217fffadb10b1c84ab39c4fd203427.jpg'),(5,'vicky','vicky@gmail.com','$2y$10$4mSPfxN3vLG3ZicJngBqVOs/JjAKFYPP3JbsgpdAcyeSmEs9JcNGC','2024-2027','uploads/6a589931acd95441328b8b9b3246838f31b8f0ec65dd9ce3763b65c86013ff59.jpg','uploads/6a589931acd95441328b8b9b3246838f31b8f0ec65dd9ce3763b65c86013ff59.jpg'),(6,'roshan','ros@gmail.com','$2y$10$.cuYIzl8ftbIHS90OFkLguPC1GluC58Z5DX.zAOqWY1zUQvYN/B96','2022-2025','uploads/ae87532a1d5aa368ee93146b5f4714cba4aa30682a16b2bc7d6ff04d8e9e6fff.jpg','uploads/1c9af96ab7259c3fa6195fd713289722038ed1423be3183e165bab523e4e2c4d.jpg'),(7,'dhanesh','dhanesh@gmail.com','$2y$10$/mCwUx9lr8CpFhaV0OotVOPyIWuOBpCg9HeJC7PpOMjjD22J1krfC','2022-2025','uploads/5815e980d9deb157a4cc56415ab172886454f663a965ae454289aaeee7b3ff0f.jpg','uploads/09d3d97340002e077879de9b205e31ddcb00d7710cc42ad594b5c24b81ea5882.jpg');
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

-- Dump completed on 2025-03-21 11:53:33
