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
    <div class="container">
		<div id="judul">
			<h1>Pengadaan Pustaka</h1>
		  </div>
		<form style="font-weight: bold;">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="name">Nama*</label>
					<input type="name" class="form-control" id="name" placeholder="......">
				</div>
				<div class="form-group col-md-6">
					<label for="penulis">Penulis*</label>
					<input type="text" class="form-control" id="penulis" placeholder="......">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="email">Email*</label>
					<input type="text" class="form-control" id="email" placeholder="......">
				</div>
				<div class="form-group col-md-6">
					<label for="penerbit">Penerbit*</label>
					<input type="text" class="form-control" id="penerbit" placeholder="......">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="noTel">No Telp*</label>
					<input type="number" class="form-control" id="noTel" placeholder="......">
				</div>
				<div class="form-group col-md-6">
					<label for="isbn">ISBN*</label>
					<input type="number" class="form-control" id="isbn" placeholder="......">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="jdl">Judul*</label>
					<input type="text" class="form-control" id="jdl" placeholder="......">
				</div>
				<div class="form-group col-md-6">
					<label for="harga">Harga*</label>
					<input type="number" class="form-control" id="harga" placeholder="......">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
                        <label for="tipe">Tipe*</label>
                        <select id="tipe" class="form-control">
                            <option selected>......</option>
                            <option>Jurnal</option>
                            <option>Novel</option>
                            <option>Kamus</option>
                        </select>
                </div>
                <div class="form-group col-md-6">
					<label for="ket">Keterangan*</label>
					<input type="text" class="form-control" id="ket" placeholder="......">
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="gridCheck">
						<label class="form-check-label" for="gridCheck">
							Check me out
						</label>
					</div>
				</div>	
				<div class="form-group">
                    <a href="Berhasil+buku.html" class="btn btn-secondary btn-lg " tabindex="-1" role="button" aria-disabled="true">Kirim</a>
			</div>
		</form>
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