<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="/assets/css/home.css" />
        <script src="/assets/js/lib/modernizr.min.js"></script>
        <title>Abogado del rey</title>
    </head>
    <body>
        <div class="main">
            <div class="top">
                <div class="north">
                    <a href="/">
                        <div class="logo">
                        </div>
                    </a>
                    <div class="links">
                        <ul>

                            <li><a href="/home">Inicio</a></li>
                            <li><a href="/home/estudio">El estudio</a></li>
                            <li><a href="/home/contacto">Contacto</a></li>

                            <li><a target="_blank" style="padding:0px" href="https://twitter.com/abogadodelrey"><div class="twitter" ></div></a></li>

                            <li><a target="_blank" style="padding:0px" href="https://www.facebook.com/abogado.delrey " ><div class="facebook" ></div></a></li>
                        </ul>
                    </div>
                </div>
                <div id="viewport-shadow">
                    <!--
                              <a href="#" id="prev" title="go to the next slide"></a>
                              <a href="#" id="next" title="go to the next slide"></a>-->
                    <div id="viewport">
                        <div id="box">
                            <figure class="slide">
                                <img src="/assets/img/banner.jpg"/>
                            </figure>
                            <figure class="slide">
                                <img src="/assets/img/banner2.jpg"/>
                            </figure>
                            <figure class="slide">
                                <img src="/assets/img/banner3.jpg"/>
                            </figure>
                            <figure class="slide">
                                <img src="/assets/img/banner4.jpg"/>
                            </figure>
<!--                            <figure class="slide">
                                <img src="/assets/img/banner5.jpg"/>
                            </figure>-->
                        </div>
                    </div>

                    <!--          <div id="time-indicator"></div>-->
                </div>
                <div class="images-shadow">
                    <img src="/assets/img/banner-shadow.png">
                </div>
                <div id="slider-buttons">

                    <ul id="controls">
                        <li><a class="goto-slide current" href="#" data-slideindex="0"></a></li>
                        <li><a class="goto-slide" href="#" data-slideindex="1"></a></li>
                        <li><a class="goto-slide" href="#" data-slideindex="2"></a></li>
                        <li><a class="goto-slide" href="#" data-slideindex="3"></a></li>
                        <!--<li><a class="goto-slide" href="#" data-slideindex="4"></a></li>-->
                    </ul>

                </div>


                <div class="division"></div>
            </div>
            <script src="//code.jquery.com/jquery-1.7.2.min.js"></script>
            <script>window.jQuery || document.write('<script src="/assets/js/lib/jquery-1.7.2.min.js"><\/script>')</script>
            <script src="/assets/js/box-slider-all.jquery.min.js"></script>
            <script>

                $(function () {

                    var $box = $('#box')
                    , $indicators = $('.goto-slide')
                    , $effects = $('.effect')
                    //          , $timeIndicator = $('#time-indicator')
                    , slideInterval = 5000;

                    var switchIndicator = function ($c, $n, currIndex, nextIndex) {
                        //          $timeIndicator.stop().css('width', 0);
                        $indicators.removeClass('current').eq(nextIndex).addClass('current');
                    };

                    var startTimeIndicator = function () {
                        //          $timeIndicator.animate({width: '680px'}, slideInterval);
                    };

                    // initialize the plugin with the desired settings
                    $box.boxSlider({
                        speed: 1000
                        , autoScroll: true
                        , timeout: slideInterval
                        //          , next: '#next'
                        //          , prev: '#prev'
                        , pauseOnHover: true
                        , effect: 'fade'
                        , blindCount: 15
                        , onbefore: switchIndicator
                        , onafter: startTimeIndicator
                    });

                    startTimeIndicator();

                    // pagination isn't built in simply because it's easy to
                    // roll your own with the plugin API methods
                    $('#controls').on('click', '.goto-slide', function (ev) {
                        $box.boxSlider('showSlide', $(this).data('slideindex'));
                        ev.preventDefault();
                    });

                    //        $('#effect-list').on('click', '.effect', function (ev) {
                    //          var $effect = $(this);
                    //
                    //          $box.boxSlider('option', 'effect', $effect.data('fx'));
                    //          $effects.removeClass('current');
                    //          $effect.addClass('current');
                    //
                    //          switchIndicator(null, null, 0, 0);
                    //          ev.preventDefault();
                    //        });

                });

            </script>