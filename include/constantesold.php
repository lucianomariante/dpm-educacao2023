<?php
session_start();

/*************************************************
		Arquivo de constantes usadas pelo sistema
 ***************************************************/

header('Content-Type: text/html; charset=utf-8');

define('cSNomeEmpresa', '.: DPM Educação :.');
define('cSUrlSiteEmpresa', 'https://dpmeducacao.com.br/');
define('cSSegmentoAtendimento', 'Educação');
define('cSTelefone1', '(51) 3094.3440');
define('cSTelefone2', '');
define('cSTelefone3', '');
define('cSEncriptacao', '');
define('cSSiteEmpresa', 'dpmeducacao.com.br');
define('cSLogoMarca', '');

/***************** DESENVOLVIMENTO *************************/

/* Constantes de Envio/Recebimento de Emails */
// define('CFGHOST', 'smtp.teraware.info');
// define('CFGEMAILENVIO', 'developer@teraware.info');
// define('CFGSENHAEMAIL', 'Qwe@2019');
// define('CFGEMAILRECEBIMENTO', 'developer@teraware.info');

/* DPM EDUCACAO - Base de dados **************/
// define("vGUsername", "teraware10");
// define("vGPassword", "x9HeTIrz");
// define("vGBancoSite", "teraware10");
// define("vGHostSite", "mysql.teraware.info");

/* DPM-RS - Base de dados ********************/
// define("vGUsernameDPM", "teraware02");
// define("vGPasswordDPM", "0Ll1TmWRJ4Y");
// define("vGBancoSiteDPM", "teraware02");
// define("vGHostSiteDPM", "mysql.teraware.info");

// define("USUARIO_API", 8);
// define("SENHA_API", '8eph9HexARvS30URsH8i');

/********************** PRODUCAO **************************/

/* Constantes de Envio/Recebimento de Emails */
define('CFGHOST', 'smtpi.uni5.net');
define('CFGEMAILPORTA', '587');
define('CFGEMAILENVIO', 'inscricoescursos@dpmeducacao.com.br');
define('CFGSENHAEMAIL', 'pernambuco1001');
define('CFGEMAILRECEBIMENTO', 'inscricoescursos@dpmeducacao.com.br');

/* DPM EDUCACAO - Base de dados **************/
define("vGUsername", "dpmeducacao");
define("vGPassword", "VN94KSXF");
define("vGBancoSite", "dpmeducacao");
define("vGHostSite", "mysql.dpmeducacao.com.br");
// define("vGHostSite", "mysql26-farm1.kinghost.net");

/* DPM-RS - Base de dados ********************/
define("vGUsernameDPM", "sheldon");
define("vGPasswordDPM", "Bazinga77");
define("vGBancoSiteDPM", "extranet_BPP");
define("vGHostSiteDPM", "extranet-bpp.cdkj4udcwhnu.us-east-1.rds.amazonaws.com");

define("USUARIO_API", 8);
define("SENHA_API", '8eph9HexARvS30URsH8i');

/*********************************************************
	Roner Rodrigues - 03/09/2020
	Integracao Envio de Email Amazon SES
 *****************************************************/
define("senderSES", "sistema@borbapauseperin.adv.br");
define("usernameSmtpSES", "AKIASS2ZB7XHGW74TA4J");
define("passwordSmtpSES", "BOMeFrlh2z03JVVvGMoNj1BlDkZPa55oiB4O2sMefwP/");
define("hostSES", "email-smtp.us-east-1.amazonaws.com");
define("portSES", 587);

// define("DOMINIO", 'dpm-educacao-institucional');

// start the timer for the page parse time log
define('PAGE_PARSE_START_TIME', microtime());

require_once __DIR__ . DIRECTORY_SEPARATOR . 'funcoes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'funcoesBanco.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'funcoesBancoPDO.php';

// teste
