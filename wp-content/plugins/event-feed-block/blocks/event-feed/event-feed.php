<?php
global $post;

// Set up events query args
$args = array(
    'posts_per_page'   => 10,
    'post_status' => 'publish',
    'post_type' => 'event',
    'orderby' => 'menu_order',
);
// Call to events query
$events = new WP_Query($args);
?>

<!-- Events Query Loop -->
<?php if ($events->have_posts()) : ?>
    <section class="events-feed alignwide">
        <div class="events-feed__inner">
            <?php while ($events->have_posts()) : $events->the_post();?>
                <?php setup_postdata( $post ); ?>
                <div class="event">
                    <h1 class="event__title"><?php the_title(); ?></h1>
                    <div class="event__meta">
                        <date class="event__date"><?php the_field('event_date', $post->ID); ?></date>
                        <span>&#8226;</span>
                        <p class="event__category"><?php echo get_the_term_list($post->ID, 'event_category'); ?></p>
                    </div>
                    <div class="event__excerpt"><?php the_excerpt(); ?></div>
                    <a class="event__link" href="<?php the_permalink(); ?>">View Event Details</a>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button view-all-events" href="/events/">View All Events</a></div>
        </div>
    </section>
<?php else : ?>
    <?php _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>