<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/style.css">

    <title>Login</title>
</head>

<body>
    <?php $this->load->view('template/header.php') ?>

    <form style="background-image: url(<?php echo base_url('assets') ?>/image/bg-login.jpg)" method="post" action="<?= base_url('Login/login') ?>">
        <?= $this->session->flashdata('message'); ?>
        <div class="card" id="card1">
            <div class="form-group text-center">
                <div id="fontMasuk" class="text-center">Masuk</div>
                <input type="email" name="email" class="form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group text-center">
                <input type="password" name="password" class="form-control-lg" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark" id="buttonSubmit">Masuk</button>
            </div>
            <div class="text-center" id="link">
                <a href="#" class="card-link">Lupa Password?</a>
                <a href="TambahAnggota.html" class="card-link">Belum Punya Akun? Daftar</a>
            </div>
        </div>
    </form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<?php $this->load->view('template/footer.php') ?>

</html>