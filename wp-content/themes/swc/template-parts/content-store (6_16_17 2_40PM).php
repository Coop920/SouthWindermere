<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
				if ( is_single() ) {
					twentyseventeen_posted_on();
				} else {
					echo twentyseventeen_time_link();
					twentyseventeen_edit_link();
				};
			echo '</div><!-- .entry-meta -->';
		};

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		
		<?php
			$logo = get_field('logo');
			$phone = get_field('phone_number');
			$email = get_field('business_email');
			$website = get_field('website');
			$directions = get_field('directions');
			$address = get_field('address');
			$hours = get_field('hours_of_operation');
			$social = get_field('social_media');
			$gallery = get_field('gallery');
		?>
		
		<!-- Custom Field Content -->
		<img src="<?php echo $logo; ?>">
		<p>Phone: <?php echo $phone; ?></p>
		<p>Email: <?php echo $email; ?></p>
		<p>Website: <?php echo $website; ?></p>
		<p><a href="<?php echo $directions; ?>">Directions</a></p>
		<p><?php echo $address; ?></p>
		
		<!--           HOURS           -->
		<?php if( have_rows('hours_of_operation') ): ?>
			<?php while( have_rows('hours_of_operation') ): the_row(); 
				// vars
				$day = get_sub_field('day');
				$opening = get_sub_field('opening');
				$closing = get_sub_field('closing');
			?>
		    <p>Open <?php echo $day; ?> from <?php echo $opening; ?> to <?php echo $closing; ?></p>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- hours -->
		
		<!--           SOCIAL           -->
		<?php if( have_rows('social_media') ): ?>
			<?php while( have_rows('social_media') ): the_row(); 
				// vars
				$facebook = get_sub_field('facebook_url');
				$twitter = get_sub_field('twitter_url');
				$instagram = get_sub_field('instagram_url');
				$youtube = get_sub_field('youtube_url');				
			?>
			<div>
			    <a href="<?php echo $facebook; ?>">facebook</a>
			    <a href="<?php echo $twitter; ?>">Twitter</a>
			    <a href="<?php echo $instagram; ?>">Instagram</a>
			    <a href="<?php echo $youtube; ?>">YouTube</a>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- social -->
		
<!-- PROMOTIONS -->
<?php 
	$promotions = get_field('promotions');

	if( $promotions ): ?>
		<div>
			<ul>
			<?php foreach( $promotions as $promotion ): ?>
		    	<a href="<?php echo get_permalink( $promotion->ID ); ?>"><?php echo get_the_title( $promotion->ID ); ?></a>
			<?php endforeach; ?>
			</ul>
		</div>
<?php endif; ?>
<!-- promotions -->
		
		
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			get_the_title()
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		twentyseventeen_entry_footer();
	}
	?>

</article><!-- #post-## -->
