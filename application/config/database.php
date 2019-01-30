<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;
$hostname ="localhost";
$username ="root";
$password ="";
$database ="bkdpcr";

$achost ="Driver={Microsoft Access Driver (*.mdb)};DBQ=C:\\xampp\htdocs\bkdpcr\FileBKD\BKDDB.mdb";
$acuser ="ALIEF";
$acpass ="12345678";
$imdb ="Driver={Microsoft Access Driver (*.mdb)};DBQ=C:\\xampp\htdocs\bkdpcr\FileBKD\BKDimport.mdb";

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $hostname,
	'username' => $username,
	'password' => $password,
	'database' => $database,
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['access'] = array(
	'dsn'	=> '',
	'hostname' => $achost,
	'username' => $acuser,
	'password' => $acpass,
	'database' => $achost,
	'dbdriver' => 'odbc',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
$db['import'] = array(
	'dsn'	=> '',
	'hostname' => $imdb,
	'username' => $acuser,
	'password' => $acpass,
	'database' => $imdb,
	'dbdriver' => 'odbc',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
