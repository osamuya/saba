<?php get_template_part('meta'); ?>
<?php get_header(); ?>

<article>
	<section id="single" class="single">
	
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
	
		<div class="single__entry">

			<?php if (have_posts()): ?>
			<?php while(have_posts()) : the_post(); ?>
			<h1 class="single__entry--ttl">
				<?php the_title(); ?>
			</h1>

			<!-- sns prepare -->
			<?php
				// tags
				$sns_category = get_the_category();
				$sns_cat_name = $sns_category[0]->cat_name;
				// caption
				$sns_contents = get_the_content();
				$sns_contents = preg_replace("/\n|\"/","",strip_tags($sns_contents));
				$sns_contents = mb_substr($sns_contents,0,256).'......';
				$sns_tw_contents = mb_substr($sns_contents,0,50).'......';
			?>
			<!-- sns prepare -->
			<div id="sns" class="single__entry--sns">
				<div id="sns_thumblr">
					<a class="tumblr-share-button" href="https://www.tumblr.com/share" data-tags="<?php echo $sns_cat_name; ?>" data-caption="<?php echo $sns_contents; ?>" data-show-via="show-via"></a>
					<script id="tumblr-js" async src="https://assets.tumblr.com/share-button.js"></script>
				</div>

				<div id="sns_twitter">
					<a href="https://twitter.com/share" class="twitter-share-button" data-via="osamuya" data-lang="ja" data-count="none" data-text="<?php the_title(); echo $sns_tw_contents;?>">ツイート</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>

				<div id="sns_facebook">
					<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">シェア</a></div>
				</div>
			</div>
			
			<?php
				// 編集URLを表示
				// edit_post_link( $link, $before, $after, $id );
				if (is_user_logged_in() && ip_restrict()) {
					edit_post_link('この記事を編集', '<p class="edit-wp-post">', '</p>');
				}
			?>

			<div class="single__entry--content">
				<div id="lbb"></div>
				<?php the_content(); ?>
				
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
			</div>

			<div class="single__entry--footer">
				<div class="category single__entry--footer--cat"><?php the_category(); ?></div>
				<div class="tag single__entry--footer--tag"><?php the_tags('',$before, $sep, $after ); ?></div>
				<div class="create single__entry--footer--create"><?php the_date('Y.m.d');?></div>

				<div id="page-view" class="single__entry--footer--pageview">
					<span><?php previous_post_link('%link','<< 前の投稿'); ?></span>
					<span><?php next_post_link('%link','次の投稿 >>'); ?></span>
				</div>
			</div>

			<div>
			<!-- <?php
				$connected = new WP_Query( array(
				    'post_type' => 'page',
				    'connected_from' => get_queried_object_id()
				) );
				//var_dump($connected);
				echo '<h3>この記事に関連しているページ</h3>';
				echo '<ul>';
				while ( $connected->have_posts() ) : $connected->the_post();
				    echo '<li>';
				    the_title();
				    echo '</li>';
				endwhile;
				echo '</ul>';
				wp_reset_postdata();
			?> -->
			</div>

			<?php endwhile; ?>
			<?php else : ?>
				<p>投稿がありません。</p>
			<?php endif; ?>

			<div id="entry-commnets">
			<?php
				if (comments_open() || get_comments_number()) {
					comments_template();
				}
			?>
			</div>
		</div><!-- .entry END -->
	</section>
</article>

<div id="sidebar" class="sidebar">
	<ul>
	<?php if ( !function_exists('dynamic_sidebar')
		|| !dynamic_sidebar() ) : ?>
		//ダイナミックサイドバーなかった時の処理
	<?php endif; ?>
	</ul>
</div>

<?php get_footer(); ?>
</body>
</html>

