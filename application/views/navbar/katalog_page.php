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

        <div class="form-group">
                <div class="inputGroupContainer">
                    <div class="input-group">
                    <form method="post" class="form-inline mt-2 mt-md-0">
                        <span class="input-group-addon"></span>
                            <?php $count = count($listtipe); ?>
                                <select class="form-control" id="tipebuku" name="tipebuku" onchange="this.form.submit()">
                                <option>Filter</option>
                                <option value="0">...</option>
                            <?php for ($i = 0; $i < $count; $i++) { ?>
                                <option value="<?php echo $listtipe[$i]["id"] ?>" name="option" onchange="getval(this);"><?php echo $listtipe[$i]["Tipe"] ?></option>
                            <?php } ?>
                        </select>
                    </form>       
                    </div>
                </div>
        </div>
        <br>
        <br>
        <br>

        <div class="row">
            <?php

                $count  = count($listBooks);
                $tipe = null;


                if(isset($_POST['tipebuku']) == 1){
                    $tipe = $_POST['tipebuku'];
                    for ($i = 0; $i < $count; $i++) {
                        if($tipe > 0){
                            if($listBooks[$i]["id_tipe"] == $tipe){
                                echo '<div class="col-lg-3" style="text-align: center">';
            ?>
                                <img class="w-50" src="<?php echo base_url('upload/book/' . $listBooks[$i]["Image"]) ?>" />
                                <?php
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<h5>' . $listBooks[$i]["Judul"]   . '</h5>';
                                    echo '<p>'  . $listBooks[$i]["Penulis"] . '</p>';
                                    echo '<p>'  . $listBooks[$i]["Year"]    . '</p>';
                                ?>
                                <?php if ($this->session->userdata('statususer') == "login") { 
                                    $countPem  = count($PemBooks);
                                    $param = false;
                                    for($j = 0; $j < $countPem; $j++){
                                        if($listBooks[$i]["ID"] == $PemBooks[$j]["ID_Buku"]){
                                            $param = true;
                                        }
                                    }
                                    if($param == true){?>
                                        <button class="btn btn-dark" id="pnjbtn" type="button" onclick="alertku()"> <i class="fas fa-edit"></i>Pinjam</button>
                                        <script>
                                            function alertku() {
                                                alert("Buku sudah dipinjam!!!");
                                            }
                                        </script>
                                    <?php } else {?>
                                        <button class="btn btn-dark" id="pnjbtn" type="button" data-toggle="modal" data-target="#pinjamModal<?php echo $i; ?>"> <i class="fas fa-edit"></i>Pinjam</button>
                                    <?php } ?>
                                    <?php
                                    echo '<br>';
                                }
                                echo '</div>';?>
                                <div class="modal fade" id="pinjamModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pinjam</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="well form-horizontal" method="post" action="<?= base_url() ?>Home/addPinjam/<?php echo $listBooks[$i]["ID"] ?>">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <span></span>
                                                            <label class="control-label">Kapan mau pinjam buku ini?</label>
                                                            <div class="inputGroupContainer">
                                                                <div class="form-group"><span class="input-group-addon"></span><input type="date" id="tglPnj" name="tglPnj" placeholder="......" class="form-control" required="true" value="" rw></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak jadi</button>
                                                        <button type="submit" class="btn btn-primary" id="buttonCalvin" onclick="location.href='<?= base_url() ?>Home/addPinjam/<?php echo $listBooks[$i]["ID"] ?>'">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            <?php } ?>
                        <?php }else{for ($i = 0; $i < $count; $i++) {
                        echo '<div class="col-lg-3" style="text-align: center">';
                    ?>
                        <img class="w-50" src="<?php echo base_url('upload/book/' . $listBooks[$i]["Image"]) ?>" />
                        <?php
                            echo '<br>';
                            echo '<br>';
                            echo '<h5>' . $listBooks[$i]["Judul"]   . '</h5>';
                            echo '<p>'  . $listBooks[$i]["Penulis"] . '</p>';
                            echo '<p>'  . $listBooks[$i]["Year"]    . '</p>';
                            ?>
                    <?php if ($this->session->userdata('statususer') == "login") { 
                            $countPem  = count($PemBooks);
                            $param = false;
                            for($j = 0; $j < $countPem; $j++){
                                if($listBooks[$i]["ID"] == $PemBooks[$j]["ID_Buku"]){
                                    $param = true;
                                }
                            }
                            if($param == true){?>
                                <button class="btn btn-dark" id="pnjbtn" type="button" onclick="alertku()"> <i class="fas fa-edit"></i>Pinjam</button>
                                <button class="btn btn-dark" onclick="location.href='<?= base_url() ?>Home/Detailbuku/<?php echo $listBooks[$i]["Judul"] ?>'"><i class="fas fa-align-justify">Detail</i></button>
                                <script>
                                    function alertku() {
                                      alert("Buku sudah dipinjam!!!");
                                    }
                                </script>
                            <?php } else {?>
                                <button class="btn btn-dark" id="pnjbtn" type="button" data-toggle="modal" data-target="#pinjamModal<?php echo $i; ?>"> <i class="fas fa-edit"></i>Pinjam</button>
                                <button class="btn btn-dark" onclick="location.href='<?= base_url() ?>Home/Detailbuku/<?php echo $listbuku[$i]["Judul"] ?>'"><i class="fas fa-align-justify">Detail</i></button>

                            <?php } ?>
                            <?php
                                echo '</div>';
                        ?>
    
                        <div class="modal fade" id="pinjamModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pinjam</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="well form-horizontal" method="post" action="<?= base_url() ?>Home/addPinjam/<?php echo $listBooks[$i]["ID"] ?>">
                                            <fieldset>
                                                <div class="form-group">
                                                    <span></span>
                                                    <label class="control-label">Kapan mau pinjam buku ini?</label>
                                                    <div class="inputGroupContainer">
                                                        <div class="form-group"><span class="input-group-addon"></span><input type="date" id="tglPnj" name="tglPnj" placeholder="......" class="form-control" required="true" value="" rw></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak jadi</button>
                                        <button type="submit" class="btn btn-primary" id="buttonCalvin" onclick="location.href='<?= base_url() ?>Home/addPinjam/<?php echo $listBooks[$i]["ID"] ?>'">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    <?php } ?>
                <?php }else{
                    for ($i = 0; $i < $count; $i++) {
                        echo '<div class="col-lg-3" style="text-align: center">';
                    ?>
                        <img class="w-50" src="<?php echo base_url('upload/book/' . $listBooks[$i]["Image"]) ?>" />
                        <?php
                            echo '<br>';
                            echo '<br>';
                            echo '<h5>' . $listBooks[$i]["Judul"]   . '</h5>';
                            echo '<p>'  . $listBooks[$i]["Penulis"] . '</p>';
                            echo '<p>'  . $listBooks[$i]["Year"]    . '</p>';
                            ?>
                            <?php if ($this->session->userdata('statususer') == "login") { 
                                $countPem  = count($PemBooks);
                                $param = false;
                                for($j = 0; $j < $countPem; $j++){
                                    if($listBooks[$i]["ID"] == $PemBooks[$j]["ID_Buku"]){
                                        $param = true;
                                    }
                                }
                                if($param == true){?>
                                    <button class="btn btn-dark" id="pnjbtn" type="button" onclick="alertku()"> <i class="fas fa-edit"></i>Pinjam</button>
                                    <script>
                                        function alertku() {
                                            alert("Buku sudah dipinjam!!!");
                                        }
                                    </script>
                                <?php } else {?>
                                    <button class="btn btn-dark" id="pnjbtn" type="button" data-toggle="modal" data-target="#pinjamModal<?php echo $i; ?>"> <i class="fas fa-edit"></i>Pinjam</button>

                                    <button class="btn btn-dark" onclick="location.href='<?= base_url() ?>Home/Detailbuku/<?php echo $listbuku[$i]["Judul"] ?>'"><i class="fas fa-align-justify">Detail</i></button>
                                <?php } ?>
                            <?php
                                echo '<br>';
                            ?>
                            <?php } ?>
                            <?php
                                echo '</div>';
                        ?>
    
                        <div class="modal fade" id="pinjamModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pinjam</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="well form-horizontal" method="post" action="<?= base_url() ?>Home/addPinjam/<?php echo $listBooks[$i]["ID"] ?>">
                                            <fieldset>
                                                <div class="form-group">
                                                    <span></span>
                                                    <label class="control-label">Kapan mau pinjam buku ini?</label>
                                                    <div class="inputGroupContainer">
                                                        <div class="form-group"><span class="input-group-addon"></span><input type="date" id="tglPnj" name="tglPnj" placeholder="......" class="form-control" required="true" value="" rw></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak jadi</button>
                                        <button type="submit" class="btn btn-primary" id="buttonCalvin" onclick="location.href='<?= base_url() ?>Home/addPinjam/<?php echo $listBooks[$i]["ID"] ?>'">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }   
            }

                ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- footer -->S
<?php $this->load->view('template/footer.php') ?>

</html>