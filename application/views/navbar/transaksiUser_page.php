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
            <h1>Transaksi Buku</h1>
        </div>
        <br>
        
        <div class="input-group" style="margin: 10px 0px 10px 0px">
        <form method="post" class="form-inline mt-2 mt-md-0">
            <input type="text" class="form-control mr-sm-0" name="keyword" placeholder="Judul, Penulis atau Tahun" id="inputSearch">
            <button type="submit" name="select"  value="select" class="btn btn-dark my-0 my-sm-0">Cari</button>
        </form>
        </div>
        <br>
        
        <div class="card shadow mb-4">
            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Buku</th>
                                            <th>Gambar</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Batas Pengembalian</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count  = count($listPeminjaman);
                                            if($count == 0){
                                                echo '<tr>
                                                    <th>-</th>
                                                    <th>-</th>
                                                    <th>-</th>
                                                    <th>-</th>
                                                    <th>-</th>
                                                    <th>-</th>
                                                </tr>';
                                            }
                                            else{
                                                $no = 1;
                                                for ($i = 0; $i < $count; $i++){
                                                    if($listPeminjaman[$i]["Approval"]){
                                                    echo '<tr>';
                                                    echo '<th>' . $no . '</th>';
                                                    echo '<th>' . $listPeminjaman[$i]["Judul"] . '</th>';
                                                    ?>
                                                        <th><img class="w-50" src="<?php echo base_url('upload/book/' . $listPeminjaman[$i]["Image"]) ?>" /></th>
                                                    <?php
                                                    $tgl_pinjam = date('d F Y', strtotime($listPeminjaman[$i]["Tgl_Peminjaman"]));
                                                    $tgl_kembali = date('d F Y', strtotime($listPeminjaman[$i]["Tgl_Pengembalian"]));
                                                    echo '<th>' . $tgl_pinjam . '</th>';
                                                    echo '<th>' . $tgl_kembali . '</th>';
                                                    $today=date ("YYYY-MM-DD");
                                                    $tgl_today = date('Y-m-d');;
                                                    if ($listPeminjaman[$i]["Tgl_Pengembalian"] > $tgl_today){
                                                        echo '<th>-</th>';
                                                    }else {
                                                        echo '<th>Buku Belum Dikembalikan.</th>';
                                                    }
                                                    echo '</tr>';
                                                    $no = $no + 1;
                                                    }
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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