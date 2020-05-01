<?php
  global $wp_query;

  define('WP_USE_THEMES', false);
  require( 'wp/wp-blog-header.php' );
  //include( "bd.php" );
  include( "fn-wp.php" );
  //include( "dataxls.php" );
  $post_fragancia = obtenerPostFijadoPorCategoria( 2 );
  $post_maquillaje = obtenerPostFijadoPorCategoria( 3 );
  $post_skincare = obtenerPostFijadoPorCategoria( 4 );
  $post_fashion = obtenerPostFijadoPorCategoria( 5 );

  print_r( $post_fashion );
  
?>


