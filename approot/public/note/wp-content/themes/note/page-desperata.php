<?php get_template_part('meta'); ?>
<?php get_header(); ?>

<?php
	// Login link allow
	if (ip_restrict() != true) {
		exit('<p style="margin:30px">Ugly hacks.</p>');
	}
?>

<article>
	<section id="desperata" class="desperata">
		<div class="dw">
		<?php $c = query_posts('post_type=desperata'); //var_dump($c); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="dw-panel desperata_block cf">
		<?php //var_dump(get_the_ID());
			$args = array(
				'post_type'   => 'attachment',
				'numberposts' => -1,
				'post_status' => null,
				'post_parent' => get_the_ID()
			);

				$attachments = get_posts($args);
				// var_dump($attachments[0]->guid);
				get_the_ID();
				if (!empty($attachments[0]->guid)) {
					echo '<div id="'.get_the_ID().'" class="desperata_block_img">';
					echo '<a href="'.get_the_permalink().'">';
					echo '<img src="'.$attachments[0]->guid.'" class="icatchphoto" id="icatch_'.get_the_ID().'">';
					echo '</a></div>';
				}
			?>
				<p class="desperata_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				<span class="date"><?php the_time('Y,m,d(D)'); ?></span>
				<?php the_excerpt(); ?>
<!--
				<div class="dw-panel__content">
					
					
					<?php the_time('Y,m,d(D)'); ?>
					<?php the_category(', '); ?>
					<?php the_excerpt(); ?>
				</div>
-->
			</div><!-- END dw-panel -->
			<?php endwhile; else: ?>
				記事がありません。
			<?php endif; ?>
		</div><!-- END .dw-->
	</section>
<!--
						<div class="desperata_ablock">
			<?php $c = query_posts('post_type=desperata'); //var_dump($c); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php
				//var_dump(get_the_ID());
				$args = array(
					'post_type'   => 'attachment',
					'numberposts' => -1,
					'post_status' => null,
					'post_parent' => get_the_ID()
				);

				$attachments = get_posts($args);
				// var_dump($attachments[0]->guid);
				echo '<div id="block_'.get_the_ID().'" class="desperata_ablock_item oneblock">';
				if (!empty($attachments[0]->guid)) {
				echo '<div id="'.get_the_ID().'" class="single_block"><a href="'.get_the_permalink().'"><img src="'.$attachments[0]->guid.'" class="icatchphoto" id="icatch_'.get_the_ID().'"></a></div>';
				}
			?>
				<div class="des_text">
					<div class="des_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					<div class="des_date"><?php the_time('Y,m,d(D)'); ?></div>
					<div class="des_cat"><?php the_category(', '); ?></div>
					<?php the_excerpt(); ?>
				</div>
			</div>
			<?php endwhile; else: ?>
				<div>記事がありません。</div>
			<?php endif; ?>
		</div>
-->
</article>


<?php get_footer(); ?>
