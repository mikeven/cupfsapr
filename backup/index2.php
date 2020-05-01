<?php
  global $wp_query;

  define('WP_USE_THEMES', false);
  require( 'wp/wp-blog-header.php' );
  include( "fn-wp.php" );
  
  $post_fragancia = obtenerPostFijadoPorCategoria( 2 );
  $post_maquillaje = obtenerPostFijadoPorCategoria( 3 );
  $post_skincare = obtenerPostFijadoPorCategoria( 4 );
  $post_fashion = obtenerPostFijadoPorCategoria( 5 );
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" />
<title>PR</title>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="menu.css" />
<link rel="stylesheet" type="text/css" href="css/marley.css" />

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

    .hidden{ display: none; }

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
    }

    .frame-post{
        width: 100%;
        height: 550px;
        border:1px solid #ccc;
        background-size: cover;
        background-position: center center;
    }

    .tit_post{
        color: #FFF;
        font-size: 14px;
        background: rgba(0, 0, 0, 0.25);
    }

    .post-intro{
        padding: 5px 15px !important;
        color: #f3f3f3;
        font-size: 11px;
        font-weight: lighter;
        background: rgba(0, 0, 0, 0.25);
    }

    .post-frgn{
        background-image: url('<?php echo $post_fragancia[img][0]?>');
    }
    .post-mkup{
        background-image: url('<?php echo $post_maquillaje[img][0]?>');
    }
    .post-sknc{
        background-image: url('<?php echo $post_skincare[img][0]?>');
    }
    .post-fshn{
        background-image: url('<?php echo $post_fashion[img][0]?>');
    }
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
                <a href="index.php"><li><i class="far fa-dot-circle"></i> Fragrancias</li></a>
                <a href="inventario.php"><li><i class="far fa-dot-circle"></i> Maquillaje</li></a>
                <a href="xsesion.php"><li><i class="far fa-dot-circle"></i> Skincare</li></a>
                <a href="xsesion.php"><li><i class="far fa-dot-circle"></i> Fashion</li></a>
            </ul>
          </div>
        </nav>
    </div>
    <div style="text-align:center; margin-top: 5px;"><img src="images/logo.png" width="170" /></div>
</div>
<!--Cierro el header-->

<div class="container" style="padding-top: 95px;">

    <div style="text-align: justify;margin-bottom: 30px;margin-top: 20px;">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>

    <div class="row">
        <div class="col-sm-6 col">
            <figure class="effect-marley">
                <div class="frame-post post-frgn">
                    <figcaption>
                        <h2 class="tit_post"><?php echo $post_fragancia["titulo"] ?></h2>
                        <p class="post-intro"><?php echo $post_fragancia["contenido"] ?></p>
                        <a href="#"></a>
                    </figcaption>
                </div>
            </figure>
                
        </div>
        <div class="col-sm-6 col">
            <div class="frame-post post-mkup">
                <div class="cuadroTexto" style="display:table"><span><?php echo $post_maquillaje["titulo"] ?></span></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col">
            <div class="frame-post post-sknc">
                <div class="cuadroTexto" style="display:table"><span><?php echo $post_skincare["titulo"] ?></span></div>
            </div>
        </div>
        <div class="col-sm-6 col">
            <div class="frame-post post-fshn">
                <div class="cuadroTexto" style="display:table"><span><?php echo $post_fashion["titulo"] ?></span></div>
            </div>
        </div>
    </div>

	<div style="margin-top: 20px;background-color:#000; width: 100%;height: 5px;"></div>
    
    <div id="email" style="margin-top:30px; margin-bottom:30px; text-align: center;">
    <div style="font-size: 20px;margin-bottom: 20px;">¿Deseas hacernos alguna pregunta o comentario?</div>
    <form>
        <input name="Nombre" type="text" maxlength="30" placeholder="Nombre" /><br /><br />
        <input name="Email" type="text" maxlength="30" placeholder="Email" /><br /><br />
        <textarea name="Comentario" placeholder="Preguntas o comentarios"></textarea><br /><br />
        <div class="boton">enviar</div>
    </form>
	</div>

</div> <!--Cierro container-->


  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>
