
<div class="toolbar">
    <div class="recibo">
        <div class="container" >
            <a href="/home/recibo">
                <div class="img">
                </div>
                <div class="label">
                    Recibo de sueldo
                </div>
            </a>
        </div>
    </div>
    <div class="liquidacion">
        <div class="container" >    
            <a href="/home/liquidacion">
                <div class="img">
                </div>
                <div class="label">
                    Liquidacion final
                </div>
            </a>
        </div>
    </div>
    <div class="escritos">
        <div class="container" >                            
            <a href="http://abogadodelrey.blogspot.com.ar">
                <div class="img">
                </div>
                <div class="label">
                    Escritos
                </div>
            </a>
        </div>
    </div>
</div>
<div class="news">
    <img class="border-top" src="assets/img/noticias-1.png" />
    <div class="content" >
        <div class="arriba">
            <div class="logo">

            </div>
            <div class="title">
                Noticias y actualidad
            </div>
        </div>
        <div class="bottom">
            <?php foreach ($noticias as $noticia): ?>
                <a href="/noticia/<?php echo $noticia['id'] ?>">
                    <div class="noticia">
                        <div class="fecha">
                            <?php echo $noticia['fecha'] ?>
                        </div>
                        <div class="title">
                            <?php echo $noticia['titulo'] ?>
                        </div>
                        <div class="description">
                            <?php echo $noticia['descripcion'] ?>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>

<!--            <div class="noticia">
                <div class="fecha">
                    10/10/2012
                </div>
                <div class="title">
                    Titulo de la noticia
                </div>
                <div class="description">
                    Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen
                </div>
            </div>
            <div class="noticia">
                <div class="fecha">
                    10/10/2012
                </div>
                <div class="title">
                    Titulo de la noticia
                </div>
                <div class="description">
                    Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen
                </div>
            </div>
            <div class="noticia">
                <div class="fecha">
                    10/10/2012
                </div>
                <div class="title">
                    Titulo de la noticia
                </div>
                <div class="description">
                    Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen
                </div>
            </div>
            <div class="noticia">
                <div class="fecha">
                    10/10/2012
                </div>
                <div class="title">
                    Titulo de la noticia
                </div>
                <div class="description">
                    Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen
                </div>
            </div>-->
        </div>
    </div>
    <img class="border-bottom" src="assets/img/noticias-2.png" />
</div>
