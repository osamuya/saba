<?php get_template_part('meta'); ?>
<?php get_header(); ?>

<article>


<!--wordpress category-->
<section id="archives" class="archives">
	<h2 class="archives__ttl">Saba note Category</h2>

	<div class="category_archives archives__block">
		
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
				echo "<h3 class=\"archives__block--ttl\">".$value->cat_name."</h3>";
				echo '<ul class="archives__block--linkblock">';
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
</section>


</article>

<?php get_footer(); ?>
