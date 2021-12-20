<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Giant Herbal Remedies makes Herbal remedies using fresh & Herbal natural ingredients. All of our natural remedies are processed in small batches with high quality, natural, herbal ingredients, for maximum healing power.
We are committed to offering the highest quality, natural remedies possible.">
  <meta name="author" content="Junior Lawrence Kibirige junkib94@gmail.com">
  <?php include_once 'includes/met.inc.php' ?>
  <title>Giant Herbal Remedies</title>
  <link rel="stylesheet" href="assets/bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap-icons/1.7.2/font/bootstrap-icons.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
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
  <link rel="stylesheet" href="assets/-/cover.css">
  <style>
    .navbar-expand-lg .navbar-nav .nav-link {
      padding-right: .5rem;
      padding-left: .5rem;
    }

    .navbar-expand-lg .navbar-nav {
      flex-direction: row;
    }
  </style>
</head>

<body class="h-100 text-center text-white bg-dark" style="background: url('assets/images/wallpaper.jpeg') no-repeat; background-size: cover; ">
  <!-- Google Tag Manager (noscript) -->
  <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVR4VKL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
  <!-- End Google Tag Manager (noscript) -->
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="">
      <div class="">
        <?php $active = '/'; ?>
        <nav class="navbar bg-dark navbar-dark navbar-expand-lg justify-content-center">
          <div class="container-fluid">
            <a class="navbar-brand">
            <img src="/images/favicon-32x32.png" class="bi bi-credit-card mr-2">
              Giant Herbal Remedies</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="<?php if ($active == '/') echo 'javascript:void(0)';
                            else echo '/'; ?>" class="nav-link <?php if ($active == '/') echo 'active'; ?>" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                  <a href="<?php if ($active == 'products') echo 'javascript:void(0)';
                            else echo '/products'; ?>" class="nav-link <?php if ($active == 'products') echo 'active'; ?>">Products</a>
                </li>
                <li class="nav-item">
                  <a href="<?php if ($active == 'about') echo 'javascript:void(0)';
                            else echo '/about'; ?>" class="nav-link <?php if ($active == 'about') echo 'active'; ?>">About</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <main class="px-3">
      <h1>
        Welcome to Giant Herbal Remedies Products
      </h1>
      <p class="lead">
        Giant Herbal Remedies makes Herbal remedies using fresh & Herbal natural ingredients. All of our natural remedies are processed in small batches with high quality, natural, herbal ingredients, for maximum healing power.
        We are committed to offering the highest quality, natural remedies possible.
      </p>
      <p class="lead">
        <a href="/products" class="btn btn-lg btn-secondary fw-bold border-white bg-white">View Products</a>
      </p>
    </main>
  </div>
  <?php include('includes/footer.inc.php'); ?>
  <!-- Scripts -->
  <script src="assets/jquery/3.6.0/jquery.min.js"></script>
  <script src="assets/popperjs/core/2.10.2/popper.min.js"></script>
  <script src="assets/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
