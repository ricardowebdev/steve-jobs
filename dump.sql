-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: mysql524.umbler.com    Database: serralheriamr
-- ------------------------------------------------------
-- Server version	5.6.40-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `texto` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,'Primeiro banner','Primeiro banner','foto18-08-13-08-20-14.jpg',1,'2018-08-13',NULL),(2,'segundo banner','segundo banner','foto18-08-13-08-21-20.jpg',1,'2018-08-13',NULL),(3,'terceiro banner','terceiro banner','foto18-08-13-08-22-03.jpg',1,'2018-08-13',NULL),(4,'estrutura metalica','estrutura metalica','foto18-08-13-08-22-29.jpg',1,'2018-08-13',NULL);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Portas Automaticas / Manuais','<p>Portas Automaticas / Manuais</p>\r\n',1,'2018-08-13',NULL),(2,'Estruturas metalicas / telhados','<p>Estruturas metalicas / telhados</p>\r\n',1,'2018-08-13',NULL),(3,'Cobertura de policarbonato','<p>Cobertura de policarbonato</p>\r\n',1,'2018-08-13',NULL),(4,'PortÃµes basculantes','<p>Port&otilde;es basculantes</p>\r\n',1,'2018-08-13',NULL),(5,'Mezaninos','<p>Mezaninos</p>\r\n',1,'2018-08-13',NULL),(6,'Escadas e corrimÃµes','<p>Escadas e corrim&otilde;es</p>\r\n',1,'2018-08-13',NULL),(7,'Reparos em gerais','<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Reparos em gerais</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n',1,'2018-08-13',NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf_cnpj` varchar(45) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (10,'Ricardo dos Santos Souza','38659850840','(11) 4308-0644','(11) 9 9134-6177','Rua FranÃ§a','347','','TaboÃ£o','Diadema','SP','09941-070','ricardo.tecnology@gmail.com','1','2018-08-21',NULL),(11,'morgana','16122826871','(11) 4092-4493','(11) 9 4427-3949','Avenida FÃ¡bio Eduardo Ramos Esquivel','125','','Centro','Diadema','SP','09920-575','morganagds01@gmail.com','1','2018-09-09',NULL),(12,'fabio da Silva Bezerra','29649933867','(11) 4092-4493','(11) 9 4008-8839','Avenida FÃ¡bio Eduardo Ramos Esquivel','125','','Centro','Diadema','SP','09920-575','fabiobezerra3897@gmail.com','1','2018-09-10',NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condicao_pagamento`
--

DROP TABLE IF EXISTS `condicao_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condicao_pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `qtde_parcelas` int(11) DEFAULT NULL,
  `intervalo_dias` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condicao_pagamento`
--

LOCK TABLES `condicao_pagamento` WRITE;
/*!40000 ALTER TABLE `condicao_pagamento` DISABLE KEYS */;
INSERT INTO `condicao_pagamento` VALUES (1,'30 Dias',1,30,1,'2018-08-21',NULL),(2,'3x',3,30,1,'2018-09-09',NULL);
/*!40000 ALTER TABLE `condicao_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controle`
--

DROP TABLE IF EXISTS `controle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordemServico` varchar(15) DEFAULT NULL,
  `orcamento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controle`
--

LOCK TABLES `controle` WRITE;
/*!40000 ALTER TABLE `controle` DISABLE KEYS */;
/*!40000 ALTER TABLE `controle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `numero` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `complemento` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `bairro` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `cidade` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `cep` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `google` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `segSex` varchar(20) COLLATE utf8_bin DEFAULT '--:--',
  `sabado` varchar(20) COLLATE utf8_bin DEFAULT '--:--',
  `domingo` varchar(20) COLLATE utf8_bin DEFAULT '--:--',
  `nextel` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'Serralheria MR','(11) 4092-4493','(11) 9 8552-3159','Avenida FÃ¡bio Eduardo Ramos Esquivel','125','','Centro','Diadema','SP','09920-579','','','','atendimento@serralheriamr.com.br','00:00 - 23:59','00:00 - 23:59','00:00 - 23:59','(11) 9 4008-8839',1,'2018-08-13',NULL);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fluxo_caixa`
--

DROP TABLE IF EXISTS `fluxo_caixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fluxo_caixa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `identificacao` varchar(45) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fluxo_caixa`
--

LOCK TABLES `fluxo_caixa` WRITE;
/*!40000 ALTER TABLE `fluxo_caixa` DISABLE KEYS */;
INSERT INTO `fluxo_caixa` VALUES (1,'2018-09-08','serviÃ§o x','referente a orÃ§amento x','C','1000.00',0,'2018-09-09',20180909093449),(2,'2018-09-09','ferramenta a','pagamento da ferramenta a','D','730.00',0,'2018-09-09',20180909093453);
/*!40000 ALTER TABLE `fluxo_caixa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(100) DEFAULT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(10) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `insc_estadual` varchar(20) DEFAULT NULL,
  `insc_municipal` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` VALUES (3,'Fornecedor S.A','Fornecedor S.A','09941-070','Rua FranÃ§a','Diadema','TaboÃ£o','SP','347','','(11) 4308-0644','(11) 9 9134-6177','ricardo.tecnology@gmail.com','123456765433','123456765433',1,'2018-08-21',NULL);
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_produto`
--

DROP TABLE IF EXISTS `fotos_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produto_idx` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_produto`
--

LOCK TABLES `fotos_produto` WRITE;
/*!40000 ALTER TABLE `fotos_produto` DISABLE KEYS */;
INSERT INTO `fotos_produto` VALUES (1,1,'2018.08.13-08.25.40.jpg',1,'2018-08-13',NULL),(2,1,'2018.08.13-08.26.15.jpeg',1,'2018-08-13',NULL),(3,1,'2018.08.13-08.26.27.jpeg',1,'2018-08-13',NULL),(4,2,'2018.08.13-08.27.51.jpg',1,'2018-08-13',NULL),(5,2,'2018.08.13-08.28.08.jpeg',1,'2018-08-13',NULL),(6,2,'2018.08.13-08.28.14.jpeg',1,'2018-08-13',NULL),(7,3,'2018.08.13-08.29.35.jpeg',1,'2018-08-13',NULL),(8,3,'2018.08.13-08.29.54.jpeg',1,'2018-08-13',NULL),(9,3,'2018.08.13-08.30.04.jpeg',1,'2018-08-13',NULL),(10,4,'2018.08.13-08.31.13.jpg',1,'2018-08-13',NULL),(11,4,'2018.08.13-08.31.25.jpeg',0,'2018-08-13','2018-08-13'),(12,4,'2018.08.13-08.31.42.jpg',1,'2018-08-13',NULL),(13,5,'2018.08.13-08.32.50.jpg',1,'2018-08-13',NULL);
/*!40000 ALTER TABLE `fotos_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailings`
--

DROP TABLE IF EXISTS `mailings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `lista` longtext,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailings`
--

LOCK TABLES `mailings` WRITE;
/*!40000 ALTER TABLE `mailings` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paginas`
--

DROP TABLE IF EXISTS `paginas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `bemVindo` longtext COLLATE utf8_bin,
  `fotoIndex` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `textoIndex` longtext COLLATE utf8_bin,
  `tituloIndex` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `textoSobre` longtext COLLATE utf8_bin,
  `textoContato` longtext COLLATE utf8_bin,
  `mapaIframe` longtext COLLATE utf8_bin,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paginas`
--

LOCK TABLES `paginas` WRITE;
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
INSERT INTO `paginas` VALUES (1,1,'<p>Especializa em portas de a&ccedil;o, autom&aacute;ticas e manuais, a serralheria&nbsp;MR&nbsp;est&aacute; sempre buscando melhor atendimento com qualidade, agilidade e custo beneficio justo.<br />\r\n<br />\r\nVisando sempre nossos clientes em primeiro lugar, garantindo nossos servi&ccedil;os.</p>\r\n','fotoIndex.jpg','<ul>\r\n	<li>Portas Autom&aacute;ticas / Manuais</li>\r\n	<li>Estruturas met&aacute;licas / telhados</li>\r\n	<li>Cobertura de policarbonato</li>\r\n	<li>Port&otilde;es basculantes</li>\r\n	<li>Mezaninos</li>\r\n	<li>Escadas e corrim&otilde;es</li>\r\n	<li>Reparos em gerais</li>\r\n</ul>\r\n','ServiÃ§os','<p>Localizada na regi&atilde;o do centro de Diadema, somos uma empresa especializada em portas de a&ccedil;o, com atendimento diferenciado 24 horas por dia.<br />\r\n<br />\r\nAtendemos capital, grande S&atilde;o Paulo,&nbsp;ABCD&nbsp;e tamb&eacute;m cidades do interior.<br />\r\n<br />\r\nCom profissionais capacitados e qualificados, realizamos servi&ccedil;os personalizados adequando as necessidades de nossos clientes</p>\r\n','<h2><strong>Fale Conosco</strong></h2>\r\n\r\n<p>Atendemos toda grande s&atilde;o paulo e interior, ligue agora e solicite-nos um or&ccedil;amento</p>\r\n',NULL,1,'2018-08-13','2018-08-16');
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nomeSistema` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descricao` longtext COLLATE utf8_bin,
  `preco` double DEFAULT NULL,
  `exibe` varchar(1) COLLATE utf8_bin DEFAULT 'S',
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,1,'Portas Automaticas',NULL,'<p>Portas de a&ccedil;o com tamanhos diversificados, instala&ccedil;&atilde;o de portinholas, com chapa galvanizada meia cana lisa ou&nbsp;micro-perfuradas</p>\r\n',1000,'S',1,'2018-08-13','2018-08-16'),(2,1,'Porta de AÃ§o Manual',NULL,'<p>Fabrica&ccedil;&atilde;o, instala&ccedil;&atilde;o, troca de laminas e trocas de molas.</p>\r\n',1000,'S',1,'2018-08-13','2018-08-16'),(3,4,'PortÃµes',NULL,'<p>Fabrica&ccedil;&atilde;o, automatiza&ccedil;&atilde;o, instala&ccedil;&atilde;o e manuten&ccedil;&atilde;o.</p>\r\n',1000,'S',1,'2018-08-13','2018-08-16'),(4,2,'Estruturas MetÃ¡licas',NULL,'<p>Sistema com conforto e economia de espa&ccedil;o, para a sua residencia ou comercio. em&nbsp;&aacute;reas&nbsp;externas ou internas, opcional a instala&ccedil;&atilde;o de corrim&otilde;es.</p>\r\n',1000,'S',1,'2018-08-13','2018-08-16'),(5,3,'Estrutura de policarbonato',NULL,'<p>Aplic&aacute;veis em claraboias, divis&oacute;rias, fechamentos laterais passarelas, com qualidade e excelentes acabamentos</p>\r\n',1000,'S',1,'2018-08-13','2018-08-16'),(6,1,'Estrutura de policarbonato','ESTRUTURA DE POLICARBONATO','Estrutura de policarbonato',1,'N',1,'2018-08-21',NULL),(7,1,'meu produto novo','MEU PRODUTO NOVO','meu produto novo',937,'N',1,'2018-09-09',NULL),(8,1,'um produto teste','UM PRODUTO TESTE','um produto teste',100,'N',1,'2018-09-11',NULL);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_bin DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Ricardo dos Santos Souza','ricardo.tecnology@gmail.com','$2y$10$gXR1yu3b9y9q3zvyjxvxQOHa/50z6flKv4i7FKXK10mi4TrdrrhBm','1',NULL,'2018-04-19'),(3,'teste','teste@teste.com.br','$2y$10$rNP4.DboBBDHy9s8K5GmpeXuj3CtwGRUi0ZJl0x/T2FrTyLk5Imv2','0',NULL,'2018-09-09'),(4,'Morgana','morganagds01@gmail.com','$2y$10$4.GpLv.s8BJTEY7CqJ5K..g..kacl4VpuvfES0lfV9rkrVaLrbK46','1','2018-09-09',NULL),(5,'fabio','fabiobezerra3897@gmail.com','$2y$10$V5ZBU6hAAGywRstyU5mAkut3CSEpG/3YIVo48uSiVYcdyHiniB2Se','1','2018-09-09',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda_parcelas`
--

DROP TABLE IF EXISTS `venda_parcelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda_parcelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venda` int(11) DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `data_previsao` date DEFAULT NULL,
  `pago` int(11) DEFAULT '0',
  `valor` double DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda_parcelas`
--

LOCK TABLES `venda_parcelas` WRITE;
/*!40000 ALTER TABLE `venda_parcelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda_parcelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(45) DEFAULT NULL,
  `id_condicao_pagamento` int(11) DEFAULT NULL,
  `data` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `prazo_entrega` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (43,'10',1,'2018-08-21',1,NULL,1,'2018-08-21',NULL,'30 Dias'),(44,'11',2,'2018-09-09',1,NULL,0,'2018-09-09','2018-09-25','90 dias'),(45,'11',2,'2018-09-09',1,NULL,0,'2018-09-09','2018-09-25','90 dias'),(46,'11',2,'2018-09-09',1,NULL,1,'2018-09-09',NULL,'90 dias'),(47,'11',2,'2018-09-09',1,NULL,0,'2018-09-09','2018-09-10','90 dias');
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas_item`
--

DROP TABLE IF EXISTS `vendas_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venda` varchar(45) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `preco_custo` varchar(45) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas_item`
--

LOCK TABLES `vendas_item` WRITE;
/*!40000 ALTER TABLE `vendas_item` DISABLE KEYS */;
INSERT INTO `vendas_item` VALUES (33,'43',6,3,'Estrutura de policarbonato',1000,'500.00',1,1,'2018-08-21',NULL),(34,'44',7,3,'meu produto novo',937,'100.00',2,0,'2018-09-09','2018-09-25'),(35,'46',6,3,'Estrutura de policarbonato',937,'100.00',2,1,'2018-09-09',NULL),(36,'43',8,3,'um produto teste',100,'100.00',1,1,'2018-09-11',NULL);
/*!40000 ALTER TABLE `vendas_item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-13 12:24:17
