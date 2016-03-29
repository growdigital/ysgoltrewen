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
				<li>Address: <a href="https://www.google.co.uk/maps/place/Cwm-cou,+Newcastle+Emlyn,+Ceredigion+SA38+9PE/@52.0488836,-4.4758037,14z/data=!4m2!3m1!1s0x486f2387f43fcef3:0x53ddfea870a93e59">Cwm Cou, SA38 9PE</a></li>
				<li>Tel: <a href="tel:<?php echo the_field('tel_no', 'option') ?>"><?php echo the_field('tel_display', 'option') ?></a></li>
				<li>Email: <a href="mailto:<?php echo the_field('email', 'option') ?>"><?php echo the_field('email', 'option') ?></a></li>
				<li>Twitter: <a href="https://twitter.com/<?php echo the_field('twitter', 'option') ?>">@<?php echo the_field('twitter', 'option') ?></a></li>
			</ul>
			<p>
				<small>Photographs credit Karen Davies © <?php echo date("Y"); ?><br>
			  All content copyright Ysgol Trewen © <?php echo date("Y"); ?></small>
			</p>
		</footer>
		<script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/app.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>
