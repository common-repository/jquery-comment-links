<?php
/*
Plugin Name: jQuery Comment Links
Plugin URI: http://articlesss.com/jquery-comment-links-wordpress-plugin/
Description: Plugin replaces comment author link and (or) links in comment text on jQuery links.
Version: 0.1.1
Author: Dimox
Author URI: http://dimox.name/
*/


/* ======= OPTIONS ======= */

$jquery_comment_author_link = TRUE; // TRUE - replace comment author link, FALSE - no replace;
$jquery_comment_links = TRUE;       // TRUE - replace comment links, FALSE - no replace;

/* ===== END OPTIONS ===== */


function jqcl_jquery() {
	if ( comments_open() && ( is_single() || is_page() ) ) { wp_enqueue_script('jquery'); }
}


function jquery_comment_links() {
	echo "\n\r";
?>
<script type="text/javascript">/*<![CDATA[*/
var $j = jQuery.noConflict();
$j(document).ready(function() {
	$j('a.jqcl').each(function() {
		var link = $j(this).attr('title');
		$j(this).attr('href', 'http://'+link).attr('title', 'http://'+link);
	});
})
/*]]>*/</script>
<?php }


function jqcl_author_link() {
	$url = get_comment_author_url();
	$author = get_comment_author();
	if (!preg_match('#'.get_option('home').'#im', get_comment_author_url())) {
		$url = str_replace('http://', '', $url);
		if (get_comment_author_url() == '' || get_comment_author_url() == 'http://') {
			$return = "$author";
		} else {
			$return = "<a href=\"#\" class=\"jqcl\" title=\"$url\" rel=\"nofollow\">$author</a>";
		}
	} else {
		$return = "<a href='$url' rel='external nofollow' class='url'>$author</a>";
	}
	return $return;
}


function jqcl_comment_link($comment) {
	preg_match_all('#<a .*?href=([\"\'])(https?:\/\/\S*?)\\1.*?>.*?<\/a>#im', $comment, $array);
	for ($i = 0; $i<count($array[0]); $i++) {
		$quote = $array[1][$i];
		$link = $array[2][$i];
		$link = str_replace('http://', '', $link);
		if (!preg_match('#'.get_option('home').'#im', $array[2][$i])) {
			$comment = str_replace($quote.$array[2][$i].$quote, '"#" class="jqcl" title="'.$link.'"', $comment);
		}
	}
	return $comment;
}


if ($jquery_comment_author_link || $jquery_comment_links) {
	add_action('wp_head', 'jqcl_jquery', 1);
	add_action('comment_form', 'jquery_comment_links');
}
if (substr($_SERVER["REQUEST_URI"],0,10) != "/wp-admin/") {
	if ($jquery_comment_author_link) {
		add_filter('get_comment_author_link', 'jqcl_author_link', 10000);
	}
	if ($jquery_comment_links) {
		add_filter('comment_text', 'jqcl_comment_link', 10000);
	}
}

?>