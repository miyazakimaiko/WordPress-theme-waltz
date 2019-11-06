<?php get_header(); ?>

	<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

		<div class="flex-row flex-row-narrow">

			<article id="post-not-found">

				<header class="article-header">

					<h1><?php _e( 'Epic 404 - Article Not Found', 'bonestheme' ); ?></h1>

				</header>

				<section class="entry-content">

					<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>

				</section>


			</article>

			<?php get_sidebar(); ?>

		</div>

	</main>

<?php get_footer(); ?>
