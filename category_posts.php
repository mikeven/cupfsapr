<?php
    /*
     *** CUPFSA PR *** 
     ** Página de posts por categoría **
    */
  global $wp_query;

  define('WP_USE_THEMES', false);
  require( 'wp/wp-blog-header.php' );
  include( "fn-wp.php" );

  if( isset( $_GET["categ"] ) ){

    $ctg = $_GET["categ"];
    $category = get_cat_name( $ctg );
    $category_posts = obtenerPostsPorCategoria( $ctg );

  } else {

  }
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" />
<title>PR</title>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/prscript.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />-->


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="menu.css" />
<link href="css/all.css" rel="stylesheet">
<style>
    @font-face {
    font-family: 'chanel';
    src: url('font/ABChanel-PB-Regular-L.eot'); /* IE9 Compat Modes */
    src: url('font/ABChanel-PB-Regular-L.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
           url('font/ABChanel-PB-Regular-L.woff') format('woff'), /* Pretty Modern Browsers */
           url('font/ABChanel-PB-Regular-L.ttf')  format('truetype'); /* Safari, Android, iOS */
    }
    @font-face {
    font-family: futura;
    src: url(font/FuturaPTBook.otf);
    }

    body {
    color:#000;
    font-family: 'chanel', Arial;
    margin:0px;
    }

    a {
       color:inherit;
       text-decoration: none;
    }
    a:hover {
        color: #ccc;
    }

    .boton {
    	display: inline-block;
        width: 160px;
    	height: 40px;
        line-height: 40px;
    	background-color:#000;
    	color:#fff;
    	cursor:pointer;
    	-webkit-transition: all 0.1s linear;
    	-moz-transition: all 0.1s linear;
    	-o-transition: all 0.1s linear;
    	text-align:center;
    	font-size:14px;
    	font-weight:bold;
    }

    .boton:hover { background: #080808eb; }

    #header {
    	width: 100%;
    	height: 95px;
    	position:fixed;
    	z-index:100;
    	background-color:#FFF;
    }
    #header a {
        text-decoration: none;
    }
    #hamburguesa {
    	padding-left: 10px;	
    	font-family: 'futura', Arial;
    	font-size: 18px;
    }
    #lineaNegra {
    	background-color:#000;
    	width: 100%;
    	height: 10px;
    }

    input, textarea {
        width: 400px;
        height: 30px;
        background-color: #fff;
        padding: 3px 3px;
        box-sizing: border-box;
        border: 1px solid black;
        font-size: 12px;
    }

    textarea {
    	height: 100px;
    }

    .col {
    	padding-right: 10px;
        padding-left: 10px;
        padding-bottom: 20px;	
    }
    .cuadroTexto {
    	position: absolute;
    	left: 58px;
        bottom: 100px;
        background: rgba(0, 0, 0, 0.25);
        color: #fff;
        height: 100px;
        width: 80%;
    	text-align: center;	
    	display: table;
    	padding:2px;
    	

    }
    .cuadroTexto span {
    	vertical-align: middle;
    	display: table-cell;
    	font-size: 14px;
    }

    @media only screen and (max-width: 992px) {

    	.cuadroTexto {
    		left: 36px;
    		bottom: 35px;
    		width: 81%;

    	}
    }

    @media (max-width: 768px) {
    	.cuadroTexto {
    		left: 25px;
    		bottom: 35px;
    		width: 81%;
    	}

    }

    @media (max-width: 576px) {
    	.cuadroTexto span {
    		font-size: 12px;
    	}
    	input, textarea {
       		width: 100%;
    	}
        .tit_categ{ text-align: center; }
    }

    @media only screen and (max-width: 991px) {
        /* Vista Móvil */
        .img_post{ 
            width: 150px;
            height: 150px;
            margin: 0 auto;
            background-size: cover;
            background-position: center center;
        }
        .desc_post{
            margin-top: 2%;
            text-align: center;
        }
        #paginacion{ margin: 8% 0; }
        .page-numbers{ padding: 1px 8px; }
    }

    @media only screen and (min-width: 992px) {

        .img_post{ 
            float: left; 
            width: 80px;
            height: 80px;
            background-size: cover;
            background-position: center center;
        }
        .desc_post{
            margin-left: 2%;
            float: left; 
        }

        #paginacion{ margin: 4% 0; }
        .page-numbers{ padding: 1px 12px; }
    }

    .intro_prg{
        text-align: justify;
        margin: 20px 0 30px 0;
    }

    .elementpost{
        padding: 20px 0;
    }
    
    .date_post{
        color: #333;
        font-size: 12px;
    }
    .tit_post{
        color: #000;
        font-size: 16px;
    }
    .excerpt_post{
        color: #666;
        font-size: 14px;
    }

    #lnk_home { float: left; margin-top: -25px; }
    #lnk_home a{ font-size: 14px; color: #666; }
    #lnk_home a:hover{ color: #000; }
</style>

</head>

<body>

<div id="header">
    <div id="lineaNegra"></div>
    <div id="hamburguesa">
        <nav role="navigation">
          <div id="menuToggle">
            <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
            
            <ul id="menu">
                <div style="margin-bottom: 10px;">Ver posts anteriores:</div>
                <a href="category_posts.php?categ=2"><li><i class="far fa-dot-circle"></i> Fragrancias</li></a>
                <a href="category_posts.php?categ=3"><li><i class="far fa-dot-circle"></i> Maquillaje</li></a>
                <a href="category_posts.php?categ=4"><li><i class="far fa-dot-circle"></i> Skincare</li></a>
                <a href="category_posts.php?categ=5"><li><i class="far fa-dot-circle"></i> Fashion</li></a>
            </ul>
          </div>
        </nav>
    </div>
    <div style="text-align:center; margin-top: 5px;"><img src="images/logo.png" width="170" /></div>
</div>
<!--Cierro el header-->

<div class="container" style="padding-top: 95px;">
    <div class="intro_prg">
        <h3 class="tit_categ"> <?php echo $category ?> </h3>
    </div>
    <div class="row">
        <div class="">
        
        </div>
    	
        <div id="lst_post_dsk" class="col-sm-12 col-xs-12">
            <div class="lista-noticias">

                <?php 
                  $ln_query = $category_posts;

                  if ( $ln_query->have_posts() ) {

                    while ( $ln_query->have_posts() ) { 
                        $ln_query->the_post();
                        $id_p       = get_the_ID();
                        $lnk_post   = strip_tags( wp_filter_nohtml_kses( get_the_content( $id_p ) ) );
                        $image      = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                ?>
                    <div class="elementpost">
                        <div class="img_post" 
                            style="background-image: url('<?php echo $image[0]; ?>');">
                        </div>
                        <div class="desc_post">
                            <div class="date_post"><?php echo get_the_date('l j F, Y'); ?></div>
                            <a href="<?php echo $lnk_post;?>" target="_blank">
                              <div class="tit_post"><?php echo get_the_title(); ?></div>
                            </a>
                            <div class="excerpt_post"><?php echo get_the_excerpt(); ?></div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                <?php 
                    } 
                  }
                ?>

              </div>     
        </div>

        <div class="">
    	</div>
    </div>
    <hr>
    <div id="paginacion">
        <?php paginacionWP( $ctg, $ln_query ); ?>
    </div>

    <div id="lnk_home">
        <a href="https://pr.cupfsa.com/"><i class="fas fa-caret-left"></i> Volver</a>
    </div>

	<div style="margin-top: 20px;background-color:#000; width: 100%;height: 5px;"></div>
    
    <?php include("form.php"); ?>

</div> <!--Cierro container-->
  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js" 
    type="text/javascript"></script>

</body>
</html>
