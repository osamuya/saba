<?php

/* Get Thumbnail */
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = "https://saba.omnioo.com".$matches[1][0];

    if(empty($matches[1][0])){
        // 記事内で画像がなかったときのためのデフォルト画像を指定
        $first_img = "/assets/img/default.jpg";
    }
    return $first_img;
}

/* Pagenation */
function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }

     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
		 echo "<div class=\"pagenation\">\n";
		 echo "<ul>\n";
		 //Prev：現在のページ値が１より大きい場合は表示
         if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }
		//Next：総ページ数より現在のページ値が小さい場合は表示
		if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
		echo "</ul>\n";
		echo "</div>\n";
     }
}




// Access restriction
// $denyIp = array(
// 	'61.126.188.59',		// sankaku-shibuya
// 	// '119.243.74.222',	// sankaku-shibuya(backup & guest)
// 	'153.120.8.50',			// sankaku main server (sankaku Git)
// 	'221.42.149.135',		// nishina
// );

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
