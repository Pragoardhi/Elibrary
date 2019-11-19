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

<!-- navbar -->
    <?php $this->load->view('template/header.php') ?>

<!-- content-->
    <div class= "container"  style="margin-bottom: 50px">

    <form style="width:100%;">
        
        <?= $this->session->flashdata('message'); ?>
        <div class="card mb-3" id="card1" style="max-width: 18rem;">
            <div class="form-group text-center">
                <div id="fontMasuk" class="text-center">Masuk</div>

                <?php if ($this->session->flashdata('gagallogin') == TRUE) { ?>
                    <div role="alert" id="alertgagal" class="alert alert-danger alert-dismissible" style="text-align:center">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
                        </button>
                        <p style="text-align: center"><?php echo $this->session->flashdata('gagallogin') ?></p>
                    </div>
                    <script>
                        window.setTimeout(function() {
                            $("#alertgagal").fadeTo(500, 0).slideUp(500, function() {
                                $(this).remove();
                            });
                        }, 3000);
                    </script>
                <?php } ?>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group text-center">
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark" id="buttonSubmit">Masuk</button>
            </div>

        </div>
    </form>
   
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</body>

<?php $this->load->view('template/footer.php') ?>

</html>