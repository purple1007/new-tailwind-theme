<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my-blog
 */

if ( ! is_activemy-blogidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamicmy-blogidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
