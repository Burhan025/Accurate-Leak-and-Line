<?php
/*
Template Name: Franchise Page
Template Post Type: page
*/


 get_header(); ?>

<div class="fl-content-full container">
	<div class="row">
		<div class="fl-content col-md-12">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'content', 'page' );
				endwhile;
			endif;
			?>
		</div>
	</div>
</div>

<script type="text/javascript">
	Cookies.set('franchise_id', <?php echo idLocation(); ?>);
</script>

<?php get_footer(); ?>

