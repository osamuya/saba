<?php
/* Template */
if ( is_front_page() && is_home() ) {
    $add_title = "";
} elseif ( is_page() ) {
    $add_title = " | ".get_the_title();
} elseif ( is_single() ) {
    $current_category_array = get_the_category();
    $ccat_name = $current_category_array[0]->name;
    $ccat_slug = $current_category_array[0]->slug;
    $ccat_path = get_bloginfo("home")."/category/".$ccat_slug;
    $add_title = " | ".$ccat_name." | ".get_the_title();
} else {
    $add_title = "";
}
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-74972634-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-74972634-1');
</script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="robots" content="all">
<meta name="viewport" content="width=device-width,user-scalable=no">
<meta name="format-detection" content="telephone=no">

<meta property="og:type" content="website">
<meta property="og:locale" content="ja_JP">
<meta property="og:site_name" content="Saba note">
<meta property="og:url" content="<?php the_permalink(); ?>">
<meta name="twitter:url" content="<?php the_permalink(); ?>">
<meta property="og:image" content="">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="assets/img/saba_twitter.jpg">
<meta property="og:description" content="">
<meta name="twitter:description" content="">

<link rel="stylesheet" href="/assets/css/font-awesome.css">
<link rel="stylesheet" href="/assets/css/bootstrap.css">
<link rel="stylesheet" href="/assets/css/index.css">

<script src="/assets/js/jquery-1.11.3.min.js"></script>
<script src="/assets/js/bootstrap.bundle.js"></script>
<script src="/assets/js/bundle.js"></script>

<title>Saba note<?php echo $add_title; ?></title>
<meta name="description" content="">
<meta name=”keywords” content=””>
