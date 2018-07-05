<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bible
 */

?>

<?php
$user = wp_get_current_user();

if (in_category('premium')
    && !in_array( 'administrator', (array) $user->roles )
    && !in_array( 'editor', (array) $user->roles )
    && !in_array( 'premium_user', (array) $user->roles )) { ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <h1 class="entry-title">Для просмотра данной статьи необходимо <a style="text-decoration: underline; color: #5555ff;" href="https://istinniy-put.com/subscription-pay/">приобрести подписку</a></h1>
        </header>
    </article>
    <style>
        #comments,
        #secondary {
            display: none;
        }

        .entry-header {
            margin-top: 200px;
            margin-bottom: 200px;
        }
    </style>
<?php } else { ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;

            /*if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php bible_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php
            endif;*/ ?>
        </header><!-- .entry-header -->
        <?php if(get_field('audio_link')) { ?>
            <div class="audio">
                <script>
                    var a = audiojs;
                    a.events.ready(function () {
                        var a1 = a.createAll();
                    });
                </script>
                <audio src="<?= get_field('audio_link'); ?>"
                       preload="auto"></audio>
            </div>
            <style>
                .audio {
                    margin-bottom: 20px;
                }

                .audio .audiojs {
                    float: none !important;
                }
            </style>
        <?php } ?>

        <div class="entry-content">
            <?php
            the_content(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'bible'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'bible'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php bible_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->
<?php } ?>


