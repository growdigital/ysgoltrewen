<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package ysgoltrewen
 */
?>
		</div><!-- /site-content -->
		<footer class="footer" role="contentinfo">
			<ul class="footer__contact">
				<li><?php _e( 'Address', 'ysgoltrewen' ); ?>: <a href="https://www.google.co.uk/maps/place/Cwm-cou,+Newcastle+Emlyn,+Ceredigion+SA38+9PE/@52.0488836,-4.4758037,14z/data=!4m2!3m1!1s0x486f2387f43fcef3:0x53ddfea870a93e59">Cwm Cou, <?php _e( 'Newcastle Emlyn', 'ysgoltrewen' ); ?> SA38 9PE</a></li>
				<li><?php _e( 'Tel', 'ysgoltrewen' ); ?>: <a href="tel:<?php echo the_field('tel_no', 'option') ?>"><?php echo the_field('tel_display', 'option') ?></a></li>
				<li><?php _e( 'Email', 'ysgoltrewen' ); ?>: <a href="mailto:<?php echo the_field('email', 'option') ?>"><?php echo the_field('email', 'option') ?></a></li>
				<li>Twitter: <a href="https://twitter.com/<?php echo the_field('twitter', 'option') ?>">@<?php echo the_field('twitter', 'option') ?></a></li>
			</ul>
			<div class="footer__credit">
				<small><?php echo the_field('footer', 'option') ?></small>
			</div>
		</footer>
		<script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/app.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>
