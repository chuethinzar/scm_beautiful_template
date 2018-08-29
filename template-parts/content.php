<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package scm_beautiful
 */
?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
      <a href="<?php the_permalink(); ?>" rel="bookmark">
  			<?php
  				if (has_post_thumbnail()):
  					the_post_thumbnail();
  				else :
  					the_dummy_thumbnail();
  				endif;
  			?>
  		</a>
    </div>

    <div class="entry-blocktext"
      <header class="entry-header">
        <h2 class="entry-title">
          <a href="<?php the_permalink();?>" rel="bookmark">
            <?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?>
          </a>
        </h2>
      </header><!-- .entry-header -->

      <div class="entry-summary">
        <?php dynamic_excerpt(); ?>
      </div><!-- .entry-summary -->

      <div class="read-more">
					<a href="<?php the_permalink(); ?>">
            <input class="submit" value="Read More" type="submit">
          </a>
		</div><!-- .read-more -->
    </div>
</article><!-- #post-## -->
