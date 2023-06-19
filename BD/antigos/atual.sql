-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_resto
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `cli_id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `dt_nasc` date NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `whatsapp` varchar(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Anderson Marques da Silva','M','2023-06-09','ander','$2y$10$etSIWhDPI3lJYPEGwvq9xO2xo1HV.Q.4NswFO2AuZ0EI4eGT4wR9i','18997752582','andermarsil@gmail.com','11111111100'),(2,'anderson silva','M','1978-10-27','anders','$2y$10$67pVWoWFTLMBxLaPFtpldOh9kkvnrlHJ8Pttjz9b8olF/ME1Bm9tq','18997752582','anderrevisor@hotmail.com','11111111100'),(9,'anderson silva','M','2023-06-18','msilva','$2y$10$d8EyVNXAJO0BYKp8EfK9kOudvLkqxX.LO43W0JwRSyTpqmM8BrmCS','18997752582','msilva@hotmail.com','11111111100'),(10,'Manoel','M','2023-06-08','Mal','$2y$10$iEntac/u7z/GY4wPGhwrWuGOyn7HpK8GDvS/mr40FVh5XYT7ZFw5S','18997752582','andermsilva@gmail.com','11111111100'),(11,'suzana','F','0997-03-23','sousa','$2y$10$R.xY2JK6ONlk8lK9LOhrKOkmXs0nBwHqtdqI8LyunMjls8.DDd0ty','18998018127','suzhy48@gamil.com','11111111100'),(12,'suzana','F','1997-03-12','sousa','$2y$10$6HH17zPNE7A9KkpRlnEKpe9v.Nsw/JBg0ckzGU8guqwCfJlfoP4tS','11987655544','suzhy48@gamil.com','11111111100'),(13,'brendon','M','1995-07-19','Feitosa','$2y$10$7d38eZMpJkRZBL37zAvYKe3VYtaHYYT7..9S3ccBTd32W7UFe5xNi','18981077130','brendongstv@gmail.com','11111111100');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contato` (
  `cod_contato` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `sobrenome` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `motivo_contato` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `data_hora_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

LOCK TABLES `contato` WRITE;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` VALUES (6,'brendon','feitosa','1898103583','teste@hotmail.com','teste2','2023-06-11 15:08:17'),(7,'suzana','sousa','18981077130','suzana@jumamarua.com.br','Sou a Juma e quero ir me imbora','2023-06-11 15:09:20'),(8,'anderson','marques','18123456789','teste@teste.com','teste3','2023-06-11 16:09:35');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `end_cod` int NOT NULL AUTO_INCREMENT,
  `cliente_cli_id` int NOT NULL,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `comp` varchar(45) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  PRIMARY KEY (`end_cod`),
  KEY `fk_endereco_cliente1_idx` (`cliente_cli_id`),
  CONSTRAINT `fk_endereco_cliente1` FOREIGN KEY (`cliente_cli_id`) REFERENCES `cliente` (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (6,2,'19026440','Rua Claudemir Rodrigues','15','a','Jardim Maracanã','Presidente Prudente'),(12,10,'19026380','Rua Rosa Oliveira dos Anjos','5','fundos','Jardim Maracanã','Presidente Prudente'),(14,9,'19026380','Rua Rosa Oliveira dos Anjos','20','','Jardim Maracanã','Presidente Prudente'),(34,1,'19065030','Rua Luiz Alves dos Santos','773','J','Jardim Everest','Presidente Prudente'),(36,11,'19065030','Rua Luiz Alves dos Santos','773','fundos','Jardim Everest','Presidente Prudente'),(37,13,'19065030','Rua Luiz Alves dos Santos','773','fundo','Jardim Everest','Presidente Prudente'),(38,1,'19026440','Rua Claudemir Rodrigues','98','','Jardim Maracanã','Presidente Prudente');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagamento` (
  `pag_id` int NOT NULL AUTO_INCREMENT,
  `data_pgto` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `identificador` varchar(200) NOT NULL,
  `valor` decimal(12,2) NOT NULL,
  `ped_num` int NOT NULL,
  `cancelado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pag_id`),
  KEY `pedido_pagamento` (`ped_num`),
  CONSTRAINT `pedido_pagamento` FOREIGN KEY (`ped_num`) REFERENCES `pedido` (`ped_num`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamento`
--

LOCK TABLES `pagamento` WRITE;
/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
INSERT INTO `pagamento` VALUES (19,'2023-06-18 12:10:02','8989434jajfsa00',18.50,100,0),(20,'2023-06-18 13:14:32','8989434jajfsa00',55.40,101,1);
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `ped_num` int NOT NULL AUTO_INCREMENT,
  `tipo_pagamento_cod` int NOT NULL,
  `cliente_cli_id` int NOT NULL,
  `ped_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor_total` decimal(12,2) NOT NULL,
  `cod_entrega` int NOT NULL,
  `status` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`ped_num`,`tipo_pagamento_cod`),
  KEY `fk_pedido_tipo_pagamento1_idx` (`tipo_pagamento_cod`),
  KEY `fk_pedido_cliente1_idx` (`cliente_cli_id`),
  KEY `fk_endereco_pedido_idx` (`cod_entrega`),
  KEY `status_ped_pedido_idx` (`status`),
  CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`cliente_cli_id`) REFERENCES `cliente` (`cli_id`),
  CONSTRAINT `fk_pedido_tipo_pagamento1` FOREIGN KEY (`tipo_pagamento_cod`) REFERENCES `tipo_pagamento` (`cod`),
  CONSTRAINT `status_ped_pedido` FOREIGN KEY (`status`) REFERENCES `status_pedido` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (100,9,1,'2023-06-18 12:09:57',18.50,34,1),(101,9,1,'2023-06-18 13:14:26',55.40,38,3);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `tipo_cod` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `preco` decimal(12,2) NOT NULL,
  `promo` tinyint(1) DEFAULT NULL,
  `image_url` longtext NOT NULL,
  `peso` decimal(12,2) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_pratos_tipo_prato_idx` (`tipo_cod`),
  CONSTRAINT `fk_pratos_tipo_prato` FOREIGN KEY (`tipo_cod`) REFERENCES `tipo_produto` (`tipo_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (5,7,'Feijoada Completa','feijão preto com pertence de de suinos',18.50,0,'https://conteudo.imguol.com.br/98/2020/02/25/feijoada-pratica-1582657939212_v2_1080x1080.jpg',0.25),(6,1,'tutu de feijão','Feijão com bacon, farinha de mandioca torrada couve refogada, ovo frito e torresmo',22.00,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcVFkx_oIflzIwHXpOa4hf6WAclQuelPe6bA&usqp=CAU',0.25),(7,21,'Frita','batata frita em formato de palito',5.00,0,'https://segredosdacomida.com.br/wp-content/uploads/2022/11/1-kg-de-batata-frita-serve-quantas-pessoas-1200x857.jpg',0.10),(9,12,'Lasanha','massa de lasanha, presunto, queijo, e molho de carne moida',18.50,0,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7PkiZfYIKp3AdJ-LyZhsEkm5DlL1BwMhyvA&usqp=CAU',0.25),(10,7,'Baião de dois','Arroz feijão de corda, torresmo, couve,bisteca suina e linguiça',25.00,0,'https://receitinhas.com.br/wp-content/uploads/2022/11/baiao-de-dois-vegano-Receitas-Club-Oficial.webp',0.30),(11,16,'Coca cola','coca cola lata 350ml',5.00,0,'data:image/png;base64,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',0.35),(12,16,'Schweppers','refrigerante citrus 350ml',5.00,0,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdgXTA2Sxdf9WcdycRomrv1wrm4gc91Bcb1A&usqp=CAU',0.35),(13,16,'Coca Cola zero','coca cola zero 350ml',5.00,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHx2ox6-fxwyhLLHaK6bBNBb2DBonfElujrQ&usqp=CAU',0.35),(14,7,'Dobradinha','feijão branco, bacon, calabresa e bucho bovino',21.90,0,'data:image/jpeg;base64,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',0.40);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_has_pedido`
--

DROP TABLE IF EXISTS `produto_has_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto_has_pedido` (
  `produto_codigo` int NOT NULL,
  `pedido_ped_num` int NOT NULL,
  `qtde` int NOT NULL,
  `valorUinitario` decimal(12,2) NOT NULL,
  `desconto` decimal(12,2) DEFAULT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  PRIMARY KEY (`produto_codigo`,`pedido_ped_num`),
  KEY `fk_produto_has_pedido_pedido1_idx` (`pedido_ped_num`),
  KEY `fk_produto_has_pedido_produto1_idx` (`produto_codigo`),
  CONSTRAINT `fk_produto_has_pedido_pedido1` FOREIGN KEY (`pedido_ped_num`) REFERENCES `pedido` (`ped_num`),
  CONSTRAINT `fk_produto_has_pedido_produto1` FOREIGN KEY (`produto_codigo`) REFERENCES `produto` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_has_pedido`
--

LOCK TABLES `produto_has_pedido` WRITE;
/*!40000 ALTER TABLE `produto_has_pedido` DISABLE KEYS */;
INSERT INTO `produto_has_pedido` VALUES (6,101,1,20.90,0.00,20.90),(9,100,1,18.50,0.00,18.50),(10,101,1,25.00,0.00,25.00),(13,101,2,4.75,0.00,9.50);
/*!40000 ALTER TABLE `produto_has_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `release`
--

DROP TABLE IF EXISTS `release`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `release` (
  `real_id` int NOT NULL,
  `fundacao` mediumtext NOT NULL,
  `de_onde_vimos` mediumtext NOT NULL,
  PRIMARY KEY (`real_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `release`
--

LOCK TABLES `release` WRITE;
/*!40000 ALTER TABLE `release` DISABLE KEYS */;
/*!40000 ALTER TABLE `release` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_pedido`
--

DROP TABLE IF EXISTS `status_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_pedido` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_pedido`
--

LOCK TABLES `status_pedido` WRITE;
/*!40000 ALTER TABLE `status_pedido` DISABLE KEYS */;
INSERT INTO `status_pedido` VALUES (1,'Finalizado'),(2,'Pendente'),(3,'Cancelado');
/*!40000 ALTER TABLE `status_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pagamento`
--

DROP TABLE IF EXISTS `tipo_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_pagamento` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pagamento`
--

LOCK TABLES `tipo_pagamento` WRITE;
/*!40000 ALTER TABLE `tipo_pagamento` DISABLE KEYS */;
INSERT INTO `tipo_pagamento` VALUES (3,'cartão debito'),(4,'cartão crédito'),(9,'PIX');
/*!40000 ALTER TABLE `tipo_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_produto`
--

DROP TABLE IF EXISTS `tipo_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_produto` (
  `tipo_cod` int NOT NULL AUTO_INCREMENT,
  `tipo_nome` varchar(150) NOT NULL,
  PRIMARY KEY (`tipo_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_produto`
--

LOCK TABLES `tipo_produto` WRITE;
/*!40000 ALTER TABLE `tipo_produto` DISABLE KEYS */;
INSERT INTO `tipo_produto` VALUES (1,'tradicionais'),(2,'tipicas'),(4,'assados'),(5,'entradas'),(7,'Nordestinas'),(12,'pastas'),(13,'doces'),(16,'refrigerante'),(21,'acompanhamento');
/*!40000 ALTER TABLE `tipo_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `adm_id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `user_tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`adm_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Anderson Marques da Silva','andermarsil@gmail.com','$2y$10$cgIZaJOTWwzv6QEYtMyOq.NFeEcR3mD6SLtcqU93lrY1jLeu/49Ki','adm'),(2,'Suzana','suzanacabecadebanana@hotmail.com','$2y$10$7a72qqsolsdU/.i105rxS.aWVe0RLYR3OBbeSqd9Fg6gd1LPIn10m','adm'),(3,'Brendon','brendonfeitosa@hotmail.com','$2y$10$cRfiVlZ8rmM1C1TdbAMv1.gDvEIN.OieUhvOnyxOvx.FKXH3Xy7BS','adm'),(5,'balcão','balcao@teste.com','$2y$10$DmRq84RrJyDHqtgWT541aem9C.gpRMOGOHnetzy8ynPbHsio5JSSe','adm');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-18 19:22:55
