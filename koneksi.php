<?php
// Membuat variabel, ubah sesuai dengan nama host dan database pada hosting 
$host	= "localhost";
$user	= "root";
$pass	= "toor";
$db	    = "db_kontak";

//Menggunakan objek mysqli untuk membuat koneksi dan menyimpan nya dalam variabel $mysqli	
$mysqli = new mysqli($host, $user, $pass, $db);

?>