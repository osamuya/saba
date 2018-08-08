<?php
	$cat = get_the_category();
	$cat = $cat[0];
	$cat_name = $cat->name;
	$cat_id   = $cat->cat_ID;
	$cat_slug = $cat->slug;
	$cat_term = $cat->term_id;
	$cat_termid   = $cat->term_taxonomy_id;
	$cat_taxonomy = $cat->taxonomy;
	$cat_count   = $cat->count;
	$cat_description   = $cat->category_description;
	$parent_id = $cat->category_parent;
	$parent = get_category($cat->category_parent);
	$parent_catname = $parent->cat_name;
	echo  $cat_name."<br>";
	echo  $cat_slug."<br>";
	echo  $cat_id."<br>";
	echo  $cat_term."<br>";
	echo  $cat_termid."<br>";
	echo  $cat_taxonomy."<br>";
	echo  $cat_count."<br>";
	echo  $cat_description."<br>";
	echo  $parent_id."<br>";
	echo  $parent_catname."<br>";
?>

<p><?php single_cat_title('タグ： '); ?></p>
