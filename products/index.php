<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="A site to portray the different products provided by Herbal Products">
    <meta name="author" content="Junior Lawrence Kibirige junkib94@gmail.com">
    <title>Products : Herbal Products</title>
    <link rel="canonical" href="/">
    <link rel="stylesheet" href="/assets/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-icons/1.7.2/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <meta name="theme-color" content="#7952b3">
    <!-- <link rel="stylesheet" href="/assets/-/cover.css"> -->
</head>

<body style="background-image: url('/assets/images/wallpaper-trans.jpeg');
background-repeat: no-repeat;
background-size: cover;
background-position: center;
background-origin: border-box;">
    <header>
        <div id="navbarHeader" class="bg-dark collapse">
            <div class="bg-dark collapse" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">Products</h4>
                            <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur eos ea cumque rem aliquam earum fuga possimus eaque itaque temporibus fugit saepe ut in doloribus eveniet facilis quis, nemo vel.</p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Contact</h4>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white" style="text-decoration: none;">Follow on &nbsp; <i class="bi bi-twitter" style="color: aqua;"></i></a></li>
                                <li><a href="#" class="text-white" style="text-decoration: none;">Like on &nbsp; <i class="bi bi-facebook" style="color: blue;"></i></a></li>
                                <li><a href="#" class="text-white" style="text-decoration: none;">Email me <i class="bi bi-envelope-check-fill" style="color: grey;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <i class="bi bi-credit-card mr-2"></i>
                    &MediumSpace;
                    <strong>Products</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1>Herbal Products' Products</h1>
                </div>
                <p class="lead muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, dolorum quae ea quam doloribus eos hic quod amet consequatur laborum voluptatem dolores iste. Quo nostrum sapiente autem, modi animi eveniet.</p>
            </div>
        </section>
        <div class="album py-5 bg-light text-black" style="--bs-bg-opacity: 0.4;">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            $products = [];
            array_push($products, implode(',', glob('/products/images/*.jpeg')));
            array_push($products, implode(',', glob('/products/images/*.jpg')));
            array_push($products, implode(',', glob('/products/images/*.png')));
            var_dump($products);

            ?>
        </div>
    </div></div>
    </main>
    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#"><i class="bi bi-arrow-up-circle-fill" style="color: grey; font-size: 3rem;"></i></a>
            </p>
            <p class="mb-0">
                <small>Created with <i class="bi bi-heart-fill text-danger"></i> by Lawrence Junior Kibirige</small>
            </p>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="/assets/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assets/popperjs/core/2.10.2/popper.min.js"></script>
    <script src="/assets/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
