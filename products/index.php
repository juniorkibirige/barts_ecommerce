<?php
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

/**
 * @param $pages
 * @return int
 */
function roundOff($pages): int
{
    $total_page = 0;
    $a = explode('.', $pages);
    $total_page = intval($a[0]);
    if ($a[1] > 0) {
        $total_page++;
    }
    return $total_page;
}

/**
 * Server-side Pagination generation
 *
 * Generate pagination using the provided parameters but uses page specific scripts for navigation
 * @param $total
 * @param $type
 * @param $current
 * @return string
 */

function generate_pagination($total, $type, $current): string
{
    $visibility = $current == 1 ? "block;" : "none;";
    $prev = $current > 1 ? $current - 1 : null;
    $showPrev = $prev != null ? 'true' : 'false';
    $next = $current < $total ? $current + 1 : null;
    $showNext = $next != null ? 'true' : 'false';
    $pagination = "<div class='container-fluid navigator' data-" . $type . "-page='" . $current . "' data-" . $type . "-page-nav='" . $current . "' style='display: " . $visibility . "'>";
    $pagination .= "<div class='row'>";
    $pagination .= "<div class='pagination' style='display: flex;'>";
    $pagination .= "<li class='pagination-sm cs-pagination-circle prev float-sm-left' data-$type-prev='$prev' data-$type-enabled='$showPrev'><i class='fa fa-chevron-left'></i> Prev</li>";
    for ($i = 1; $i <= $total; $i++) {
        $active = $current === $i ? 'active' : '';
        $pagination .= "<li class='pagination-sm cs-pagination-circle d-sm-none d-md-block $active' data-$type-click='$i' data-$type-value='$i'>$i</li>";
    }
    $pagination .= "<li class='pagination-sm cs-pagination-circle next float-sm-right' data-$type-next='$next' data-$type-enabled='$showNext'><i class='fa fa-chevron-right'></i> Next</li>";
    $pagination .= "</div>";
    $pagination .= "</div>";
    $pagination .= "</div>";
    return $pagination;
}
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="A site to portray the different products provided by Herbal Products">
    <meta name="author" content="Junior Lawrence Kibirige junkib94@gmail.com">
    <meta name="keywords" content=" Herbal Products, Herbal, Natural Medicine, Medicine, Natural" />
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
    <style>
        .d-sm-none{display:none!important}
        /* Pagination Block Style */
        .pagination>.cs-pagination-circle {
            border: 1px darkslategray solid;
            border-radius: 50%;
            padding: 5px 10px;
            margin-right: 10px;
            cursor: pointer;
        }

        .pagination-sm.cs-pagination-circle.active {
            color: white;
            background-color: #aaa1a1;
            border-color: darkolivegreen;
        }

        .pagination>.cs-pagination-circle.prev,
        .pagination>.cs-pagination-circle.next {
            border-radius: 40px !important;
        }

        .pagination>.cs-pagination-circle::after {
            content: ' ';
        }

        .pagination>.cs-pagination-circle::before {
            content: ' ';
        }
    </style>
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
                <!-- <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"> -->
                <?php
                $products = glob('images/*.jpg');
                $i = 1;
                $counter = 0;
                $pages = roundOff(70 / 8);
                for ($j = 0; $j < 70; $j++) {
                    $visibility = $i == 1 ? "block;" : "none;";
                    if ($counter <= 0) {
                        echo '<fieldset class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" data-products-page="' . $i . '"  style="display: ' . $visibility . '">';
                    }
                ?>
                    <div class="col" data-fieldset="<?php echo $i; ?>" data-record="<?php echo ($counter++) + 1 ?>">
                        <div class="card shadow-sm">
                            <?php 
                            if ($j < count($products)) { 
                                echo '<img src="'.$products[$j].'" 
                                    class="bd-placeholder-img card-img-top" 
                                    width="100%" height="225" aria-label="Placeholder: Product '. $j.'" 
                                    aria-hidden="true" tabindex="'. $j.'"
                                />';
                                } else { ?>
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" 
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" 
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                            <?php } ?>
                            <div class="card-body">
                                <p class="card-text">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed, aut.
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-secondary" type="button">View Product</button>
                                    </div>
                                    <small class="text-muted"><?php echo time_elapsed_string('@' . rand(strtotime('-5 months'), time())); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                    if ($counter % 8 === 0 || $counter === 70) {
                        echo '<br/><hr></fieldset>';
                        echo generate_pagination($pages, 'products', $i);
                        if ($i++ < $pages) {
                            $visibility = $i == 1 ? "block;" : "none;";
                            echo '<fieldset class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" data-products-page="' . $i . '"  style="display: ' . $visibility . '">';
                        }
                    }
                }
                // generate_pagination(70, 'products', 0);
                ?>
                <!-- </div> -->
            </div>
        </div>
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
    <!--
    Pagination Navigation Scripts
       - Scripts dealing with pagination specific to different pages
    -->
    <script>
        let page = 1;
        let prevBtns = $('[data-products-prev]')
        let nextBtns = $('[data-products-next]')
        let navs = $('[data-products-click]')
        for (const nextBtnsKey in nextBtns) {
            if (nextBtns.hasOwnProperty(nextBtnsKey)) {
                if (['length', 'selector', 'prevObject', 'context'].includes(nextBtnsKey) === false) {
                    let nextBtn = nextBtns[nextBtnsKey]
                    const enabled = nextBtn.getAttribute('data-products-enabled') === 'true'
                    if (!enabled) {
                        $(nextBtn).hide()
                    } else {
                        $(nextBtn).show()
                        $(nextBtn).on('click', (e) => {
                            const btn = e.target
                            const next = parseInt(btn.dataset.productsNext)
                            page += 1
                            $('[data-products-page=' + (next - 1) + ']').hide()
                            $('[data-products-page=' + (next) + ']').show()
                            $('.navigator[data-products-page-nav=' + (next - 1) + ']').hide()
                            $('.navigator[data-products-page-nav=' + (next) + ']').show()
                        })
                    }
                }
            }
        }
        for (const prevBtnsKey in prevBtns) {
            if (prevBtns.hasOwnProperty(prevBtnsKey)) {
                if (['length', 'selector', 'prevObject', 'context'].includes(prevBtnsKey) === false) {
                    let prevBtn = prevBtns[prevBtnsKey]
                    const enabled = prevBtn.getAttribute('data-products-enabled') === 'true'
                    if (!enabled) {
                        $(prevBtn).hide()
                    } else {
                        $(prevBtn).show()
                        $(prevBtn).on('click', (e) => {
                            const btn = e.target
                            const prev = parseInt(btn.dataset.productsPrev)
                            page -= 1
                            $('[data-products-page=' + (prev + 1) + ']').hide()
                            $('[data-products-page=' + (prev) + ']').show()
                            $('.navigator[data-products-page-nav=' + (prev + 1) + ']').hide()
                            $('.navigator[data-products-page-nav=' + (prev) + ']').show()
                        })
                    }
                }
            }
        }
        for (const navsKey in navs) {
            if (navs.hasOwnProperty(navsKey)) {
                if (['length', 'selector', 'prevObject', 'context'].includes(navsKey) === false) {
                    let nav = navs[navsKey]
                    $(nav).show()
                    $(nav).on('click', (e) => {
                        if (page !== parseInt(nav.dataset.productsValue)) {
                            const btn = e.target
                            const next = parseInt(btn.dataset.productsValue)
                            $('[data-products-page=' + page + ']').hide()
                            $('[data-products-page=' + next + ']').show()
                            $('.navigator[data-products-page-nav=' + page + ']').hide()
                            $('.navigator[data-products-page-nav=' + next + ']').show()
                            page = next
                        }
                    })
                }
            }
        }
    </script>
</body>

</html>
