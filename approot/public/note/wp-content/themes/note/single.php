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
  <li><a href="/note/">ホーム</a></li>
  <li><a href="/note/archives/">Archives</a></li>
  <li class="active"><?php the_title(); ?></li>
</ol>

<div class="container mt60">
  <div class="row">

    <!-- main contents -->
    <div class="col-lg-9 col-md-9 col-sm-12">

			<!--main_block-->
			<?php if (have_posts()): ?>
			<?php $i=0; ?>
			<?php while(have_posts()) : the_post(); ?>
      <h2 class="h2 mb40"><?php the_title(); ?></h2>

      <div class="blog">
					<div class="blog_content">
							<?php the_content(); ?>
					</div>
					<div class="blog_meta">
							<?php the_date('Y.m.d');?>
					</div>
      </div>

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
