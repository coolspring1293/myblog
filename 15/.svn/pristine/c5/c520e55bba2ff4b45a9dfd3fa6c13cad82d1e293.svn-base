<?php
/**
 * The template for displaying standard post formats.
 * Used for index/archive/search.
 *
 * @package TheFour Lite
 */
?>
<?php get_template_part( 'template-parts/content', 'media' ); ?>

<div class="entry-text">
	<header class="entry-header">
		<div class="entry-meta">
			<?php echo thefour_entry_meta_element( 'published_date' ); ?>
		</div>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
	</header>

	<div class="entry-content clearfix">
		<?php
		$post_format  = get_post_format( get_the_ID() );
		$main_content = apply_filters( 'the_content', get_the_content( sprintf(
			__( 'Continue reading &raquo; %s', 'thefour-lite' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) ) );
		if ( 'audio' == $post_format || 'video' == $post_format )
		{
			$media = get_media_embedded_in_content( $main_content, array( 'audio', 'video', 'object', 'embed', 'iframe' ) );
			if ( ! empty( $media ) )
			{
				foreach ( $media as $embed_html )
				{
					$main_content = str_replace( $embed_html, '', $main_content );
				}
			}
		}
		echo $main_content;
		?>
		<?php wp_link_pages(); ?>
	</div>
</div>
