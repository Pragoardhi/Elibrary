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
    <!-- content -->
    <br>
    <div class="container" style="margin-bottom: 50px">
        <div>
            <h1>Katalog Buku</h1>
        </div>
        <br>

    <div class="input-group" style="margin: 10px 0px 10px 0px">
    <form method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Judul, Penulis atau Tahun" id="inputSearch">
        <input type="submit" name="select" btn-dark>
    </form>
    </div>
    <br>

        <div class="row">
            <?php
                $count  = count($listBook);
                echo '<script>console.log("test1")</script>';

                function cari($val){

                }

            if(isset($_POST['select']) && $_POST['keyword'] == NULL){
                for($i = 0; $i < $count; $i++) {
                    echo '<div class="col-lg-3" style="text-align: center">';
                    ?>
                    <img class="w-50" src="<?php echo base_url('upload/book/' . $listBook[$i]["Image"]) ?>"/>
                    <?php
                    echo '<br>';
                    echo '<br>';
                    echo '<h5>' . $listBook[$i]["Judul"]    . '</h5>';
                    echo '<p>'  . $listBook[$i]["Penulis"]  . '</p>';
                    echo '<p>'  . $listBook[$i]["Year"]     . '</p>';
                    echo '</div>';
                }
            }

            else if(isset($_POST['select']) && $_POST['keyword'] != NULL){
                for($i = 0; $i < $count; $i++) {
                    if($listBook[$i]["Judul"] == $_POST['keyword'] ||  $listBook[$i]["Penulis"] == $_POST['keyword']  || $listBook[$i]["Year"] == $_POST['keyword']){
                    echo '<div class="col-lg-3" style="text-align: center">';
                    ?>
                    <img class="w-50" src="<?php echo base_url('upload/book/' . $listBook[$i]["Image"]) ?>"/>
                    <?php
                    echo '<br>';
                    echo '<br>';
                    echo '<h5>' . $listBook[$i]["Judul"]   . '</h5>';
                    echo '<p>'  . $listBook[$i]["Penulis"] . '</p>';
                    echo '<p>'  . $listBook[$i]["Year"]    . '</p>';
                    echo '</div>';
                    }  
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