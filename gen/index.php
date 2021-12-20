FU
<?php
include('sitemap-generator.php');

$smg = new SitemapGenerator(include('sitemap-config.php'));

$smg->GenerateSitemap();
