<!--main_block-->
<?php if (have_posts()): ?>
<?php $i=0; ?>
<?php while(have_posts()) : the_post(); ?>

  <div class="main_block">
      <h3 class="blog_title">
        <i class="fa fa-file-o" aria-hidden="true"></i>
        <?php echo "<span class='num'><!--".$i."--></span>"; ?>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?><!--<? the_date('Y.m.d');?>-->
        </a>
      </h3>

      <div class="sub_block">
          <!--image-->
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('thumbnail'); ?>
          <?php else : ?>
          <p class="description">
              <span class="thumbnail-trimer rounded-circle">
              <img
                class="thumbnail-img"
                src="<?php echo catch_that_image(); ?>">
              </span>
          </p>

          <?php
          $description = strip_tags(get_the_content());
          $description = mb_strimwidth($description,0,150,"...");
          ?>
        <span class="description-text">
          <?php //echo get_the_excerpt(); ?>
          <?php echo $description; ?>
        </span>
      </div>
      <?php endif ; ?>
  </div><!--//.block-->

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

<div class="page-navi mt30 mb30 mx-auto">
  <?php
  //Pagenation
  if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
  }
  ?>
</div><!--page-navi-->
