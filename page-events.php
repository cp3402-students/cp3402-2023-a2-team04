<?php
/*
Template Name: Events
*/

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            $upcoming_events = get_upcoming_events();
            $past_events = get_past_events();
            ?>

            <div class="upcoming-events">
                <h2>Upcoming Events</h2>
                <?php if ($upcoming_events->have_posts()) : ?>
                    <ul>
                        <?php while ($upcoming_events->have_posts()) : $upcoming_events->the_post(); ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <li>
                                <?php echo date('F j, Y', strtotime(get_post_meta(get_the_ID(), 'event_date', true))); ?>
<!--                                --><?php //echo get_post_meta(get_the_ID(), 'event_date', true); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <p>No upcoming events.</p>
                <?php endif; ?>
            </div>

            <?php wp_reset_postdata(); ?>

            <div class="past-events">
                <h2>Past Events</h2>
                <?php if ($past_events->have_posts()) : ?>
                    <?php while ($past_events->have_posts()) : $past_events->the_post(); ?>
                        <h3><?php the_title(); ?></h3>
                        <ul>
                            <li>
<!--                                --><?php //echo get_post_meta(get_the_ID(), 'event_date', true); ?>
                                <?php echo date('F j, Y', strtotime(get_post_meta(get_the_ID(), 'event_date', true))); ?>
                            </li>
                            <li>
                                <?php echo get_post_meta(get_the_ID(), 'event_venue', true); ?>
                            </li>
                        </ul>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

<!--                TODO: Use Javascript to make this work, update code above so only 1 shows and rest are hidden-->
<!--                    <div class="expand-past-events">-->
<!--                        <a href="#" class="button">Show More</a>-->
<!--                    </div>-->

                <?php else : ?>
                    <p>No past events.</p>
                <?php endif; ?>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>