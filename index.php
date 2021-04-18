<!DOCTYPE html>
<html>
  <head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <title>Kontak</title>
  </head>
  <body>
    
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-12">
        <h1>Data Kontak</h1>
      </div>  
    </div>
    <hr>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- List Data Menggunakan DataTable -->              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <hr>
  </div>

 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>



<script>
      
      $(function(){

           $('.table').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax":{
                       "url": "ajax/ajax_kontak.php?action=table_data",
                       "dataType": "json",
                       "type": "POST"
                     },
              "columns": [
                  { "data": "no" },
                  { "data": "nama" },
                  { "data": "no_hp" },
                  { "data": "aksi" },
              ]  

          });
        });

    

</script>




</body>
</html>