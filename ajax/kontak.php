<?php
require '../ssp.class.php';

$table = 'tbl_kontak';
$primary_key = 'id';
$columns = array(
    array( 'db' => 'id', 'dt' => 0),
    array( 'db' => 'nama', 'dt' => 1),
    array( 'db' => 'no_hp', 'dt' => 2),
    array( 
        'db' => 'id', 
        'dt' => 3,
        'formatter' => function ($d, $row){
            return "<a href='#' class='btn-warning btn-sm'>Ubah</a>&nbsp; <a href='#' class='btn-danger btn-sm'>Hapus</a>";
        }
    )
);
$sql_details = array(
    'host'	=> "localhost",
    'user'	=> "root",
    'pass'	=> "toor",
    'db'	=> "db_kontak"
);
echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primary_key, $columns)
);