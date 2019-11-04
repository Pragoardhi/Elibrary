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
            <form method="post" class="form-inline mt-2 mt-md-0">
                <input type="text" class="form-control mr-sm-0" name="keyword" placeholder="Judul, Penulis atau Tahun" id="inputSearch">
                <button type="submit" name="select" value="select" class="btn btn-dark my-0 my-sm-0">Cari</button>
            </form>
        </div>
        <br>

        <div class="row">
            <?php
            $count  = count($listBooks);

            if (isset($_POST['select']) && $_POST['keyword'] != NULL) {
                for ($i = 0; $i < $count; $i++) {
                    if ($listBooks[$i]["Judul"] == $_POST['keyword'] ||  $listBooks[$i]["Penulis"] == $_POST['keyword']  || $listBooks[$i]["Year"] == $_POST['keyword']) {
                        echo '<div class="col-lg-3" style="text-align: center">';
                        ?>
                        <img class="w-50" src="<?php echo base_url('upload/book/' . $listBooks[$i]["Image"]) ?>" />
                        <?php
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<h5>' . $listBooks[$i]["Judul"]    . '</h5>';
                                    echo '<p>'  . $listBooks[$i]["Penulis"]  . '</p>';
                                    echo '<p>'  . $listBooks[$i]["Year"]     . '</p>';
                                    ?>
                        <button class="btn btn-dark my-0 my-sm-0" id="pnjbtn" data-toggle="modal" data-target="#pinjamModal<?php echo $i; ?>">Pinjam</button>
                    <?php
                                echo '</div>';
                            }
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
                                    <form class="well form-horizontal" method="post">
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
                                    <button type="submit" class="btn btn-primary" id="buttonCalvin">Simpan</button>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php
                    }
                } else {
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
                    <button class="btn btn-dark" id="pnjbtn" type="button" data-toggle="modal" data-target="#pinjamModal<?php echo $i; ?>"> <i class="fas fa-edit"></i>Pinjam</button>
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
                                    <form class="well form-horizontal" method="post">
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
                                    <button type="submit" class="btn btn-primary" id="buttonCalvin">Simpan</button>
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
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- footer -->
<?php $this->load->view('template/footer.php') ?>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin mau keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih keluar jika udah ga sabar.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Sabar, sebentar lagi keluar.</button>
                <button class="btn btn-danger" onclick="window.location='<?php echo site_url("Login/logout"); ?>'">Keluar sekarang!</button>
            </div>
        </div>
    </div>
</div>

</html>