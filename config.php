<?php

/** informasi untuk koneksi database */
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'datamobil';

/** 
 * directory root 
 * jika di echo ABSPATH; // c:/xampp/htdocs/laporan-fpdf/
 **/
define('ABSPATH', str_replace('\\', '/', dirname(__FILE__))  . '/'); 

/**
 * koneksi database dengan mysqli object
 * @var mysqli
 */
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

/** check koneksi */
if ($db->connect_errno) {
	echo 'Error Koneksi : '. $db->connect_error;
	exit() ;
}