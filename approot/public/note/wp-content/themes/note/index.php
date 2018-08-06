<!doctype html>
<!--[if IE 6]> <html class="ie6"> <![endif]-->
<!--[if IE 7]> <html class="ie7"> <![endif]-->
<!--[if IE 8]> <html class="ie8"> <![endif]-->
<!--[if IE 9]> <html class="ie9"> <![endif]-->
<html lang="ja">
<!--<![endif]-->
<head>
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

<meta name="description" content="">
<meta name=”keywords” content=””>

<link rel="stylesheet" href="/assets/css/bootstrap.css">
<link rel="stylesheet" href="/assets/css/index.css">

<script src="/assets/js/jquery-1.11.3.min.js"></script>
<script src="/assets/js/bootstrap.bundle.js"></script>
<script src="/assets/js/bundle.js"></script>
<title>Saba note</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<h1 class="nav_logo">
			<a class="navbar-brand" href="#">Saba note</a>
		</h1>
		<img src="/assets/img/masaba.png" class="logo">
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="Navber">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="/note/">HOME <span class="sr-only">(現位置)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/note/archives/">ARCHIVES</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="/note/gallery/">GALLERY</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          MENU
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">メニュー1</a>
	          <a class="dropdown-item" href="#">メニュー2</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">その他</a>
	        </div>
	      </li>
	    </ul>

	    <form action="/note/" id="searchform" class="searchform form-inline my-2 my-lg-0">
	      <input type="text" name="s" id="s" class="form-control mr-sm-2" placeholder="検索..." aria-label="検索...">
	      <button type="submit" id="searchsubmit" class="btn btn-secondary my-2 my-sm-0">検索</button>
	    </form>

	  </div><!-- /.navbar-collapse -->
	</nav>

<div class="container mt60">
  <div class="row">

    <!-- main contents -->
    <div class="col-lg-9 col-md-9 col-sm-12">
      <div class="main">

        <!--main_block-->
        <?php query_posts($query_string .'&orderby=modified'); ?>
        <?php if (have_posts()): ?>
        <?php $i=0; ?>
        <?php while(have_posts()) : the_post(); ?>

          <div class="main_block">
              <h3 class="blog_title">
                <?php echo "<span class='num'><!--".$i."--></span>"; ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?><!--<? the_date('Y.m.d');?>-->
                </a>
              </h3>

              <div class="sub_block">
                  <!--image-->
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('thumbnail'); ?>
                  <?php else : ?>
                  <p class="description">
                      <span class="thumbnail-trimer rounded-circle">
                      <img
                        class="thumbnail-img"
                        src="<?php echo catch_that_image(); ?>">
                      </span>
                  </p>

                  <?php
                  $description = strip_tags(get_the_content());
                  $description = mb_strimwidth($description,0,150,"...");
                  ?>
                <span class="description-text">
                  <?php //echo get_the_excerpt(); ?>
                  <?php echo $description; ?>
                </span>
              </div>
              <?php endif ; ?>
          </div><!--//.block-->

        <?php $i++; ?>
        <?php endwhile; ?>
        <?php else : ?>

        <div class="block-entry clearfix">
          <div id="notfound">
            <p>投稿がありませんが、たぶんどっかにあるので、再検索してみてください。</p>
          </div>
        </div>
        <?php endif; ?>
        <!--main_block end-->

        <div class="page-navi mt30 mb30 mx-auto">
          <?php
          //Pagenation
          if (function_exists("pagination")) {
          	pagination($additional_loop->max_num_pages);
          }
          ?>
        </div><!--page-navi-->

      </div>
    </div><!-- main contents end -->

    <!-- Sidebar -->
    <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="sidebar">
            <?php if ( !function_exists('dynamic_sidebar')
              || !dynamic_sidebar() ) : ?>
              <!--ダイナミックサイドバーなかった時の処理-->
            <?php endif; ?>
        </div>
    </div><!-- Sidebar end -->

  </div>
</div>


  <footer class="bg-light text-center">
    	<div class="copyright pt10 pb10">
          <span>Copyright (C) <script type="text/JavaScript">
          <!-- now = new Date(); str = now.getFullYear(); document.write(str); //-->
          now = new Date();
          str = now.getFullYear();
          document.write(str);
          //-->
          </script>
          Saba note. All rights reserved.</span>
      </div>
  </footer>

<!-- Mautic tracking settings -->
<script>
    (function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
        w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
        m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://omnioo.mautic.net/mtc.js','mt');
    mt('send', 'pageview');
</script>
</body>
</html>
