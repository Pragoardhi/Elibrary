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
			<h1>Tambah Anggota</h1>
		  </div>
		<form style="font-weight: bold;">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="name">Nama*</label>
					<input type="name" class="form-control" id="name" placeholder="......">
				</div>
				<div class="form-group col-md-6">
					<label for="nip">NIP/NRP*</label>
					<input type="number" class="form-control" id="nip" placeholder="......">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="email">Email*</label>
					<input type="text" class="form-control" id="email" placeholder="......">
				</div>
				<div class="form-group col-md-6">
					<label for="nik">NIK*</label>
					<input type="number" class="form-control" id="nik" placeholder="......">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="tempatL">Tempat Lahir*</label>
					<input type="text" class="form-control" id="tempatL" placeholder="......">
				</div>
				<div class="form-group col-md-6">
					<label for="tanggalL">Tanggal Lahir*</label>
					<input type="date" class="form-control">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="pangkat">Pangkat*</label>
					<input type="text" class="form-control" id="pangkat" placeholder="......">
				</div>
				<div class="form-group col-md-6">
					<label for="jabatan">Jabatan*</label>
					<input type="text" class="form-control" id="jabatan" placeholder="......">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="golongan">Golongan*</label>
					<input type="number" class="form-control" id="golongan" placeholder="......">
				</div>
				<div class="col">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="gridCheck">
						<label class="form-check-label" for="gridCheck">
							Check me out
						</label>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<input type="file" class="form-control-file">
					</div>
				</div>
			</div>


			<div class="form-group">
				<button type="submit" class="btn btn-dark">Kirim</button>
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