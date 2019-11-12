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
    <tr class="container">
      <div>
        <h1>Data Anggota</h1>
      </div>
      <br>
      <div class="input-group" style="margin: 10px 0px 10px 0px">
        
        
        <form method="post" class="form-inline mt-2 mt-md-0">
          <input type="text" class="form-control mr-sm-0" id="inputSearch" onkeyup="myFunction()" placeholder="Nama, NIP atau NRP" title="Type in a name">
        </form>
      </div>

     <table id="myTable" class="table table-striped table-bordered" style="width:100%; text-align:center;">
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

    <script>
      $(document).ready(function(){
        $('#inputSearch').keyup(function(){
          search_table($(this).val());
        });

        function search_table(value){
          $('#myTable tr').each(function(){
            var found = 'false';
            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
              found = 'true';
            }
          });
          if(found == 'true'){
            $(this).show();
          } else{
            $(this).hide();
          }
        }
      });
    </script>

      </div>
    </div>
  </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
</body>

<!-- footer -->
<?php $this->load->view('template/footer.php') ?>

</html>