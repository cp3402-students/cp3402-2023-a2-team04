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

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        <div class="entry-meta">
                            <?php heartland_hits_posted_on(); ?>
                        </div><!-- .entry-meta -->
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <?php heartland_hits_entry_footer(); ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-## -->

            <?php endwhile; // End of the loop. ?>

            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'newsletter',
            );
            $query = new WP_Query($args);
            $year = '';
            ?>

            <?php if ($query->have_posts()) : ?>

                <h2><?php esc_html_e('Archive', 'heartland-hits'); ?></h2>

                <ul class="newsletter-list">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>

                        <?php
                        $post_year = get_the_date('Y');
                        if ($post_year !== $year) :
                            $year = $post_year;
                            ?>
                            <h3><?php echo esc_html($year); ?></h3>
                        <?php endif; ?>

                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <span class="date"><?php echo get_the_date(); ?></span>
                        </li>

                    <?php endwhile; ?>
                </ul>

            <?php endif;
            wp_reset_postdata(); ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
