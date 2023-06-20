<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets'); ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media (min-width: 991px) {
            .n2 {
                display: none;
        }
        }
        @media (max-width: 991px) {
            .n1 {
                display: none;
        }
        
        }
        @media (max-width: 710px) {
            .h2i {
                display: none;
            }
        }
        @media (min-width: 710px) {
            .h2o {
                display: none;
            }
        }        
        @media (max-width: 393px) {
            .hh1 {
                font-size: 16px;
        }
        .hh2 {
            font-size: 16px;
        }
        }

        

    </style>

    </head>

    <?php if($this->session->userdata('role') == 'admin') { ?>
        <body id="page-top" data-bs-theme="dark" style="background-image: url('<?= base_url('assets/img/cover2.jpeg') ?>'); background-repeat: no-repeat; background-size: cover;">
    <?php } else { ?>
        <body id="page-top" class="bg-dark" data-bs-theme="dark">
        <?php } ?>




