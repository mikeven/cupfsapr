<?php
    /*
     *** CUPFSA PR *** 
     ** Formulario de contacto **
    */
?>
<style type="text/css">
    #frm_comments .form-group{
        margin-bottom: 5px;
    }
    .form-control{
        border-radius: 0;
        font-size: 12px;
    }
    .boton{ line-height: 0; }

    .help-block {
        margin: 0;
        color: #a94442;
        font-size: 11px;
    }

    .form-control-feedback {
        color: #a94442;
        right: 12px;

    }
    .glyphicon-ok{ display: none; }
</style>
<div id="email" style="margin-top:30px; margin-bottom:30px; text-align: center;">
    <div style="font-size: 20px;margin-bottom: 20px;">¿Deseas hacernos alguna pregunta o comentario?</div>
    <form id="frm_comments" class="form-horizontal">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 col-xs-12">
                
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <textarea class="form-control" id="comentario" name="comentario" 
                    placeholder="Comentario" rows="6"/></textarea>
                </div>
				<br />
                <div><input type="submit" value="Enviar" class="boton"></div>

            </div>
            <div class="col-sm-4"></div>
        </div>
        
    </form>
</div>
