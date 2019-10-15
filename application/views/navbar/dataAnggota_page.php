<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/style.css" type="text/css">

    <title>E-Library</title>
</head>

<body>
    <!-- head navbar -->
    <?php $this->load->view('template/header.php') ?>
    <br>
    <!-- content -->
    <div class="container">
      <div>
        <h1>Data Anggota</h1>
      </div>
      <br>
      <div class="input-group" style="margin: 10px 0px 10px 0px">
        
        
        <form method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Nama, NIP atau NRP" id="inputSearch">
          
          <input type="submit" name="select" value="select" >
        </form>
      </div>

      <div class="container" id="marketing">
        <div class="row">
            <?php
                $count  = count($listUser);
                echo '<script>console.log("ini0")</script>';

                function cari($val){
                  
                }

                if(isset($_POST['select']) && $_POST['keyword'] == NULL){
                  for($i = 0; $i < $count; $i++){
                    echo '<div class="col-lg-4" id="kolom">';
                    echo '<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">' ;
                    echo '<title>Placeholder</title>' ;
                    echo '<rect width="100%" height="100%" fill="#777"></rect>' ;
                    echo '</svg>' ;
                          
                        
                      echo '<br>';
                      echo '<br>';
                      echo '<h5>' . $listUser[$i]["id"] . '</h5>';
                      echo '<p>'. $listUser[$i]["username"] . '</p>';
                      echo '</div>';
                  }
                } 
                
                else if(isset($_POST['select']) && $_POST['keyword'] != NULL){
                  for($i = 0; $i < $count; $i++){
                    if($listUser[$i]["username"] == $_POST['keyword']){
                    echo '<div class="col-lg-4" id="kolom">';
                    echo '<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">' ;
                    echo '<title>Placeholder</title>' ;
                    echo '<rect width="100%" height="100%" fill="#777"></rect>' ;
                    echo '</svg>' ;
                          
                      echo $i;
                      echo '<br>';
                      echo '<br>';
                      echo '<h5>' . $listUser[$i]["id"] . '</h5>';
                      echo '<p>'. $listUser[$i]["username"] . '</p>';
                      echo '</div>';
                    } 
                  }
                }    
                $_POST['keyword'] == NULL; 
            ?>
      </div>
    </div>
  </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- footer -->
<?php $this->load->view('template/footer.php') ?>

</html>