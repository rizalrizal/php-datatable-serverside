<?php 
require_once '../koneksi.php';

if($_GET['action'] == "table_data"){


		$columns = array( 
	                            0 =>'id', 
	                            1 =>'nama',
	                            2=> 'no_hp',
	                            3=> 'id',
	                        );

		$querycount = $mysqli->query("SELECT count(id) as jumlah FROM tbl_kontak");
		$datacount = $querycount->fetch_array();
	
  
        $totalData = $datacount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
            
        if(empty($_POST['search']['value']))
        {            
        	$query = $mysqli->query("SELECT id,nama,no_hp FROM tbl_kontak order by $order $dir 
        																LIMIT $limit 
        																OFFSET $start");
        }
        else {
            $search = $_POST['search']['value']; 
            $query = $mysqli->query("SELECT id,nama,no_hp FROM tbl_kontak WHERE nama LIKE '%$search%' 
            															or no_hp LIKE '%$search%' 
            															order by $order $dir 
            															LIMIT $limit 
            															OFFSET $start");


           $querycount = $mysqli->query("SELECT count(id) as jumlah FROM tbl_kontak WHERE nama LIKE '%$search%' 
       																						or no_hp LIKE '%$search%'");
		   $datacount = $querycount->fetch_array();
           $totalFiltered = $datacount['jumlah'];
        }

        $data = array();
        if(!empty($query))
        {
            $no = $start + 1;
            while ($r = $query->fetch_array())
            {
                $nestedData['no'] = $no;
                $nestedData['nama'] = $r['nama'];
                $nestedData['no_hp'] = $r['no_hp'];
                $nestedData['aksi'] = "<a href='#' class='btn-warning btn-sm'>Ubah</a>&nbsp; <a href='#' class='btn-danger btn-sm'>Hapus</a>";
                $data[] = $nestedData;
                $no++;
            }
        }
          
        $json_data = array(
                    "draw"            => intval($_POST['draw']),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 

}