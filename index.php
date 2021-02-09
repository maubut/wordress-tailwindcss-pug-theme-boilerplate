
<?php
/* Template Name: Frontpage */
$base = include('inc/theme-data.php');

$data = array_merge( $base, [
	'post' => [
		'title' => get_the_title(),
    'content' => apply_filters( 'the_content', $post->post_content ),
  ],
] );

if ( function_exists ( 'output' ) ) {
  output( basename(__FILE__, '.php') , $data );
}
?>