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

<div class="container mt60">
  <div class="row">

    <!-- main contents -->
    <div class="col-lg-9 col-md-9 col-sm-12">
      <h2 class="h2 mb40">Gallery</h2>
      <div class="gallery">
        <!--main_block-->
        <div class="garelly_block">
        <?php
            $args = array(
              "post_type" => "post",
              "posts_per_page" => 1000,
            );
            $the_query = get_posts( $args );
            foreach ( $the_query as $post ) : setup_postdata( $post );
            if (!empty(get_image())) {
                echo "<span class='gthumbnail_trimer'>";
                echo "<a href='".get_permalink()."'>";
                echo '<img class="gthumbnail" src="'.get_image().'">';
                echo '</a>';
                echo "</span>";
            }
            endforeach;
            wp_reset_postdata();
        ?>
        </div>
      </div>
      <!--main_block end-->
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

<?php get_template_part('inc/footer'); ?>
</body>
</html>
