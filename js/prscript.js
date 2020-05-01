/*!
  * Bootstrap v4.4.1 (https://getbootstrap.com/)
  * Copyright 2011-2019 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
  */
/*
 * Argyros - Función de usuarios
 *
 */
/* ----------------------------------------------------------------------------------- */
function enviarMensaje( datos ){
    //Envía al servidor los datos del formulario de contacto
    
    $.ajax({
        type:"POST",
        url:"fn-mail.php",
        data:{ form_ctc: $(datos).serialize() },
        success: function( response ){
            console.log(response);
            $("#frm_comments")[0].reset();
        }
    });
}

// ================================================================================== //
jQuery.fn.exists = function(){ return ($(this).length > 0); }
// ================================================================================== //

$( document ).ready(function() {  
    
   $( "#frm_comments" ).validate( {
        rules: {
          nombre: "required",
          comentario: "required",
          email: {
            required: true,
            email: true
          }
        },
        messages: {
          nombre: "Debe indicar su nombre",
          email: "Ingrese un email válido",
          comentario: "Debe indicar un comentario"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          // Add `has-feedback` class to the parent div.form-group
          // in order to add icons to inputs
          element.parents( ".col-sm-5" ).addClass( "has-feedback" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }

          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !element.next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
          }
        },
        success: function ( label, element ) {
          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !$( element ).next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
          $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
          $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
      } );
        
        /*$('#frm_comments').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                
                Email: {
                    validators: {
                        notEmpty: {
                            message: 'Debe indicar un email'
                        },
                        emailAddress: {
                            message: 'Debe indicar un email válido'
                        }
                    }
                },
                Comentario: {
                    validators: {
                        notEmpty: {
                            message: 'Debe escribir mensaje'
                        }
                    }
                }
            }
        });*/
        
        $('#frm_comments').on('submit', function (e) {
            if (e.isDefaultPrevented()) {
              
            } else {
              e.preventDefault();
              enviarMensaje( $('#frm_comments') );
            }
        });
    /* ......................................................................*/
});
