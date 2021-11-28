<div class="post-wrap mb-4">
	<h3 class="icon-title text-center"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
	<div class="row">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="col-sm-6 col-lg-4">
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        <div class="img-container">
		        	<?php the_post_thumbnail('home-thumbnail'); ?>
		        </div>
		    </a>
		</div>
		<?php else: ?>
			<div class="col-sm-6 col-lg-4">
			    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			        <div class="img-container">
			        	<img src="<?php echo get_template_directory_uri().'/assets/images/no-thumbnail.png' ?>" alt="">
			        </div>
			    </a>
			</div>
		<?php endif; ?>
		<div class="col-md clearfix">
			<?php the_excerpt(); ?>
			<?php echo sprintf( '<a class="btn btn-primary float-md-right" href="%1$s">%2$s</a>',
		        get_permalink( get_the_ID() ),
		        __( 'Read More', 'udigital' )
		    ); ?>
		</div>
	</div>
</div>