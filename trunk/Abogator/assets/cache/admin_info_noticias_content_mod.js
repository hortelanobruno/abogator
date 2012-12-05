$('#info_noticias_fecha').datepicker({
    dateFormat: 'yy-mm-dd'
});
//$("#info_noticias_contenido").markItUp(mySettings);

if( !('info_noticias_contenido' in CKEDITOR.instances)) {
    CKEDITOR.replace( 'info_noticias_contenido' );
}


