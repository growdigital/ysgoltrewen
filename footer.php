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
					<a href="https://twitter.com/ygtrewen">
						<svg aria-hidden="true" class="icon icon--twitter" width="16" height="13" role="img" version="1.1" viewBox="0 0 16 13">
						    <path d="M16 1.54c-.588.26-1.22.436-1.885.516A3.293 3.293 0 0 0 15.558.24a6.564 6.564 0 0 1-2.085.796A3.282 3.282 0 0 0 7.88 4.03 9.32 9.32 0 0 1 1.115.6 3.28 3.28 0 0 0 2.13 4.983a3.267 3.267 0 0 1-1.487-.41v.04a3.285 3.285 0 0 0 2.632 3.22 3.284 3.284 0 0 1-1.482.055 3.286 3.286 0 0 0 3.067 2.28A6.59 6.59 0 0 1 0 11.527 9.294 9.294 0 0 0 5.032 13c6.038 0 9.34-5 9.34-9.338 0-.143-.004-.284-.01-.425A6.684 6.684 0 0 0 16 1.537"></path>
						</svg>
						<span>Twitter</span>
					</a>
				</li>
			</ul>
		</footer>
		<script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/app.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>
