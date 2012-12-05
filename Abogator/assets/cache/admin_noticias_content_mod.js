$('#noticias_fecha').datepicker({ dateFormat: 'yy-mm-dd'});
//$("#noticias_texto").markItUp(mySettings);

					if( !('noticias_texto' in CKEDITOR.instances)) {
						CKEDITOR.replace( 'noticias_texto' );
					}


