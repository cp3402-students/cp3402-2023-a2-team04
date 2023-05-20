<?php
/**
 * The template for displaying all single pages for an event
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Heartland_Hits
 *
 * single-event.php works in conjunction with an advanced custom fields plugin, required custom fields are: event_date,
 * event_time, event_venue, event_details, performer_name and performer_time. Performer name and time can be used as a
 * list of multiple inputs, if the chosen advanced field plugin allows.
 *
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div><!-- .entry-thumbnail -->
                        <?php endif; ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <h2>Event Details:</h2>
                        <ul>
                            <li><strong>Date:</strong> <?php echo date('F j, Y', strtotime(get_post_meta(get_the_ID(), 'event_date', true))); ?>
                            </li>
                            <li><strong>Time:</strong> <?php echo date('h:i a', strtotime(get_post_meta(get_the_ID(), 'event_time', true))); ?>
                            </li>
                            <li><strong>Venue:</strong> <?php echo get_post_meta(get_the_ID(), 'event_venue', true); ?>
                            </li>
                            <li><strong>Details:</strong> <?php echo get_post_meta(get_the_ID(), 'event_details', true); ?>
                            </li>
                            <?php if (get_post_meta(get_the_ID(), 'event_lineup', true)) : ?>
                                <li><strong>Performers:</strong></li>
                                <ul>
                                    <?php
                                    $lineup = get_post_meta(get_the_ID(), 'event_lineup', true);
                                    foreach ($lineup as $performer) {
                                        echo '<li>' . $performer['performer_name'] . ' - ' . $performer['performer_time'] . '</li>';
                                    }
                                    ?>
                                </ul>
                            <?php endif; ?>
                        </ul>
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>