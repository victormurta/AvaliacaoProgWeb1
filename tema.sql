-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para tabelaavaliacao
CREATE DATABASE IF NOT EXISTS `tabelaavaliacao` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tabelaavaliacao`;

-- Copiando estrutura para tabela tabelaavaliacao.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `classe` varchar(15) NOT NULL,
  `vida` int NOT NULL,
  `vitalidade` int NOT NULL,
  `vantagem` enum('maldica','astucia','presteza','violacao','auge','crueldade','obstinacao','historia') NOT NULL,
  `desvantagem` enum('maldica','astucia','presteza','violacao','auge','crueldade','obstinacao','historia') NOT NULL,
  PRIMARY KEY (`classe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tabelaavaliacao.classes: ~0 rows (aproximadamente)
DELETE FROM `classes`;

-- Copiando estrutura para tabela tabelaavaliacao.fichapersonagem
CREATE TABLE IF NOT EXISTS `fichapersonagem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario_Ficha` int NOT NULL,
  `vida` int NOT NULL,
  `vitalidade` int NOT NULL,
  `maldicao` int NOT NULL,
  `astucia` int NOT NULL,
  `presteza` int NOT NULL,
  `violacao` int NOT NULL,
  `auge` int NOT NULL,
  `crueldade` int NOT NULL,
  `obstinacao` int NOT NULL,
  `historia` text NOT NULL,
  `imagem` mediumblob,
  `classe` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `objeto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario_Ficha` (`id_usuario_Ficha`),
  CONSTRAINT `fichapersonagem_ibfk_1` FOREIGN KEY (`id_usuario_Ficha`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tabelaavaliacao.fichapersonagem: ~0 rows (aproximadamente)
DELETE FROM `fichapersonagem`;

-- Copiando estrutura para tabela tabelaavaliacao.postagens
CREATE TABLE IF NOT EXISTS `postagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  `data_postagem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('rascunho','publicado') DEFAULT 'rascunho',
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `postagens_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tabelaavaliacao.postagens: ~0 rows (aproximadamente)
DELETE FROM `postagens`;

-- Copiando estrutura para tabela tabelaavaliacao.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_usuario` enum('admin','usuario') DEFAULT 'usuario',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tabelaavaliacao.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
