<footer id="footer" class="footer">
	<ul class="footer__menu">
	
		<li class="footer__menu--list"><a href="<?php bloginfo('url'); ?>">HOME</a></li>
		<li class="footer__menu--list"><a href="/contact/form/">CONTACT US</a></li>
		<li class="footer__menu--list"><a href="https://github.com/github" target="_blank">Github</a></li>
		<li class="footer__menu--list"><a href="https://packagist.org/">packagist</a></li>
		<li class="footer__menu--list"><a href="http://www.blogmura.com/ranking.html" target="_blank">にほんブログ村</a></li>
		<li class="footer__menu--list"><a href="http://af.moshimo.com/" target="_blank">もしもアフィリエイト</a></li>
	</ul>

	<ul class="footer__banner">
		<li class="footer__banner--list"><script type="text/javascript" src="https://minmoji.ucda.jp/sealjs/http%3A__saba.omnioo.com" charset="UTF-8"></script></li>
	</ul>

	<div class="footer__copyright">
			<span>Copyright (C) <script type="text/JavaScript">
			<!-- now = new Date(); str = now.getFullYear(); document.write(str); //-->
			now = new Date();
			str = now.getFullYear();
			document.write(str);
			//-->
			</script>
			Saba note. All rights reserved.</span>
	</div>
</footer>

<p class="pagetop" style="display: block; opacity: 0.993215;"><a href="#wrap"><img src="https://pupu-omnioo.ssl-lolipop.jp/saba/gate/public/assets/img/arrow.png"></a></p>

<?php wp_footer(); ?>

<!-- Mautic tracking settings -->
<script>
    (function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
        w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
        m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://omnioo.mautic.net/mtc.js','mt');

    mt('send', 'pageview');
</script>

</body>
</html>