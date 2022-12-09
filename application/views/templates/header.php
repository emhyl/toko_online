<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Toko-online</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url() ?>assets/css/styles-user.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <!-- <a class="navbar-brand" href="#!">Start Bootstrap</a> -->
                <form class="d-flex" action="<?= base_url() ?>index.php/dashboard/keranjang" method="post">
                    <button class="btn btn-outline-dark mx-1" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?= $cart ?>
                        </span>
                    </button>
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('dashboard/profil') ?>"><i class="fas fa-user"></i> Profil</a></li>
                       <!--  <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    
                    <button type="button" class="btn btn-light position-relative me-4">
                      <a href="<?= base_url('index.php/dashboard/keranjang/order') ?>"> <i class="fas fa-shopping-bag"></i> </a>
                      <?php if($order > 0){ ?>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= $order ?>
                        <span class="visually-hidden">unread messages</span>
                      </span>
                      <?php } ?>
                    </button>

                    <div class="text-primary p-2">
                      <a href="<?= base_url('index.php/dashboard/keranjang/riwayat') ?>"> <i class="fas fa-history"></i> </a>
                    </div>
                    <?php if(!$this->session->userdata('user')){ ?>
                    <div class="d-flex">
                        <a class="btn  mx-1" href="<?= base_url() ?>index.php/dashboard/login" >
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Login
                        </a>
                        <a class="btn" href="<?= base_url() ?>index.php/dashboard/registrasi" >
                            <i class="fa-solid fa-user-plus"></i>
                            Registrasi
                        </a>
                    </div>
                    <?php }else{ ?>
                    <div class="d-flex">
                        <ul class="list-group list-group-flush border border-light rounded">
                            <li class="nav-item dropdown list-group-item bg-light">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i> <?= $this->session->userdata('user') ?></a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><san class="dropdown-item" ><?= $this->session->userdata('user') ?></span></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <!-- <li><a class="dropdown-item" href="#!">My Cart</a></li> -->
                                    <li><a class="dropdown-item" href="<?= base_url() ?>index.php/dashboard/login">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark ">
            <img src="<?= base_url() ?>assets/img/bg_buah.png" class="img-fluid" alt="..." style="width:100%;height: 284px">
        </header>