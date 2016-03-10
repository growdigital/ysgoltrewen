<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package ysgoltrewen
 */
?>
		</div><!-- /site-content -->
		<footer role="contentinfo">
			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
			<p>The <a href="https://github.com/growdigital/ysgoltrewen">ysgoltrewen theme</a> is licensed under the <a href="http://www.gnu.org/licenses/gpl-3.0.html">GPL v3</a> license, the <a href="https://github.com/growdigital/ysgoltrewen/blob/master/dist/assets/img/logo.png">ysgoltrewen logo</a> is copyright &copy; Grow Digital Ltd 2015. The content of this site is licensed under a <a href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.
			<ul>
				<li>
					<a href="https://github.com/growdigital/ysgoltrewen">
						<svg class="icon" viewBox="0 0 16 16">
					    <use xlink:href="#github"></use>
					  </svg>
				    <span class="icon-hiddenvisually">GitHub</span>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/wp_ysgoltrewen">
						<svg class="icon" viewBox="0 0 16 16">
					    <use xlink:href="#twitter"></use>
					  </svg>
				    <span class="icon-hiddenvisually">Twitter</span>
					</a>
				</li>
			</ul>
		</footer>
		<script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/app.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>
