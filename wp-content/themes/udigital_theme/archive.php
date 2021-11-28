<?php get_header() ?>
<section class="page-content glitter">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<?php
				if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/archive', 'post' );

					endwhile;
					?>

					<div class="pagination" role="navigation">
						<div class="nav-links">
							<?php
								echo paginate_links( array(
									'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i><span class="sr-only">' . __( 'Previous page', 'udigital' ) . '</span>',
									'next_text' => '<span class="sr-only">' . __( 'Next page', 'udigital' ) . '</span><i class="fa fa-chevron-right" aria-hidden="true"></i>',
									'before_page_number' => '<span class="meta-nav sr-only">' . __( 'Page', 'udigital' ) . ' </span>',
									'type' => 'list'
								) );
							?>
						</div>
					</div>

				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); 