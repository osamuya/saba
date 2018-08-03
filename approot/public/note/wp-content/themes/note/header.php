<?php require(TEMPLATEPATH.'/config.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/note/wp-config.php'); ?>

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

<div id="pld_menu" class="pldm_close">
	<div class="m_block">
		<ul>
			<li><a href="/note/desperata/">絶望日記</a></li>
			<li><a href="http://osamuya.tumblr.com/" target="_blank">osamuya.tumblr.com</a></li>
			<li><a href="https://twitter.com/osamuya" target="_blank">Twitter::osamuya</a></li>
			<li><a href="http://noz.day-break.net/webcolor/" target="_blank">Web color Basic</a></li>
			<li><a href="http://www.colordic.org/" target="_blank">原色大辞典</a></li>
			<li><a href="https://color.adobe.com/ja/create/color-wheel/" target="_blank">Adobe Color CC</a></li>
			<li><a href="http://www.htaccesseditor.com/" target="_blank">.htaccesss作成Editor</a></li>
		</ul>
	</div>
	<div class="m_block">
		<ul>
			<li><a href="http://www.luft.co.jp/cgi/randam.php" target="_blank">パスワード生成（パスワード作成）ツール</a></li>
			<li><a href="http://www.tagindex.com/cgi-lib/encode/url.cgi" target="_blank">HTMLエンコード</a></li>
			<li><a href="http://www.cman.jp/network/support/go_access.cgi" target="_blank">IPアドレス確認</a></li>
			<li><a href="https://tinypng.com/" target="_blank">Tiny Ping</a></li>
			<li><a href="http://www.luft.co.jp/cgi/coding.php">メールアドレス収集ロボット対策用 メールアドレス暗号化ツール</a></li>
		</ul>
	</div>
</div>

<header class="header">
	<h1 class="header__ttl"><a href="<?php bloginfo('url'); ?>">Saba note</a></h1>
	<div id="saba22img" class="header__img">
		<a href=""><img src="/assets/img/masaba.png" alt="<?php bloginfo('description'); ?>"></a>
	</div>
</header>

<div class="headerbottom"></div>
<div id="layer"></div>
