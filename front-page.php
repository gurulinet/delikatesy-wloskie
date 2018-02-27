<?php get_header(); ?>


    <div id="slider">
        <ul class="bxslider">
			<?php
			$banArgs = array(
				'posts_per_page' => 4,
				'post_type' => 'banery',
				'category_name' => 'banery',
				'orderby' => 'DESC',
			);
			?>
			<?php $banners = new WP_Query($banArgs); ?>
			<?php while ($banners->have_posts()) : ?>
				<?php $banners->the_post(); ?>
                <li><?php the_post_thumbnail('slider'); ?></li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
        </ul>
    </div>

    <section class="ingredients">
        <div class="container">
            <div class="container-grid">
				<?php while (have_posts()): the_post(); ?>
                    <!--REMOVE THIS HARDCODED CSS AFTER-->
                    <div class="columns0" style="border-bottom: 1px solid #eee; padding-bottom: 20px; width:100%">
                        <h3><?php the_field('aboutus'); ?></h3>
						<?php the_field('about_us_text'); ?>
						<?php $url = get_page_by_title('O Nas'); ?>
                        <a href="<?php echo get_permalink($url->ID); ?>"
                           class="button primary"
                           style="color:#000;"><?php _e('Więcej', WTGFunctions::TEXT_DOMAIN) ?></a>
                    </div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <div class="main-content container">
        <main class="container-grid content-text">
            <h2 class="primary-text text-center"><?php _e('Wino', WTGFunctions::TEXT_DOMAIN) ?></h2>
			
			<?php
			$args = [
				'posts_per_page' => 4,
				'post_type' => 'winotoskanii',
				'category_name' => 'wino',
				'orderby' => 'rand'
			];
			?>
			<?php $specialties = new WP_Query($args); ?>
			
			<?php while ($specialties->have_posts()) : ?>
				<?php $specialties->the_post(); ?>

                <div class="speciality columns1-3">
                    <div class="speciality-content">
						<?php the_post_thumbnail('wtg-front') ?>
                        <div class="post-title"><?php the_title('<h2>', '</h2>'); ?></div>
                        <div class="information">
							<?php the_title('<h3>', '</h3>'); ?>
                            <p class="price"><?php _e('PLN') ?>&nbsp;&nbsp;<?php the_field('price'); ?></p>
							<?php echo substr(get_field('description'), 0, 100); ?>
                            <a href="<?php esc_url(the_field('link')); ?>"
                               class="button primary more-delikatesy" style="color:#000;"
                               target="_blank"><?php _e('Czytaj dalej', WTGFunctions::TEXT_DOMAIN) ?></a>
                        </div>
                    </div>
                </div>
			
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
        </main>
    </div>
    <section class="location-reservation clear container" style="border-top: 1px solid #eee; padding-top:25px;">
        <div class="container-grid">
            <h2 class="primary-text text-center"><?php echo 'Odwiedź nas'; ?></h2>
            <div class="columns2-4" style="width:100%">
                <div id="map">
                    Map
                </div>
            </div>
        </div>
    </section>
    <div class="clear"></div>
<?php get_footer(); ?>