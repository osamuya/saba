<?php require(TEMPLATEPATH.'/config.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/note/wp-config.php'); ?>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bootstrap3 チュートリアル</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>


<nav class="nav" id="wrap">
	<ul id="navigation" class="nav__block">
		<li class="nav__block--list"><a href="/note/archives">ARCHIVES</a></li>
		<li class="nav__block--list"><a href="<?php bloginfo('url'); ?>">SABA NOTE</a></li>
		<li class="nav__block--list"><a href="<?php bloginfo('url'); ?>/gallery/">GALLERY</a></li>

		<?php
			// Login link allow
		echo WP_DEBUG;
			if (ip_restrict()==true) {
				echo '<li class="nav__block--list"><a href="'.wp_logout_url($redirect).'" target="_blank">LOGIN</a></li>';
			}
		?>
		<li id="pld_menu_ac" class="nav__block--list"><a href="#">MENU</a></li>
		<li class="nav__block--list"><a href="/"><img src="https://pupu-omnioo.ssl-lolipop.jp/saba/gate/public/assets/img/home.png" id="home_icon"></a></li>
	</ul>
</nav>

<div class="alert alert-success">
  <strong>Success!</strong> 成功または正のアクションを示します。
</div>
<div class="alert alert-info">
  <strong>Info!</strong> 中立的な情報の変更や行動を示します。
</div>
<div class="alert alert-warning">
  <strong>Warning!</strong> 注意が必要な警告を示します。
</div>
<div class="alert alert-danger">
  <strong>Danger!</strong> 危険なまたは潜在的に否定的な行動を示します。
</div>


<header class="header">
	<h1 class="header__ttl"><a href="<?php bloginfo('url'); ?>">Saba note</a></h1>
	<div id="saba22img" class="header__img">
		<a href=""><img src="/assets/img/masaba.png" alt="<?php bloginfo('description'); ?>"></a>
	</div>
</header>

<div class="headerbottom"></div>
<div id="layer"></div>
