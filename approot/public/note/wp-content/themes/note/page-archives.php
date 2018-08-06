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
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="archives">
				<?php
					// 記事を取り出す
					// posts_per_page=-1で全件取り出し

					// All Categories
					$args = array(
						'orderby' => 'order',
						'order' => 'ASC',
						'exclude' => '1' // 「未設定」カテゴリを除外
					);
					// var_dump($all_categories);
					$categories = '';
					foreach (get_categories($args) as $key => $value) {
						echo "<h3 class=\"archives_block_title\">".$value->cat_name."</h3>";
						echo '<ul class="link_block">';
						query_posts('posts_per_page=-1');
						// ループ（改変したメインクエリ）
						if ( have_posts() ) :
								while ( have_posts() ) : the_post();
								if (in_category(array($value->cat_name))) {
									$permalink = get_the_permalink();
									echo '<li>';
									echo '<a href="'.$permalink.'">';
									the_title();
									echo '</a>';
									echo '</li>';
								}
							endwhile;
						else:
							// 何も取得されなかった
						endif;

						// クエリをリセット
						wp_reset_query();
						echo '</ul>';
						echo '<br clear="both">';
					}
				?>

      </div>
    </div><!-- main contents end -->

  </div>
</div>

<?php get_template_part('inc/footer'); ?>
</body>
</html>
