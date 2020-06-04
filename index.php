<?php
    /*
     *** CUPFSA PR *** 
     ** Página de inicio **
    */
    global $wp_query;

    define('WP_USE_THEMES', false);
    require( 'wp/wp-blog-header.php' );
    include( "fn-wp.php" );

    $posts = obtenerPostsInicioOrden();
  
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

    .intro_prg{
        text-align: justify;
        margin: 20px 0 30px 0;
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
        .intro_prg{
            font-size: 12px;
        }
        

    }
    
    .alert-info{ color: #FFF; font-size: 12px; background-color: #000; border: 1px solid #999; text-align: center; }
    .alert-info .close{ color: #FFF; }

    .frame-post{
        width: 100%;
        height: 550px;
        border:1px solid #ccc;
        background-size: cover;
        background-position: center center;
    }

    .tit_post{
        color: #fff;
        height: 95px;
        text-align: center;
        padding: 35px !important;
        font-size: 14px;
        background: rgba(0, 0, 0, 0.25);
    }

    .lnk_post{
        font-size: 13px;
        color: #FFF;
    }

    .post-intro{
        padding: 5px 15px !important;
        color: #f3f3f3;
        font-size: 11px;
        font-weight: lighter;
        background: rgba(0, 0, 0, 0.25);
    }

    .post-ctg0{
        background-image: url('<?php echo $posts[0][img][0]?>');
    }
    .post-ctg1{
        background-image: url('<?php echo $posts[1][img][0]?>');
    }
    .post-ctg2{
        background-image: url('<?php echo $posts[2][img][0]?>');
    }
    .post-ctg3{
        background-image: url('<?php echo $posts[3][img][0]?>');
    }
</style>

</head>

<body>

<?php include("menu.php"); ?>

<div class="container" style="padding-top: 95px;">

    <div class="intro_prg" style="">
    ¡Bienvenido! Para empoderarlos a navegar las propuestas editoriales de todas las divisiones de CHANEL, te invitamos a visitar esta dirección cada semana.  Esperamos de esta forma aliviar tu buzón de tantos correos!<br /><br />

Como siempre, nosotras estaremos a su disposición para recibir consultas sobre los temas por e-mail o por aquí mismo en la plataforma.<BR />
Estos son sólo los temas prioritarios pero siempre tenemos muchos más en caso quieran desarrollar alguna historia o un tema especial.
    </div>
    
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <figure class="effect-marley">
                <a href="<?php echo $posts[0][contenido] ?>" target="_blank">
                    <div class="frame-post post-ctg0">
                        <figcaption>
                            <h2 class="tit_post"><?php echo $posts[0]["titulo"] ?></h2>
                            <p class="post-intro"> <?php echo $posts[0]["extracto"] ?> </p>
                        </figcaption>
                    </div>
                </a>
            </figure>
                
        </div>
        <div class="col-sm-6 col-xs-12">
            <figure class="effect-marley">
                <a href="<?php echo $posts[1][contenido] ?>" target="_blank">
                    <div class="frame-post post-ctg1">
                        <figcaption>
                            <h2 class="tit_post"><?php echo $posts[1]["titulo"] ?></h2>
                            <p class="post-intro"><?php echo $posts[1]["extracto"] ?></p>
                            
                        </figcaption>
                    </div>
                </a>
            </figure>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <figure class="effect-marley">
                <a href="<?php echo $posts[2][contenido] ?>" target="_blank">
                    <div class="frame-post post-ctg2">
                        <figcaption>
                            <h2 class="tit_post"><?php echo $posts[2]["titulo"] ?></h2>
                            <p class="post-intro"><?php echo $posts[2]["extracto"] ?></p>
                        </figcaption>
                    </div>
                </a>
            </figure>
        </div>
        <div class="col-sm-6 col-xs-12">
            <figure class="effect-marley">
                <a href="<?php echo $posts[3][contenido] ?>" target="_blank">
                    <div class="frame-post post-ctg3">
                        <figcaption>
                            <h2 class="tit_post"><?php echo $posts[3]["titulo"] ?></h2>
                            <p class="post-intro"><?php echo $posts[3]["extracto"] ?></p>
                        </figcaption>
                    </div>
                </a>
            </figure>
        </div>
    </div>

	<div style="margin-top: 20px;background-color:#000; width: 100%;height: 5px;"></div>
    
    <?php include("form.php"); ?>

</div> <!--Cierro container-->


  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js" 
    type="text/javascript"></script>

<script src="js/bootstrap-notify.js"></script>    

</body>
</html>
