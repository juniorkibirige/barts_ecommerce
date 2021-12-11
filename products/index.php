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
    $pagination .= "<div class='pagination' style='display: flex; justify-content: space-between;'>";
    $pagination .= "<div class='pagination-sm cs-pagination-circle prev float-sm-start' data-$type-prev='$prev' data-$type-enabled='$showPrev'><i class='fa fa-chevron-left'></i> Prev</div>";
    for ($i = 1; $i <= $total; $i++) {
        $active = $current === $i ? 'active' : '';
        $pagination .= "<li class='pagination-sm cs-pagination-circle d-sm-none d-md-block $active' data-$type-click='$i' data-$type-value='$i'>$i</li>";
    }
    $pagination .= "<div class='pagination-sm cs-pagination-circle next float-sm-end' data-$type-next='$next' data-$type-enabled='$showNext'><i class='fa fa-chevron-right'></i> Next</div>";
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
        .d-sm-none {
            display: none !important
        }

        @media (min-width:576px) {
            .float-sm-start {
                float: left !important
            }

            .float-sm-end {
                float: right !important
            }

            .float-sm-none {
                float: none !important
            }

            .d-sm-inline {
                display: inline !important
            }

            .d-sm-inline-block {
                display: inline-block !important
            }

            .d-sm-block {
                display: block !important
            }

            .d-sm-grid {
                display: grid !important
            }

            .d-sm-table {
                display: table !important
            }

            .d-sm-table-row {
                display: table-row !important
            }

            .d-sm-table-cell {
                display: table-cell !important
            }

            .d-sm-flex {
                display: flex !important
            }

            .d-sm-inline-flex {
                display: inline-flex !important
            }

            .d-sm-none {
                display: none !important
            }

            .flex-sm-fill {
                flex: 1 1 auto !important
            }

            .flex-sm-row {
                flex-direction: row !important
            }

            .flex-sm-column {
                flex-direction: column !important
            }

            .flex-sm-row-reverse {
                flex-direction: row-reverse !important
            }

            .flex-sm-column-reverse {
                flex-direction: column-reverse !important
            }

            .flex-sm-grow-0 {
                flex-grow: 0 !important
            }

            .flex-sm-grow-1 {
                flex-grow: 1 !important
            }

            .flex-sm-shrink-0 {
                flex-shrink: 0 !important
            }

            .flex-sm-shrink-1 {
                flex-shrink: 1 !important
            }

            .flex-sm-wrap {
                flex-wrap: wrap !important
            }

            .flex-sm-nowrap {
                flex-wrap: nowrap !important
            }

            .flex-sm-wrap-reverse {
                flex-wrap: wrap-reverse !important
            }

            .gap-sm-0 {
                gap: 0 !important
            }

            .gap-sm-1 {
                gap: .25rem !important
            }

            .gap-sm-2 {
                gap: .5rem !important
            }

            .gap-sm-3 {
                gap: 1rem !important
            }

            .gap-sm-4 {
                gap: 1.5rem !important
            }

            .gap-sm-5 {
                gap: 3rem !important
            }

            .justify-content-sm-start {
                justify-content: flex-start !important
            }

            .justify-content-sm-end {
                justify-content: flex-end !important
            }

            .justify-content-sm-center {
                justify-content: center !important
            }

            .justify-content-sm-between {
                justify-content: space-between !important
            }

            .justify-content-sm-around {
                justify-content: space-around !important
            }

            .justify-content-sm-evenly {
                justify-content: space-evenly !important
            }

            .align-items-sm-start {
                align-items: flex-start !important
            }

            .align-items-sm-end {
                align-items: flex-end !important
            }

            .align-items-sm-center {
                align-items: center !important
            }

            .align-items-sm-baseline {
                align-items: baseline !important
            }

            .align-items-sm-stretch {
                align-items: stretch !important
            }

            .align-content-sm-start {
                align-content: flex-start !important
            }

            .align-content-sm-end {
                align-content: flex-end !important
            }

            .align-content-sm-center {
                align-content: center !important
            }

            .align-content-sm-between {
                align-content: space-between !important
            }

            .align-content-sm-around {
                align-content: space-around !important
            }

            .align-content-sm-stretch {
                align-content: stretch !important
            }

            .align-self-sm-auto {
                align-self: auto !important
            }

            .align-self-sm-start {
                align-self: flex-start !important
            }

            .align-self-sm-end {
                align-self: flex-end !important
            }

            .align-self-sm-center {
                align-self: center !important
            }

            .align-self-sm-baseline {
                align-self: baseline !important
            }

            .align-self-sm-stretch {
                align-self: stretch !important
            }

            .order-sm-first {
                order: -1 !important
            }

            .order-sm-0 {
                order: 0 !important
            }

            .order-sm-1 {
                order: 1 !important
            }

            .order-sm-2 {
                order: 2 !important
            }

            .order-sm-3 {
                order: 3 !important
            }

            .order-sm-4 {
                order: 4 !important
            }

            .order-sm-5 {
                order: 5 !important
            }

            .order-sm-last {
                order: 6 !important
            }

            .m-sm-0 {
                margin: 0 !important
            }

            .m-sm-1 {
                margin: .25rem !important
            }

            .m-sm-2 {
                margin: .5rem !important
            }

            .m-sm-3 {
                margin: 1rem !important
            }

            .m-sm-4 {
                margin: 1.5rem !important
            }

            .m-sm-5 {
                margin: 3rem !important
            }

            .m-sm-auto {
                margin: auto !important
            }

            .mx-sm-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-sm-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-sm-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-sm-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-sm-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-sm-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-sm-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-sm-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-sm-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-sm-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-sm-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-sm-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-sm-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-sm-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-sm-0 {
                margin-top: 0 !important
            }

            .mt-sm-1 {
                margin-top: .25rem !important
            }

            .mt-sm-2 {
                margin-top: .5rem !important
            }

            .mt-sm-3 {
                margin-top: 1rem !important
            }

            .mt-sm-4 {
                margin-top: 1.5rem !important
            }

            .mt-sm-5 {
                margin-top: 3rem !important
            }

            .mt-sm-auto {
                margin-top: auto !important
            }

            .me-sm-0 {
                margin-right: 0 !important
            }

            .me-sm-1 {
                margin-right: .25rem !important
            }

            .me-sm-2 {
                margin-right: .5rem !important
            }

            .me-sm-3 {
                margin-right: 1rem !important
            }

            .me-sm-4 {
                margin-right: 1.5rem !important
            }

            .me-sm-5 {
                margin-right: 3rem !important
            }

            .me-sm-auto {
                margin-right: auto !important
            }

            .mb-sm-0 {
                margin-bottom: 0 !important
            }

            .mb-sm-1 {
                margin-bottom: .25rem !important
            }

            .mb-sm-2 {
                margin-bottom: .5rem !important
            }

            .mb-sm-3 {
                margin-bottom: 1rem !important
            }

            .mb-sm-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-sm-5 {
                margin-bottom: 3rem !important
            }

            .mb-sm-auto {
                margin-bottom: auto !important
            }

            .ms-sm-0 {
                margin-left: 0 !important
            }

            .ms-sm-1 {
                margin-left: .25rem !important
            }

            .ms-sm-2 {
                margin-left: .5rem !important
            }

            .ms-sm-3 {
                margin-left: 1rem !important
            }

            .ms-sm-4 {
                margin-left: 1.5rem !important
            }

            .ms-sm-5 {
                margin-left: 3rem !important
            }

            .ms-sm-auto {
                margin-left: auto !important
            }

            .p-sm-0 {
                padding: 0 !important
            }

            .p-sm-1 {
                padding: .25rem !important
            }

            .p-sm-2 {
                padding: .5rem !important
            }

            .p-sm-3 {
                padding: 1rem !important
            }

            .p-sm-4 {
                padding: 1.5rem !important
            }

            .p-sm-5 {
                padding: 3rem !important
            }

            .px-sm-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-sm-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-sm-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-sm-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-sm-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-sm-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-sm-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-sm-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-sm-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-sm-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-sm-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-sm-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-sm-0 {
                padding-top: 0 !important
            }

            .pt-sm-1 {
                padding-top: .25rem !important
            }

            .pt-sm-2 {
                padding-top: .5rem !important
            }

            .pt-sm-3 {
                padding-top: 1rem !important
            }

            .pt-sm-4 {
                padding-top: 1.5rem !important
            }

            .pt-sm-5 {
                padding-top: 3rem !important
            }

            .pe-sm-0 {
                padding-right: 0 !important
            }

            .pe-sm-1 {
                padding-right: .25rem !important
            }

            .pe-sm-2 {
                padding-right: .5rem !important
            }

            .pe-sm-3 {
                padding-right: 1rem !important
            }

            .pe-sm-4 {
                padding-right: 1.5rem !important
            }

            .pe-sm-5 {
                padding-right: 3rem !important
            }

            .pb-sm-0 {
                padding-bottom: 0 !important
            }

            .pb-sm-1 {
                padding-bottom: .25rem !important
            }

            .pb-sm-2 {
                padding-bottom: .5rem !important
            }

            .pb-sm-3 {
                padding-bottom: 1rem !important
            }

            .pb-sm-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-sm-5 {
                padding-bottom: 3rem !important
            }

            .ps-sm-0 {
                padding-left: 0 !important
            }

            .ps-sm-1 {
                padding-left: .25rem !important
            }

            .ps-sm-2 {
                padding-left: .5rem !important
            }

            .ps-sm-3 {
                padding-left: 1rem !important
            }

            .ps-sm-4 {
                padding-left: 1.5rem !important
            }

            .ps-sm-5 {
                padding-left: 3rem !important
            }

            .text-sm-start {
                text-align: left !important
            }

            .text-sm-end {
                text-align: right !important
            }

            .text-sm-center {
                text-align: center !important
            }
        }

        @media (min-width:768px) {
            .float-md-start {
                float: left !important
            }

            .float-md-end {
                float: right !important
            }

            .float-md-none {
                float: none !important
            }

            .d-md-inline {
                display: inline !important
            }

            .d-md-inline-block {
                display: inline-block !important
            }

            .d-md-block {
                display: block !important
            }

            .d-md-grid {
                display: grid !important
            }

            .d-md-table {
                display: table !important
            }

            .d-md-table-row {
                display: table-row !important
            }

            .d-md-table-cell {
                display: table-cell !important
            }

            .d-md-flex {
                display: flex !important
            }

            .d-md-inline-flex {
                display: inline-flex !important
            }

            .d-md-none {
                display: none !important
            }

            .flex-md-fill {
                flex: 1 1 auto !important
            }

            .flex-md-row {
                flex-direction: row !important
            }

            .flex-md-column {
                flex-direction: column !important
            }

            .flex-md-row-reverse {
                flex-direction: row-reverse !important
            }

            .flex-md-column-reverse {
                flex-direction: column-reverse !important
            }

            .flex-md-grow-0 {
                flex-grow: 0 !important
            }

            .flex-md-grow-1 {
                flex-grow: 1 !important
            }

            .flex-md-shrink-0 {
                flex-shrink: 0 !important
            }

            .flex-md-shrink-1 {
                flex-shrink: 1 !important
            }

            .flex-md-wrap {
                flex-wrap: wrap !important
            }

            .flex-md-nowrap {
                flex-wrap: nowrap !important
            }

            .flex-md-wrap-reverse {
                flex-wrap: wrap-reverse !important
            }

            .gap-md-0 {
                gap: 0 !important
            }

            .gap-md-1 {
                gap: .25rem !important
            }

            .gap-md-2 {
                gap: .5rem !important
            }

            .gap-md-3 {
                gap: 1rem !important
            }

            .gap-md-4 {
                gap: 1.5rem !important
            }

            .gap-md-5 {
                gap: 3rem !important
            }

            .justify-content-md-start {
                justify-content: flex-start !important
            }

            .justify-content-md-end {
                justify-content: flex-end !important
            }

            .justify-content-md-center {
                justify-content: center !important
            }

            .justify-content-md-between {
                justify-content: space-between !important
            }

            .justify-content-md-around {
                justify-content: space-around !important
            }

            .justify-content-md-evenly {
                justify-content: space-evenly !important
            }

            .align-items-md-start {
                align-items: flex-start !important
            }

            .align-items-md-end {
                align-items: flex-end !important
            }

            .align-items-md-center {
                align-items: center !important
            }

            .align-items-md-baseline {
                align-items: baseline !important
            }

            .align-items-md-stretch {
                align-items: stretch !important
            }

            .align-content-md-start {
                align-content: flex-start !important
            }

            .align-content-md-end {
                align-content: flex-end !important
            }

            .align-content-md-center {
                align-content: center !important
            }

            .align-content-md-between {
                align-content: space-between !important
            }

            .align-content-md-around {
                align-content: space-around !important
            }

            .align-content-md-stretch {
                align-content: stretch !important
            }

            .align-self-md-auto {
                align-self: auto !important
            }

            .align-self-md-start {
                align-self: flex-start !important
            }

            .align-self-md-end {
                align-self: flex-end !important
            }

            .align-self-md-center {
                align-self: center !important
            }

            .align-self-md-baseline {
                align-self: baseline !important
            }

            .align-self-md-stretch {
                align-self: stretch !important
            }

            .order-md-first {
                order: -1 !important
            }

            .order-md-0 {
                order: 0 !important
            }

            .order-md-1 {
                order: 1 !important
            }

            .order-md-2 {
                order: 2 !important
            }

            .order-md-3 {
                order: 3 !important
            }

            .order-md-4 {
                order: 4 !important
            }

            .order-md-5 {
                order: 5 !important
            }

            .order-md-last {
                order: 6 !important
            }

            .m-md-0 {
                margin: 0 !important
            }

            .m-md-1 {
                margin: .25rem !important
            }

            .m-md-2 {
                margin: .5rem !important
            }

            .m-md-3 {
                margin: 1rem !important
            }

            .m-md-4 {
                margin: 1.5rem !important
            }

            .m-md-5 {
                margin: 3rem !important
            }

            .m-md-auto {
                margin: auto !important
            }

            .mx-md-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-md-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-md-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-md-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-md-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-md-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-md-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-md-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-md-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-md-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-md-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-md-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-md-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-md-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-md-0 {
                margin-top: 0 !important
            }

            .mt-md-1 {
                margin-top: .25rem !important
            }

            .mt-md-2 {
                margin-top: .5rem !important
            }

            .mt-md-3 {
                margin-top: 1rem !important
            }

            .mt-md-4 {
                margin-top: 1.5rem !important
            }

            .mt-md-5 {
                margin-top: 3rem !important
            }

            .mt-md-auto {
                margin-top: auto !important
            }

            .me-md-0 {
                margin-right: 0 !important
            }

            .me-md-1 {
                margin-right: .25rem !important
            }

            .me-md-2 {
                margin-right: .5rem !important
            }

            .me-md-3 {
                margin-right: 1rem !important
            }

            .me-md-4 {
                margin-right: 1.5rem !important
            }

            .me-md-5 {
                margin-right: 3rem !important
            }

            .me-md-auto {
                margin-right: auto !important
            }

            .mb-md-0 {
                margin-bottom: 0 !important
            }

            .mb-md-1 {
                margin-bottom: .25rem !important
            }

            .mb-md-2 {
                margin-bottom: .5rem !important
            }

            .mb-md-3 {
                margin-bottom: 1rem !important
            }

            .mb-md-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-md-5 {
                margin-bottom: 3rem !important
            }

            .mb-md-auto {
                margin-bottom: auto !important
            }

            .ms-md-0 {
                margin-left: 0 !important
            }

            .ms-md-1 {
                margin-left: .25rem !important
            }

            .ms-md-2 {
                margin-left: .5rem !important
            }

            .ms-md-3 {
                margin-left: 1rem !important
            }

            .ms-md-4 {
                margin-left: 1.5rem !important
            }

            .ms-md-5 {
                margin-left: 3rem !important
            }

            .ms-md-auto {
                margin-left: auto !important
            }

            .p-md-0 {
                padding: 0 !important
            }

            .p-md-1 {
                padding: .25rem !important
            }

            .p-md-2 {
                padding: .5rem !important
            }

            .p-md-3 {
                padding: 1rem !important
            }

            .p-md-4 {
                padding: 1.5rem !important
            }

            .p-md-5 {
                padding: 3rem !important
            }

            .px-md-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-md-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-md-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-md-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-md-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-md-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-md-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-md-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-md-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-md-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-md-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-md-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-md-0 {
                padding-top: 0 !important
            }

            .pt-md-1 {
                padding-top: .25rem !important
            }

            .pt-md-2 {
                padding-top: .5rem !important
            }

            .pt-md-3 {
                padding-top: 1rem !important
            }

            .pt-md-4 {
                padding-top: 1.5rem !important
            }

            .pt-md-5 {
                padding-top: 3rem !important
            }

            .pe-md-0 {
                padding-right: 0 !important
            }

            .pe-md-1 {
                padding-right: .25rem !important
            }

            .pe-md-2 {
                padding-right: .5rem !important
            }

            .pe-md-3 {
                padding-right: 1rem !important
            }

            .pe-md-4 {
                padding-right: 1.5rem !important
            }

            .pe-md-5 {
                padding-right: 3rem !important
            }

            .pb-md-0 {
                padding-bottom: 0 !important
            }

            .pb-md-1 {
                padding-bottom: .25rem !important
            }

            .pb-md-2 {
                padding-bottom: .5rem !important
            }

            .pb-md-3 {
                padding-bottom: 1rem !important
            }

            .pb-md-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-md-5 {
                padding-bottom: 3rem !important
            }

            .ps-md-0 {
                padding-left: 0 !important
            }

            .ps-md-1 {
                padding-left: .25rem !important
            }

            .ps-md-2 {
                padding-left: .5rem !important
            }

            .ps-md-3 {
                padding-left: 1rem !important
            }

            .ps-md-4 {
                padding-left: 1.5rem !important
            }

            .ps-md-5 {
                padding-left: 3rem !important
            }

            .text-md-start {
                text-align: left !important
            }

            .text-md-end {
                text-align: right !important
            }

            .text-md-center {
                text-align: center !important
            }
        }

        @media (min-width:992px) {
            .float-lg-start {
                float: left !important
            }

            .float-lg-end {
                float: right !important
            }

            .float-lg-none {
                float: none !important
            }

            .d-lg-inline {
                display: inline !important
            }

            .d-lg-inline-block {
                display: inline-block !important
            }

            .d-lg-block {
                display: block !important
            }

            .d-lg-grid {
                display: grid !important
            }

            .d-lg-table {
                display: table !important
            }

            .d-lg-table-row {
                display: table-row !important
            }

            .d-lg-table-cell {
                display: table-cell !important
            }

            .d-lg-flex {
                display: flex !important
            }

            .d-lg-inline-flex {
                display: inline-flex !important
            }

            .d-lg-none {
                display: none !important
            }

            .flex-lg-fill {
                flex: 1 1 auto !important
            }

            .flex-lg-row {
                flex-direction: row !important
            }

            .flex-lg-column {
                flex-direction: column !important
            }

            .flex-lg-row-reverse {
                flex-direction: row-reverse !important
            }

            .flex-lg-column-reverse {
                flex-direction: column-reverse !important
            }

            .flex-lg-grow-0 {
                flex-grow: 0 !important
            }

            .flex-lg-grow-1 {
                flex-grow: 1 !important
            }

            .flex-lg-shrink-0 {
                flex-shrink: 0 !important
            }

            .flex-lg-shrink-1 {
                flex-shrink: 1 !important
            }

            .flex-lg-wrap {
                flex-wrap: wrap !important
            }

            .flex-lg-nowrap {
                flex-wrap: nowrap !important
            }

            .flex-lg-wrap-reverse {
                flex-wrap: wrap-reverse !important
            }

            .gap-lg-0 {
                gap: 0 !important
            }

            .gap-lg-1 {
                gap: .25rem !important
            }

            .gap-lg-2 {
                gap: .5rem !important
            }

            .gap-lg-3 {
                gap: 1rem !important
            }

            .gap-lg-4 {
                gap: 1.5rem !important
            }

            .gap-lg-5 {
                gap: 3rem !important
            }

            .justify-content-lg-start {
                justify-content: flex-start !important
            }

            .justify-content-lg-end {
                justify-content: flex-end !important
            }

            .justify-content-lg-center {
                justify-content: center !important
            }

            .justify-content-lg-between {
                justify-content: space-between !important
            }

            .justify-content-lg-around {
                justify-content: space-around !important
            }

            .justify-content-lg-evenly {
                justify-content: space-evenly !important
            }

            .align-items-lg-start {
                align-items: flex-start !important
            }

            .align-items-lg-end {
                align-items: flex-end !important
            }

            .align-items-lg-center {
                align-items: center !important
            }

            .align-items-lg-baseline {
                align-items: baseline !important
            }

            .align-items-lg-stretch {
                align-items: stretch !important
            }

            .align-content-lg-start {
                align-content: flex-start !important
            }

            .align-content-lg-end {
                align-content: flex-end !important
            }

            .align-content-lg-center {
                align-content: center !important
            }

            .align-content-lg-between {
                align-content: space-between !important
            }

            .align-content-lg-around {
                align-content: space-around !important
            }

            .align-content-lg-stretch {
                align-content: stretch !important
            }

            .align-self-lg-auto {
                align-self: auto !important
            }

            .align-self-lg-start {
                align-self: flex-start !important
            }

            .align-self-lg-end {
                align-self: flex-end !important
            }

            .align-self-lg-center {
                align-self: center !important
            }

            .align-self-lg-baseline {
                align-self: baseline !important
            }

            .align-self-lg-stretch {
                align-self: stretch !important
            }

            .order-lg-first {
                order: -1 !important
            }

            .order-lg-0 {
                order: 0 !important
            }

            .order-lg-1 {
                order: 1 !important
            }

            .order-lg-2 {
                order: 2 !important
            }

            .order-lg-3 {
                order: 3 !important
            }

            .order-lg-4 {
                order: 4 !important
            }

            .order-lg-5 {
                order: 5 !important
            }

            .order-lg-last {
                order: 6 !important
            }

            .m-lg-0 {
                margin: 0 !important
            }

            .m-lg-1 {
                margin: .25rem !important
            }

            .m-lg-2 {
                margin: .5rem !important
            }

            .m-lg-3 {
                margin: 1rem !important
            }

            .m-lg-4 {
                margin: 1.5rem !important
            }

            .m-lg-5 {
                margin: 3rem !important
            }

            .m-lg-auto {
                margin: auto !important
            }

            .mx-lg-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-lg-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-lg-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-lg-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-lg-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-lg-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-lg-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-lg-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-lg-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-lg-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-lg-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-lg-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-lg-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-lg-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-lg-0 {
                margin-top: 0 !important
            }

            .mt-lg-1 {
                margin-top: .25rem !important
            }

            .mt-lg-2 {
                margin-top: .5rem !important
            }

            .mt-lg-3 {
                margin-top: 1rem !important
            }

            .mt-lg-4 {
                margin-top: 1.5rem !important
            }

            .mt-lg-5 {
                margin-top: 3rem !important
            }

            .mt-lg-auto {
                margin-top: auto !important
            }

            .me-lg-0 {
                margin-right: 0 !important
            }

            .me-lg-1 {
                margin-right: .25rem !important
            }

            .me-lg-2 {
                margin-right: .5rem !important
            }

            .me-lg-3 {
                margin-right: 1rem !important
            }

            .me-lg-4 {
                margin-right: 1.5rem !important
            }

            .me-lg-5 {
                margin-right: 3rem !important
            }

            .me-lg-auto {
                margin-right: auto !important
            }

            .mb-lg-0 {
                margin-bottom: 0 !important
            }

            .mb-lg-1 {
                margin-bottom: .25rem !important
            }

            .mb-lg-2 {
                margin-bottom: .5rem !important
            }

            .mb-lg-3 {
                margin-bottom: 1rem !important
            }

            .mb-lg-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-lg-5 {
                margin-bottom: 3rem !important
            }

            .mb-lg-auto {
                margin-bottom: auto !important
            }

            .ms-lg-0 {
                margin-left: 0 !important
            }

            .ms-lg-1 {
                margin-left: .25rem !important
            }

            .ms-lg-2 {
                margin-left: .5rem !important
            }

            .ms-lg-3 {
                margin-left: 1rem !important
            }

            .ms-lg-4 {
                margin-left: 1.5rem !important
            }

            .ms-lg-5 {
                margin-left: 3rem !important
            }

            .ms-lg-auto {
                margin-left: auto !important
            }

            .p-lg-0 {
                padding: 0 !important
            }

            .p-lg-1 {
                padding: .25rem !important
            }

            .p-lg-2 {
                padding: .5rem !important
            }

            .p-lg-3 {
                padding: 1rem !important
            }

            .p-lg-4 {
                padding: 1.5rem !important
            }

            .p-lg-5 {
                padding: 3rem !important
            }

            .px-lg-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-lg-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-lg-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-lg-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-lg-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-lg-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-lg-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-lg-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-lg-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-lg-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-lg-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-lg-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-lg-0 {
                padding-top: 0 !important
            }

            .pt-lg-1 {
                padding-top: .25rem !important
            }

            .pt-lg-2 {
                padding-top: .5rem !important
            }

            .pt-lg-3 {
                padding-top: 1rem !important
            }

            .pt-lg-4 {
                padding-top: 1.5rem !important
            }

            .pt-lg-5 {
                padding-top: 3rem !important
            }

            .pe-lg-0 {
                padding-right: 0 !important
            }

            .pe-lg-1 {
                padding-right: .25rem !important
            }

            .pe-lg-2 {
                padding-right: .5rem !important
            }

            .pe-lg-3 {
                padding-right: 1rem !important
            }

            .pe-lg-4 {
                padding-right: 1.5rem !important
            }

            .pe-lg-5 {
                padding-right: 3rem !important
            }

            .pb-lg-0 {
                padding-bottom: 0 !important
            }

            .pb-lg-1 {
                padding-bottom: .25rem !important
            }

            .pb-lg-2 {
                padding-bottom: .5rem !important
            }

            .pb-lg-3 {
                padding-bottom: 1rem !important
            }

            .pb-lg-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-lg-5 {
                padding-bottom: 3rem !important
            }

            .ps-lg-0 {
                padding-left: 0 !important
            }

            .ps-lg-1 {
                padding-left: .25rem !important
            }

            .ps-lg-2 {
                padding-left: .5rem !important
            }

            .ps-lg-3 {
                padding-left: 1rem !important
            }

            .ps-lg-4 {
                padding-left: 1.5rem !important
            }

            .ps-lg-5 {
                padding-left: 3rem !important
            }

            .text-lg-start {
                text-align: left !important
            }

            .text-lg-end {
                text-align: right !important
            }

            .text-lg-center {
                text-align: center !important
            }
        }

        @media (min-width:1200px) {
            .float-xl-start {
                float: left !important
            }

            .float-xl-end {
                float: right !important
            }

            .float-xl-none {
                float: none !important
            }

            .d-xl-inline {
                display: inline !important
            }

            .d-xl-inline-block {
                display: inline-block !important
            }

            .d-xl-block {
                display: block !important
            }

            .d-xl-grid {
                display: grid !important
            }

            .d-xl-table {
                display: table !important
            }

            .d-xl-table-row {
                display: table-row !important
            }

            .d-xl-table-cell {
                display: table-cell !important
            }

            .d-xl-flex {
                display: flex !important
            }

            .d-xl-inline-flex {
                display: inline-flex !important
            }

            .d-xl-none {
                display: none !important
            }

            .flex-xl-fill {
                flex: 1 1 auto !important
            }

            .flex-xl-row {
                flex-direction: row !important
            }

            .flex-xl-column {
                flex-direction: column !important
            }

            .flex-xl-row-reverse {
                flex-direction: row-reverse !important
            }

            .flex-xl-column-reverse {
                flex-direction: column-reverse !important
            }

            .flex-xl-grow-0 {
                flex-grow: 0 !important
            }

            .flex-xl-grow-1 {
                flex-grow: 1 !important
            }

            .flex-xl-shrink-0 {
                flex-shrink: 0 !important
            }

            .flex-xl-shrink-1 {
                flex-shrink: 1 !important
            }

            .flex-xl-wrap {
                flex-wrap: wrap !important
            }

            .flex-xl-nowrap {
                flex-wrap: nowrap !important
            }

            .flex-xl-wrap-reverse {
                flex-wrap: wrap-reverse !important
            }

            .gap-xl-0 {
                gap: 0 !important
            }

            .gap-xl-1 {
                gap: .25rem !important
            }

            .gap-xl-2 {
                gap: .5rem !important
            }

            .gap-xl-3 {
                gap: 1rem !important
            }

            .gap-xl-4 {
                gap: 1.5rem !important
            }

            .gap-xl-5 {
                gap: 3rem !important
            }

            .justify-content-xl-start {
                justify-content: flex-start !important
            }

            .justify-content-xl-end {
                justify-content: flex-end !important
            }

            .justify-content-xl-center {
                justify-content: center !important
            }

            .justify-content-xl-between {
                justify-content: space-between !important
            }

            .justify-content-xl-around {
                justify-content: space-around !important
            }

            .justify-content-xl-evenly {
                justify-content: space-evenly !important
            }

            .align-items-xl-start {
                align-items: flex-start !important
            }

            .align-items-xl-end {
                align-items: flex-end !important
            }

            .align-items-xl-center {
                align-items: center !important
            }

            .align-items-xl-baseline {
                align-items: baseline !important
            }

            .align-items-xl-stretch {
                align-items: stretch !important
            }

            .align-content-xl-start {
                align-content: flex-start !important
            }

            .align-content-xl-end {
                align-content: flex-end !important
            }

            .align-content-xl-center {
                align-content: center !important
            }

            .align-content-xl-between {
                align-content: space-between !important
            }

            .align-content-xl-around {
                align-content: space-around !important
            }

            .align-content-xl-stretch {
                align-content: stretch !important
            }

            .align-self-xl-auto {
                align-self: auto !important
            }

            .align-self-xl-start {
                align-self: flex-start !important
            }

            .align-self-xl-end {
                align-self: flex-end !important
            }

            .align-self-xl-center {
                align-self: center !important
            }

            .align-self-xl-baseline {
                align-self: baseline !important
            }

            .align-self-xl-stretch {
                align-self: stretch !important
            }

            .order-xl-first {
                order: -1 !important
            }

            .order-xl-0 {
                order: 0 !important
            }

            .order-xl-1 {
                order: 1 !important
            }

            .order-xl-2 {
                order: 2 !important
            }

            .order-xl-3 {
                order: 3 !important
            }

            .order-xl-4 {
                order: 4 !important
            }

            .order-xl-5 {
                order: 5 !important
            }

            .order-xl-last {
                order: 6 !important
            }

            .m-xl-0 {
                margin: 0 !important
            }

            .m-xl-1 {
                margin: .25rem !important
            }

            .m-xl-2 {
                margin: .5rem !important
            }

            .m-xl-3 {
                margin: 1rem !important
            }

            .m-xl-4 {
                margin: 1.5rem !important
            }

            .m-xl-5 {
                margin: 3rem !important
            }

            .m-xl-auto {
                margin: auto !important
            }

            .mx-xl-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-xl-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-xl-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-xl-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-xl-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-xl-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-xl-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-xl-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-xl-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-xl-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-xl-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-xl-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-xl-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-xl-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-xl-0 {
                margin-top: 0 !important
            }

            .mt-xl-1 {
                margin-top: .25rem !important
            }

            .mt-xl-2 {
                margin-top: .5rem !important
            }

            .mt-xl-3 {
                margin-top: 1rem !important
            }

            .mt-xl-4 {
                margin-top: 1.5rem !important
            }

            .mt-xl-5 {
                margin-top: 3rem !important
            }

            .mt-xl-auto {
                margin-top: auto !important
            }

            .me-xl-0 {
                margin-right: 0 !important
            }

            .me-xl-1 {
                margin-right: .25rem !important
            }

            .me-xl-2 {
                margin-right: .5rem !important
            }

            .me-xl-3 {
                margin-right: 1rem !important
            }

            .me-xl-4 {
                margin-right: 1.5rem !important
            }

            .me-xl-5 {
                margin-right: 3rem !important
            }

            .me-xl-auto {
                margin-right: auto !important
            }

            .mb-xl-0 {
                margin-bottom: 0 !important
            }

            .mb-xl-1 {
                margin-bottom: .25rem !important
            }

            .mb-xl-2 {
                margin-bottom: .5rem !important
            }

            .mb-xl-3 {
                margin-bottom: 1rem !important
            }

            .mb-xl-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-xl-5 {
                margin-bottom: 3rem !important
            }

            .mb-xl-auto {
                margin-bottom: auto !important
            }

            .ms-xl-0 {
                margin-left: 0 !important
            }

            .ms-xl-1 {
                margin-left: .25rem !important
            }

            .ms-xl-2 {
                margin-left: .5rem !important
            }

            .ms-xl-3 {
                margin-left: 1rem !important
            }

            .ms-xl-4 {
                margin-left: 1.5rem !important
            }

            .ms-xl-5 {
                margin-left: 3rem !important
            }

            .ms-xl-auto {
                margin-left: auto !important
            }

            .p-xl-0 {
                padding: 0 !important
            }

            .p-xl-1 {
                padding: .25rem !important
            }

            .p-xl-2 {
                padding: .5rem !important
            }

            .p-xl-3 {
                padding: 1rem !important
            }

            .p-xl-4 {
                padding: 1.5rem !important
            }

            .p-xl-5 {
                padding: 3rem !important
            }

            .px-xl-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-xl-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-xl-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-xl-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-xl-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-xl-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-xl-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-xl-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-xl-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-xl-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-xl-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-xl-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-xl-0 {
                padding-top: 0 !important
            }

            .pt-xl-1 {
                padding-top: .25rem !important
            }

            .pt-xl-2 {
                padding-top: .5rem !important
            }

            .pt-xl-3 {
                padding-top: 1rem !important
            }

            .pt-xl-4 {
                padding-top: 1.5rem !important
            }

            .pt-xl-5 {
                padding-top: 3rem !important
            }

            .pe-xl-0 {
                padding-right: 0 !important
            }

            .pe-xl-1 {
                padding-right: .25rem !important
            }

            .pe-xl-2 {
                padding-right: .5rem !important
            }

            .pe-xl-3 {
                padding-right: 1rem !important
            }

            .pe-xl-4 {
                padding-right: 1.5rem !important
            }

            .pe-xl-5 {
                padding-right: 3rem !important
            }

            .pb-xl-0 {
                padding-bottom: 0 !important
            }

            .pb-xl-1 {
                padding-bottom: .25rem !important
            }

            .pb-xl-2 {
                padding-bottom: .5rem !important
            }

            .pb-xl-3 {
                padding-bottom: 1rem !important
            }

            .pb-xl-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-xl-5 {
                padding-bottom: 3rem !important
            }

            .ps-xl-0 {
                padding-left: 0 !important
            }

            .ps-xl-1 {
                padding-left: .25rem !important
            }

            .ps-xl-2 {
                padding-left: .5rem !important
            }

            .ps-xl-3 {
                padding-left: 1rem !important
            }

            .ps-xl-4 {
                padding-left: 1.5rem !important
            }

            .ps-xl-5 {
                padding-left: 3rem !important
            }

            .text-xl-start {
                text-align: left !important
            }

            .text-xl-end {
                text-align: right !important
            }

            .text-xl-center {
                text-align: center !important
            }
        }

        @media (min-width:1400px) {
            .float-xxl-start {
                float: left !important
            }

            .float-xxl-end {
                float: right !important
            }

            .float-xxl-none {
                float: none !important
            }

            .d-xxl-inline {
                display: inline !important
            }

            .d-xxl-inline-block {
                display: inline-block !important
            }

            .d-xxl-block {
                display: block !important
            }

            .d-xxl-grid {
                display: grid !important
            }

            .d-xxl-table {
                display: table !important
            }

            .d-xxl-table-row {
                display: table-row !important
            }

            .d-xxl-table-cell {
                display: table-cell !important
            }

            .d-xxl-flex {
                display: flex !important
            }

            .d-xxl-inline-flex {
                display: inline-flex !important
            }

            .d-xxl-none {
                display: none !important
            }

            .flex-xxl-fill {
                flex: 1 1 auto !important
            }

            .flex-xxl-row {
                flex-direction: row !important
            }

            .flex-xxl-column {
                flex-direction: column !important
            }

            .flex-xxl-row-reverse {
                flex-direction: row-reverse !important
            }

            .flex-xxl-column-reverse {
                flex-direction: column-reverse !important
            }

            .flex-xxl-grow-0 {
                flex-grow: 0 !important
            }

            .flex-xxl-grow-1 {
                flex-grow: 1 !important
            }

            .flex-xxl-shrink-0 {
                flex-shrink: 0 !important
            }

            .flex-xxl-shrink-1 {
                flex-shrink: 1 !important
            }

            .flex-xxl-wrap {
                flex-wrap: wrap !important
            }

            .flex-xxl-nowrap {
                flex-wrap: nowrap !important
            }

            .flex-xxl-wrap-reverse {
                flex-wrap: wrap-reverse !important
            }

            .gap-xxl-0 {
                gap: 0 !important
            }

            .gap-xxl-1 {
                gap: .25rem !important
            }

            .gap-xxl-2 {
                gap: .5rem !important
            }

            .gap-xxl-3 {
                gap: 1rem !important
            }

            .gap-xxl-4 {
                gap: 1.5rem !important
            }

            .gap-xxl-5 {
                gap: 3rem !important
            }

            .justify-content-xxl-start {
                justify-content: flex-start !important
            }

            .justify-content-xxl-end {
                justify-content: flex-end !important
            }

            .justify-content-xxl-center {
                justify-content: center !important
            }

            .justify-content-xxl-between {
                justify-content: space-between !important
            }

            .justify-content-xxl-around {
                justify-content: space-around !important
            }

            .justify-content-xxl-evenly {
                justify-content: space-evenly !important
            }

            .align-items-xxl-start {
                align-items: flex-start !important
            }

            .align-items-xxl-end {
                align-items: flex-end !important
            }

            .align-items-xxl-center {
                align-items: center !important
            }

            .align-items-xxl-baseline {
                align-items: baseline !important
            }

            .align-items-xxl-stretch {
                align-items: stretch !important
            }

            .align-content-xxl-start {
                align-content: flex-start !important
            }

            .align-content-xxl-end {
                align-content: flex-end !important
            }

            .align-content-xxl-center {
                align-content: center !important
            }

            .align-content-xxl-between {
                align-content: space-between !important
            }

            .align-content-xxl-around {
                align-content: space-around !important
            }

            .align-content-xxl-stretch {
                align-content: stretch !important
            }

            .align-self-xxl-auto {
                align-self: auto !important
            }

            .align-self-xxl-start {
                align-self: flex-start !important
            }

            .align-self-xxl-end {
                align-self: flex-end !important
            }

            .align-self-xxl-center {
                align-self: center !important
            }

            .align-self-xxl-baseline {
                align-self: baseline !important
            }

            .align-self-xxl-stretch {
                align-self: stretch !important
            }

            .order-xxl-first {
                order: -1 !important
            }

            .order-xxl-0 {
                order: 0 !important
            }

            .order-xxl-1 {
                order: 1 !important
            }

            .order-xxl-2 {
                order: 2 !important
            }

            .order-xxl-3 {
                order: 3 !important
            }

            .order-xxl-4 {
                order: 4 !important
            }

            .order-xxl-5 {
                order: 5 !important
            }

            .order-xxl-last {
                order: 6 !important
            }

            .m-xxl-0 {
                margin: 0 !important
            }

            .m-xxl-1 {
                margin: .25rem !important
            }

            .m-xxl-2 {
                margin: .5rem !important
            }

            .m-xxl-3 {
                margin: 1rem !important
            }

            .m-xxl-4 {
                margin: 1.5rem !important
            }

            .m-xxl-5 {
                margin: 3rem !important
            }

            .m-xxl-auto {
                margin: auto !important
            }

            .mx-xxl-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-xxl-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-xxl-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-xxl-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-xxl-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-xxl-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-xxl-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-xxl-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-xxl-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-xxl-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-xxl-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-xxl-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-xxl-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-xxl-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-xxl-0 {
                margin-top: 0 !important
            }

            .mt-xxl-1 {
                margin-top: .25rem !important
            }

            .mt-xxl-2 {
                margin-top: .5rem !important
            }

            .mt-xxl-3 {
                margin-top: 1rem !important
            }

            .mt-xxl-4 {
                margin-top: 1.5rem !important
            }

            .mt-xxl-5 {
                margin-top: 3rem !important
            }

            .mt-xxl-auto {
                margin-top: auto !important
            }

            .me-xxl-0 {
                margin-right: 0 !important
            }

            .me-xxl-1 {
                margin-right: .25rem !important
            }

            .me-xxl-2 {
                margin-right: .5rem !important
            }

            .me-xxl-3 {
                margin-right: 1rem !important
            }

            .me-xxl-4 {
                margin-right: 1.5rem !important
            }

            .me-xxl-5 {
                margin-right: 3rem !important
            }

            .me-xxl-auto {
                margin-right: auto !important
            }

            .mb-xxl-0 {
                margin-bottom: 0 !important
            }

            .mb-xxl-1 {
                margin-bottom: .25rem !important
            }

            .mb-xxl-2 {
                margin-bottom: .5rem !important
            }

            .mb-xxl-3 {
                margin-bottom: 1rem !important
            }

            .mb-xxl-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-xxl-5 {
                margin-bottom: 3rem !important
            }

            .mb-xxl-auto {
                margin-bottom: auto !important
            }

            .ms-xxl-0 {
                margin-left: 0 !important
            }

            .ms-xxl-1 {
                margin-left: .25rem !important
            }

            .ms-xxl-2 {
                margin-left: .5rem !important
            }

            .ms-xxl-3 {
                margin-left: 1rem !important
            }

            .ms-xxl-4 {
                margin-left: 1.5rem !important
            }

            .ms-xxl-5 {
                margin-left: 3rem !important
            }

            .ms-xxl-auto {
                margin-left: auto !important
            }

            .p-xxl-0 {
                padding: 0 !important
            }

            .p-xxl-1 {
                padding: .25rem !important
            }

            .p-xxl-2 {
                padding: .5rem !important
            }

            .p-xxl-3 {
                padding: 1rem !important
            }

            .p-xxl-4 {
                padding: 1.5rem !important
            }

            .p-xxl-5 {
                padding: 3rem !important
            }

            .px-xxl-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-xxl-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-xxl-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-xxl-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-xxl-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-xxl-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-xxl-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-xxl-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-xxl-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-xxl-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-xxl-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-xxl-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-xxl-0 {
                padding-top: 0 !important
            }

            .pt-xxl-1 {
                padding-top: .25rem !important
            }

            .pt-xxl-2 {
                padding-top: .5rem !important
            }

            .pt-xxl-3 {
                padding-top: 1rem !important
            }

            .pt-xxl-4 {
                padding-top: 1.5rem !important
            }

            .pt-xxl-5 {
                padding-top: 3rem !important
            }

            .pe-xxl-0 {
                padding-right: 0 !important
            }

            .pe-xxl-1 {
                padding-right: .25rem !important
            }

            .pe-xxl-2 {
                padding-right: .5rem !important
            }

            .pe-xxl-3 {
                padding-right: 1rem !important
            }

            .pe-xxl-4 {
                padding-right: 1.5rem !important
            }

            .pe-xxl-5 {
                padding-right: 3rem !important
            }

            .pb-xxl-0 {
                padding-bottom: 0 !important
            }

            .pb-xxl-1 {
                padding-bottom: .25rem !important
            }

            .pb-xxl-2 {
                padding-bottom: .5rem !important
            }

            .pb-xxl-3 {
                padding-bottom: 1rem !important
            }

            .pb-xxl-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-xxl-5 {
                padding-bottom: 3rem !important
            }

            .ps-xxl-0 {
                padding-left: 0 !important
            }

            .ps-xxl-1 {
                padding-left: .25rem !important
            }

            .ps-xxl-2 {
                padding-left: .5rem !important
            }

            .ps-xxl-3 {
                padding-left: 1rem !important
            }

            .ps-xxl-4 {
                padding-left: 1.5rem !important
            }

            .ps-xxl-5 {
                padding-left: 3rem !important
            }

            .text-xxl-start {
                text-align: left !important
            }

            .text-xxl-end {
                text-align: right !important
            }

            .text-xxl-center {
                text-align: center !important
            }
        }

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
                    $visibility = $i == 1 ? "flex;" : "none;";
                    if ($counter <= 0) {
                        echo '<fieldset class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" data-products-page="' . $i . '"  style="display: ' . $visibility . '">';
                    }
                ?>
                    <div class="col" data-fieldset="<?php echo $i; ?>" data-record="<?php echo ($counter++) + 1 ?>">
                        <div class="card shadow-sm">
                            <?php
                            if ($j < count($products)) {
                                echo '<img src="' . $products[$j] . '" 
                                    class="bd-placeholder-img card-img-top" 
                                    width="100%" height="225" aria-label="Placeholder: Product ' . $j . '" 
                                    aria-hidden="true" tabindex="' . $j . '"
                                />';
                            } else { ?>
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
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
                        echo '<br/><hr style="width: 100%;"></fieldset>';
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
