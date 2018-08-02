<?php get_template_part('meta'); ?>
<?php get_header(); ?>

<article>
	<section id="gallery" class="gallery">

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

	</section>
</article>

<?php get_footer(); ?>