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
        
        
        <form method="post" class="form-inline mt-2 mt-md-0">
          <input type="text" class="form-control mr-sm-2" name="keyword" placeholder="Nama, NIP atau NRP" id="inputSearch">
          <button type="submit" name="select" value="select" class="btn btn-dark my-2 my-sm-0">Cari</button>
        </form>
      </div>

      <div class="container" id="marketing">
        <div class="row">
            <?php
                $count  = count($listUser);
                echo '<script>console.log("ini0")</script>';

                if(isset($_POST['select']) && $_POST['keyword'] != NULL){
                  for($i = 0; $i < $count; $i++){
                    if($listUser[$i]["username"] == $_POST['keyword'] || $listUser[$i]["id"] == $_POST['keyword']){
                    echo '<div class="col-lg-4" id="kolom">';
                    ?>
                    <img class="w-50" src="<?php echo base_url('upload/user/' . $listUser[$i]["image"]) ?>"/>
                    <?php
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
                }
                else{
                  for($i = 0; $i < $count; $i++){
                    echo '<div class="col-lg-4" id="kolom">';
                    ?>
                    <img class="w-50" src="<?php echo base_url('upload/user/' . $listUser[$i]["image"]) ?>"/>
                    <?php
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