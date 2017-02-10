<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
    <div class="not_found_page">
        <div class="container">
            <h2>404</h2>
            <h3>OOPS! PAGE NOT FOUND</h3>
            <p>Sorry, but the page you are looking for is not found. Please, make sure you have typed the right URL.</p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home Page</a>
        </div>
    </div>
    <!---<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><? //php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h1>
				</header>

				<div class="page-content">
					<p><? //php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ); ?></p>

					<?php //get_search_form(); ?>
				</div>
			</section>

		</main>

		<?php //get_sidebar( 'content-bottom' ); ?>

	</div>-->

    <? //php get_sidebar(); ?>
        <?php get_footer(); ?>