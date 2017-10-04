<?php
/**
 * Displays the page section of the theme.
 *
 */
?>

<?php get_header(); ?>
	<div class="container-fluid">
			<div class="row-fluid">
                                     <div class="span1">
                                       </div>
					<div class="span10">
					<?php woocommerce_content(); ?>
					</div>
			</div>
    </div>

<?php get_footer(); ?>