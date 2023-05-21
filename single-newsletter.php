<?php
/**
 * The template for displaying all single posts with the category newsletter
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Heartland_Hits
 */

get_header();
?>

<?php if (in_category('newsletter')) : // Check if the post belongs to the "newsletter" category ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <header class="entry-header">

                        <?php
                        // Get the current post date
                        $current_date = get_the_date('Y-m-d');
                        // Get the previous month's date
                        $previous_month_date = date('Y-m-d', strtotime('-1 month', strtotime($current_date)));
                        // Get the next month's date
                        $next_month_date = date('Y-m-d', strtotime('+1 month', strtotime($current_date)));
                        ?>
                        <div class="prev-next-links">
                            <div class="prev-link">
                                <?php
                                // Generate the links to the previous and next month's newsletters
                                $previous_month_link = get_month_link(date('Y', strtotime($previous_month_date)), date('m', strtotime($previous_month_date)));
                                ?>
                            </div>
                            <div class="next-link">
                                <?php
                                $next_month_link = get_month_link(date('Y', strtotime($next_month_date)), date('m', strtotime($next_month_date)));
                                ?>
                            </div>
                        </div>

                        <?php if ($previous_month_link) : ?>
                            <a href="<?php echo $previous_month_link; ?>">Previous Month</a>
                        <?php endif; ?>
                        <?php if ($next_month_link) : ?>
                            <a href="<?php echo $next_month_link; ?>">Next Month</a>
                        <?php endif; ?>

                        <!-- Date-->
                        <div id="newsletter-month" class="entry-meta newsletter-month">
<!--                            <h2>--><?php //heartland_hits_month_year_posted_on(); ?><!--</h2>-->
                            <h2><?php heartland_hits_original_date_posted_on(); ?></h2>
<!--                            <p>--><?php //heartland_hits_modified_date_posted_on(); ?><!--</p>-->
                        </div><!-- .entry-meta -->
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                        <!-- Display Feature Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div><!-- .entry-thumbnail -->
                        <?php endif; ?>

                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php else : // Fallback content ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <p>This post is not available.</p>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php endif; ?>

<?php
get_footer();
