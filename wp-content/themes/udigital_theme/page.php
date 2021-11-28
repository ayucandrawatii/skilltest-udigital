<?php get_header() ?>
<section class="page-content glitter">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<?php 
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>
			</div>
		</div>
		<div class="row justify-content-center content-section">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile;
			?>
		</div>
	</div>
</section>
<?php get_footer(); 
