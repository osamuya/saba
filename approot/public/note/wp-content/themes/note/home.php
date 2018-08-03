<?php get_template_part('meta'); ?>
<?php get_header(); ?>
<?php echo "123232321"; ?>



<article>
	<section id="toppage" class="toppage">

	<div id="gsearch" class="gsearch">
		<script>
			(function() {
			    var cx = '009503186892029741062:gpqstvi6va8';
			    var gcse = document.createElement('script');
			    gcse.type = 'text/javascript';
			    gcse.async = true;
			    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
			        '//cse.google.com/cse.js?cx=' + cx;
			    var s = document.getElementsByTagName('script')[0];
			    s.parentNode.insertBefore(gcse, s);
	  		})();
		</script>
		<gcse:searchbox-only></gcse:searchbox-only>
	</div>
	<br clear="both">

		<?php query_posts($query_string .'&orderby=modified'); ?>
		<?php if (have_posts()): ?>
		<?php $i=0; ?>
		<?php while(have_posts()) : the_post(); ?>

			<div class="toppage__bblock">
				<h3 class='toppage__bblock--ttl'>
					<?php print "<span class='num'><!--".$i."--></span>"; ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?><!--<? the_date('Y.m.d');?>-->
					</a>
				</h3>
				<div class="toppage__bblock--description">

				<?php
					$permalink = get_permalink($post->ID);

					$id = get_the_ID();

					$images = get_children("post_parent=$id&amp;post_type=attachment&amp;post_mime_type=image");

                    // the_post_thumbnail('thumbnail');
                    // $img = get_the_post_thumbnail('thumbnail');
                    // var_dump($img);

					if ($images) {
						$keys = array_keys($images);
						$lastkeys = array_pop($keys);
						$num = $lastkeys;
						$thumbnail = wp_get_attachment_image_src($num,'medium');

						$pathinfo = array();
						$pathinfo = pathinfo($thumbnail[0]);
						if ($pathinfo['extension'] == '') {
							print '';
						} else {
							print "<a href='".$permalink."'>\n";
							print '<img src="' . $thumbnail[0] . '" alt="' . $post->post_title . '" class="toppage__bblock--description--thmbnail">' . "\n";
							print "</a>\n";
						}
					} else {
						//print "なんかデフォルトのイメージとか。";
					}
				?>

							<?php the_excerpt(); ?>
						</div>
					</div><!--//.block-->
					<br>
		<?php $i++; ?>
		<?php endwhile; ?>
		<?php else : ?>

		<div class="block-entry clearfix">
			<div id="notfound">
				<p>投稿がありませんが、たぶんどっかにあるので、再検索してみてください。</p>
			</div>
		</div>
		<?php endif; ?>



		<div id="page-navi" class="pagenavi">
			<div id="page-navi-inner" class="pagenavi__block">


				<?php
					if(function_exists('wp_pagenavi')) {
						wp_pagenavi();
					}
					global $wp_query;
				?>

			</div>
		</div>


	</section>
</article>

<div id="sidebar" class="sidebar">
	<ul>
	<?php if ( !function_exists('dynamic_sidebar')
		|| !dynamic_sidebar() ) : ?>
		//ダイナミックサイドバーなかった時の処理
	<?php endif; ?>
	</ul>
	<div class="all_blogs">
	<?php
		global $wp_query;
		if (is_front_page() || is_home()) {
			echo  $wp_query->found_posts;
		} else {

		}
		?>
	</div>
</div>


<?php get_footer(); ?>
