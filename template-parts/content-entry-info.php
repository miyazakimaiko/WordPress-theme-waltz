<div class="contents-info byline entry-meta vcard">
	<?php printf( __( '', 'bonestheme' ).' %1$s %2$s',
		/* the time the post was published */
		'<p><i class="far fa-clock"></i><time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time></p>',
		/* the author of the post */
		'<p>'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span></p>'
	); ?>
</div>