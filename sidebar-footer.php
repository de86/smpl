<?php

/*
** Footer Widgets
*/

if ( ! is_active_sidebar('sidebar-footer-widgets')) {
	return;
}

?>

<div id="supplementary">
	<div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
		<?php dynamic_sidebar('sidebar-footer-widgets'); ?>
	</div><!-- #footer-widgets -->
</div><!-- #supplementary -->