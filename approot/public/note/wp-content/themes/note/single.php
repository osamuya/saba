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

<?php
    /*Current Category*/
    $current_category_array = get_the_category();
    $ccat_name = $current_category_array[0]->name;
    $ccat_slug = $current_category_array[0]->slug;
    $ccat_path = get_bloginfo("home")."/category/".$ccat_slug;
?>
<ol class="breadcrumb bg-white">
  <li><a href="/note/">ホーム</a></li>
  <li><a href="<?php echo $ccat_path; ?>"><?php echo $ccat_name; ?></a></li>
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
					<div class="blog_meta text-right">
							<!--<?php the_date('Y.m.d');?>-->
              Last update: <?php the_modified_date('Y.m.d (D)'); ?>
              <div class="category blog-cat mt10"><?php the_category(" | "); ?></div>
              <div class="tag blog-tag mt10"><?php the_tags('',$before, $sep, $after ); ?></div>
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

      <div class="blog-pageview mx-auto mt30 mb30">
        <span><?php previous_post_link('%link','< 前の投稿'); ?></span>
        <span><?php next_post_link('%link','次の投稿 >'); ?></span>
      </div>


      <div id="single_ad">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- omnoo Record 200block -->
        <ins class="adsbygoogle"
           style="display:inline-block;width:200px;height:200px"
           data-ad-client="ca-pub-1927544273700791"
           data-ad-slot="8315769773"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
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
