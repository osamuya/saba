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

				<ul class="archives-thumbnails gallery__thumbnails">
					<?php
					$my_id = 0;
					$num = 1000;
					$re = attachment_ancherlinks($my_id,$num);

					function attachment_ancherlinks($my_id=0, $num){
						$args = "category=".$my_id."&numberposts=".$num;
						$posts = get_posts($args);

						for($i=0; $i <$num ;$i++){
							if($i>= count($posts) ) return;
								$attachments = get_children(array('post_parent' => $posts[$i]->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order'));
								$url = $posts[$i]->guid;
								$title= $posts[$i]->post_title;
								if(is_array($attachments)){
									$attachment = array_shift($attachments);
									if (wp_get_attachment_image($attachment->ID)) {
										// $header_params = @get_headers($url);
										// var_dump($header_params);
										print "<li class='resize_thumbnail gallery__thumbnails--img'><a href='".$url."' title='".$title."'>".wp_get_attachment_image($attachment->ID)."</a></li>\n";
									}
								}
							}
						}
					?><br style="clear:both">
				</ul>
				
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

<?php get_template_part('inc/footer'); ?>
</body>
</html>
