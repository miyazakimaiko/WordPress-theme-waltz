<?php get_header(); ?>

		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<div class="flex-row flex-row-narrow flex-center">

				<?php 
					if (have_posts()) : while (have_posts()) : the_post();
				    $id = get_the_ID();
				?>

				<article id="post-<?php the_ID(); ?>" class="contents-section" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
			
					<?php custom_breadcrumb(); ?>

				<?php
					/*
						* Ah, post formats. Nature's greatest mystery (aside from the sloth).
						*
						* So this function will bring in the needed template file depending on what the post
						* format is. The different post formats are located in the post-formats folder.
						*
						*
						* REMEMBER TO ALWAYS HAVE A DEFAULT ONE NAMED "format.php" FOR POSTS THAT AREN'T
						* A SPECIFIC POST FORMAT.
						*
						* If you want to remove post formats, just delete the post-formats folder and
						* replace the function below with the contents of the "format.php" file.
					*/
					get_template_part( 'post-formats/format', get_post_format() );

					wcr_related_posts(array(
						'limit' => 8
					));
				?>

				</article>

				<?php endwhile; ?>

				<?php else : ?>

					<article class="contents-section">
						<header class="article-header">
							<h1><?php _e( 'お探しの投稿が見つかりませんでした。', 'bonestheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'エラーが起きました。検索の内容をご確認の上、再度検索をお願いいたします。', 'bonestheme' ); ?></p>
						</section>
					</article>

				<?php endif; ?>

			</div>

		</main>

<?php get_footer(); ?>
