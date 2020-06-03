<?php

  /* -- Funciones sobre administrador de WP -- */
  /* ---------------------------------------------------------------------------- */
  function obtenerRegistrosPost( $query, $param ){
    // Devuelve un arreglo con los registros de los posts según el query recibido
    $post = array();
    
    if ( $query->have_posts() ) {

      while ( $query->have_posts() ) { 
        $query->the_post();
        $id = get_the_ID();
        $image_id = get_post_thumbnail_id();
        $image_attributes = wp_get_attachment_image_src( $image_id, 'full' );
        $data_cat = get_the_terms( $id, 'category' );

        $post["id"] = $id;
        $post["categoria"] = $data_cat[0]->name; 
        $post["autor"] = get_the_author();       
        $post["titulo"] = get_the_title();
        $post["fecha1"] = get_the_date('l j F, Y');
        $post["fecha2"] = get_the_date('j / M / y');
        $post["fecha3"] = get_the_date('d/m/y h:i A');
        $post["extracto"] = get_the_excerpt( $id );
        $post["contenido"] = strip_tags( wp_filter_nohtml_kses( get_the_content( $id ) ) );
        $post["img"] = $image_attributes;
        
        $array_p[] = $post;
      }
      wp_reset_postdata();

    }

    if( $param == "vector" ) $registros = $array_p;
    else $registros = $post;

    return $registros;
  }
  /* ---------------------------------------------------------------------------- */
  function obtenerDescripcionCategoriaPorId( $ctg ){
    // Devuelve la descripción de una categoría dado su id
    
    return category_description( $ctg );
  }
  /* ---------------------------------------------------------------------------- */
  function obtenerPostFijadoPorCategoria( $ctg ){
    // Registro de artículo destacado, página de inicio

    $args = array(
      'post_type'         => 'post',
      'posts_per_page'    => 1,
      'post__in'          => get_option( 'sticky_posts' ),
      'paged'             => 1,
      'cat'               => $ctg
    ); 
    $query = new WP_Query( $args );

    return obtenerRegistrosPost( $query, "" );
    
  }
  /* ---------------------------------------------------------------------------- */
  function obtenerPostsPorCategoria( $ctg ){
    // Listado de posts por categoría paginables

    $id_cat_excluida = array(); 

    $pag = (get_query_var('paged')) ? get_query_var('paged') : 1; 

    if( isset( $_GET["cat"] ) ) $idcln = $_GET["cat"];
    if( isset( $_GET["busqueda"] ) ) $keyw = $_GET["busqueda"];
    
    $args = array(
      'post_type'         => 'post',
      'posts_per_page'    => 8,
      'paged'             => $pag,
      'cat'               => $ctg
    );

    return new WP_Query( $args );
  }  
  /* ---------------------------------------------------------------------------- */
  function obtenerPostsInicio(){
    // Devuelve los posts a mostrarse en la página de inicio
    $posts = array();

    $categorias = [2,3,4,5,7];
    //2: Fragancia, 3: Maquillaje, 4: Skincare, 5: Fashion, 7: Joyería

    foreach ( $categorias as $c ) {
      if ( obtenerDescripcionCategoriaPorId( $c ) == "" ){
       
        $posts[] = obtenerPostFijadoPorCategoria( $c );
      }
    }

    return $posts;
  }
  /* ---------------------------------------------------------------------------- */
  function paginacionWP( $ctg, $wp_query ){

    $big = 999999999;
    echo paginate_links( array(
      'base' => 'https://pr.cupfsa.com/category_posts.php?%_%',
      'format' => '?categ=$ctg&paged=%#%&',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages
    ) );
  }
  /* ---------------------------------------------------------------------------- */
?>
