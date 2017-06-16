<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>		
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
		
		<h2>TEST</h2>
		
		<?php the_content( __( 'Continue reading...', 'foundationpress' ) ); ?>
