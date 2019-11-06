			<footer class="footer-container" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div class="footer">

				<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>

				<?php dynamic_sidebar( 'sidebar-3' ); ?>

				<?php else : ?>

				<?php
					/*
					* This content shows up if there are no widgets defined in the backend.
					*/
					endif;
				?>
				</div>

				<div class="copy-right-section">
					<p><small>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</small>
					<small>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></small></p>
				</div>
				
			</footer>
			
		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
