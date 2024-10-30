=== jQuery Comment Links ===
Contributors: Dimox
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=H7X3M4JL8N7Q4
Tags: jQuery, comment, comments, links
Requires at least: 2.5
Tested up to:
Stable tag: 0.1.1

Plugin replaces comment author link and (or) links in comment text on jQuery links.

== Description ==

Plugin replaces comment author link and (or) links in comment text on jQuery links that will work (i.e. it will be possible to go on the specified site through these links) only in case when the JavaScript technology is enabled in a browser of the visitor of your site.

When can this plugin might be useful:

* If you want to reduce the number of external links on your site (for example, for any SEO reasons).
* If you don't want to refer to bad sites and you don't have time and desire to check the links, which are left by the authors of comments.

Here is how it looks. For example, there is such a link on the name of comment author:

`<a href='http://sitename.com' rel='external nofollow' class='url'>Comment Author Name</a>`

After plugin activation this link will turn to the such:

`<a href="#" class="jqcl" title="sitename.com" rel="nofollow">Comment Author Name</a>`

This is jQuery link, that will work only if JavaScript technology is enabled in a browser of the visitor of your site.

Links to your site will not be replaced.

== Installation ==

Installation is simple:

1. Upload `jquery-comment-links` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. If it is necessary, you should customize 2 options at the top of `jquery-comment-links.php` file.
4. That's all.