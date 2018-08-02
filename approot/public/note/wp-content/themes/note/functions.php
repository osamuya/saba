<?php

// Access restriction
$denyIp = array(
	'61.126.188.59',		// sankaku-shibuya
	// '119.243.74.222',	// sankaku-shibuya(backup & guest)
	'153.120.8.50',			// sankaku main server (sankaku Git)
	'221.42.149.135',		// nishina
);

# Dynamic side bar
if ( function_exists('register_sidebar') ) register_sidebar();

# image tag custamiz
add_filter('get_image_tag_class', function($class){
    return $class . ' lightbox';
});

# icatch
add_theme_support('post-thumbnails');



/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//function my_connection_types() {
//	// Posts 2 Posts プラグインが有効化されてるかチェック
//	if ( !function_exists( 'p2p_register_connection_type' ) )
//		return;
//
//	// 登録する
//	p2p_register_connection_type(
//		array(
//			'name' => 'posts_to_pages',	// 紐付けグループの名称
//			'from' => 'desperata',			// 出力されるアイテム
//			'to' => 'post'				// 出力する投稿タイプ
//		)
//	);
//}
//add_action( 'wp_loaded', 'my_connection_types' );
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////




//// カスタム投稿タイプでJetpack Markdownが使えるようにする
//add_post_type_support( 'desperata', 'wpcom-markdown' );
//
//// 投稿時に記事をバックアップ
//function send_the_content($post_id) {
//    $post = get_post($post_id);
//    $send_title = $post->post_title;
//    $send_content = $post->post_content;
//    wp_mail('oosamuuy@gmail.com',$send_title,$send_content,'From:oosamuuy@gmail.com');
//
//    return;
//}
////publish_post
//add_action( 'publish_post', 'send_the_content', 1 ,6);

// ip limited
function ip_restrict() {
	
	// Access allow
	$alow_ip_limited = array (
		'127.0.0.1',		//self
		'60.94.37.1',		//self
		'221.42.149.135',	//izu nishina
		'61.126.188.59',	// sankaku-shibuya
	//	'119.243.74.222',	// sankaku-shibuya(backup & guest)
		'126.196.29.106',	// yamakami-jitaku
		'153.120.8.50',		// sankaku main server (sankaku Git)
//		'60.94.37.1',		// yamakami-jitaku
//		'218.221.176.126',	// yamakami-jitaku2
//		'219.98.151.183',	// okadakako
//		'126.255.211.78',	// okadakako
		'61.21.62.90',		// chouhu
	);

	// Access deny
	$denyIp = array(
		'61.126.188.59',		// sankaku-shibuya
		// '119.243.74.222',	// sankaku-shibuya(backup & guest)
		'153.120.8.50',			// sankaku main server (sankaku Git)
		'221.42.149.135',		// nishina
	);

	foreach ($alow_ip_limited as $num=>$ip) {
		$return='';
		if ($_SERVER["REMOTE_ADDR"] == $ip) {
			$return = true;
			break;
		} else {
			$return = false;
			continue;
		}
	}
//	var_dump($alow_ip_limited);
	
	return $return;
}
