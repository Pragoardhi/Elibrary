<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" type="text/css">

    <title>E-Library</title>
</head>

<body>
    <!-- head navbar -->
    <?php $this->load->view('template/header.php') ?>
    <br>
    <!-- content -->
    
      <div class="container"  style="margin-bottom: 50px">
        <h1>Data Anggota</h1>
      </div>
      <br>
     

      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="myTable" name="tableuser" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $count  = count($listUser);
              for ($i = 0; $i < $count; $i++) {
                    echo '<tr role="row" class="odd">';
                    echo '<td>'. $i .'</td>';
            ?>
            <td><img src="<?php echo base_url('upload/user/' . $listUser[$i]["image"]) ?>"/></td>
            <?php
                    echo '<td>'. $listUser[$i]["username"] .'</td>';
                    echo '<td>mantap</td>';
                    echo '<td>'  . $listUser[$i]["email"]   . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
        </table>
        </div>
      </div>
   
  



  <script src="<?php echo base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets') ?>/js/sb-admin-2.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>


<script>
      $(document).ready(function(){
        $('#myTable').DataTable();
    });
    </script>
</body>

<!-- footer -->
<?php $this->load->view('template/footer.php') ?>

</html>