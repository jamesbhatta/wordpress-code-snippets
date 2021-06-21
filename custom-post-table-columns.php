<?php
// Change the columns for the releases list screen
function change_columns( $cols ) {
  $cols = array(
  'cb'         => '<input type="checkbox" />',
  'featimg'    => 'Featured Image',
  'excerpt'    => 'Excerpt?',
  'title'      => 'Title',
  'artist'     => 'Artist',
  'catno'      => 'Cat#',
  'categories' => 'Category',
  'tags'       => 'Tags',
  'date'       => 'Release Date'
  );
  return $cols;
}
function custom_columns( $column ) {
global $post;
	if( $column == 'featimg' ) {
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'thumbnail' );
        } else {
            echo '-';
        }
	}
	if( $column == 'excerpt' ) {
		if ( has_excerpt() ) {
    		echo '&check;';
		} else {
    		echo '-';
		}
	}
	if( $column == 'artist' ) {
	    $artist = get_field('artist');
	    if( $artist ) {
	        echo $artist;
		} else {
			echo '-';
		}
	}
	if( $column == 'catno' ) {
		$catno = get_field('cat_number');
		if( $catno ) {
			echo $catno;
		} else {
			echo '-';
		}
	}
}
add_action( "manage_releases_posts_custom_column", "custom_columns", 10, 2 );
add_filter( "manage_releases_posts_columns", "change_columns" );
