<!doctype html>
<!--[if IE 6]> <html class="ie6"> <![endif]-->
<!--[if IE 7]> <html class="ie7"> <![endif]-->
<!--[if IE 8]> <html class="ie8"> <![endif]-->
<!--[if IE 9]> <html class="ie9"> <![endif]-->
<html lang="ja">
<!--<![endif]-->
<head>
<?php get_template_part('inc/meta'); ?>
</head>
<body>
<?php get_template_part('inc/navi'); ?>

<ol class="breadcrumb bg-white">
  <li class="active">ホーム</li>
</ol>

<div class="container mt60">
  <div class="row">

    <!-- main contents -->
    <div class="col-lg-9 col-md-9 col-sm-12">
      <h2 class="h2 mb40">Saba note new articles</h2>
      <div class="main">
        <?php get_template_part('inc/main_top_loop'); ?>
      </div>
    </div><!-- main contents end -->

    <!-- Sidebar -->
    <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="sidebar">

            <div class="sns mb20">
              <a href="<?php bloginfo('rss2_url'); ?>" target="_blank">
                <img src="/assets/img/sns/rss.png" class="sns_icon">
              </a>
              <a href="https://twitter.com/osamthing" target="_blank">
                <img src="/assets/img/sns/twitter.png" class="sns_icon">
              </a>
              <a href="http://osamuya.tumblr.com/" target="_blank">
                <img src="/assets/img/sns/thumblr.png" class="sns_icon">
              </a>
            </div>

            <div class="tw_area mb30">
              <a href="https://twitter.com/osamthing" target="_blank">
                <span class="thumbnail-trimer rounded-circle">
                  <img src="/assets/img/osamthing.jpg" class="thumbnail-img">
                </span>
              </a>
              <div class="tw_moment">
                会社の経営戦略と制作というのはいつも相反するところがあって、これは江戸時代の商人と武士というような本来の階級と豊かさが逆転しているというような現象にもみえなくない。実際の政治（つまり決定権）は最終的な具体性にコミットしている人間がその力を持つことになるというだけの話ではある。
              </div>
            </div>
            <?php if ( !function_exists('dynamic_sidebar')
              || !dynamic_sidebar() ) : ?>
              <!--ダイナミックサイドバーなかった時の処理-->
            <?php endif; ?>
        </div>
    </div><!-- Sidebar end -->

  </div>
</div>

<?php get_template_part('inc/footer'); ?>
</body>
</html>
