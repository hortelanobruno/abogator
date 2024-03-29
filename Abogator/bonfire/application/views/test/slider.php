<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Adaptor :: jQuery content slider</title>

  <link href='http://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet'>
	<link href="/assets/css/screen.css" rel="stylesheet">
  <script src="/assets/js/lib/modernizr.min.js"></script>
</head>
	<body>
	  <div id="page">

      <section>
        <header>
          <hgroup>
            <h1>Adaptor</h1>
            <h2>jQuery content slider</h2>
          </hgroup>
        </header>

        <div id="viewport-shadow">

          <a href="#" id="prev" title="go to the next slide"></a>
          <a href="#" id="next" title="go to the next slide"></a>

          <div id="viewport">
            <div id="box">
              <figure class="slide">
                <img src="/assets/img/the-battle.jpg">
              </figure>
              <figure class="slide">
                <img src="/assets/img/hiding-the-map.jpg">
              </figure>
              <figure class="slide">
                <img src="/assets/img/theres-the-buoy.jpg">
              </figure>
              <figure class="slide">
                <img src="/assets/img/finding-the-key.jpg">
              </figure>
              <figure class="slide">
                <img src="/assets/img/lets-get-out-of-here.jpg">
              </figure>
            </div>
          </div>

          <div id="time-indicator"></div>
        </div>

        <footer>
          <nav class="slider-controls">
            <ul id="controls">
              <li><a class="goto-slide current" href="#" data-slideindex="0"></a></li>
              <li><a class="goto-slide" href="#" data-slideindex="1"></a></li>
              <li><a class="goto-slide" href="#" data-slideindex="2"></a></li>
              <li><a class="goto-slide" href="#" data-slideindex="3"></a></li>
              <li><a class="goto-slide" href="#" data-slideindex="4"></a></li>
            </ul>
          </nav>
        </footer>
      </section>

      <aside id="effect-switcher">
        <h2>Select effect</h2>
        <ul id="effect-list">
          <li><a href="#" class="effect current" data-fx="scrollVert3d">Vertical 3D scroll</a></li>
          <li><a href="#" class="effect" data-fx="scrollHorz3d">Horizontal 3D scroll</a></li>
          <li><a href="#" class="effect" data-fx="scrollVert">Vertical scroll</a></li>
          <li><a href="#" class="effect" data-fx="scrollHorz">Horizontal scroll</a></li>
          <li><a href="#" class="effect" data-fx="blindLeft">Blind left</a></li>
          <li><a href="#" class="effect" data-fx="blindDown">Blind down</a></li>
          <li><a href="#" class="effect" data-fx="fade">Fade</a></li>
        </ul>
      </aside>

      <footer id="credits">
        <p>Created and maintained by <a href="http://www.philparsons.co.uk">Phil Parsons</a> | Images courtesy of the awesome <a href="http://www.davehillphoto.com/">Dave Hill</a></p> 
      </footer>

	  </div>
		<script src="//code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/lib/jquery-1.7.2.min.js"><\/script>')</script>
		<script src="/assets/js/box-slider-all.jquery.min.js"></script>
		<script>

		  $(function () {

        var $box = $('#box')
          , $indicators = $('.goto-slide')
          , $effects = $('.effect')
          , $timeIndicator = $('#time-indicator')
          , slideInterval = 5000;

        var switchIndicator = function ($c, $n, currIndex, nextIndex) {
          $timeIndicator.stop().css('width', 0);
          $indicators.removeClass('current').eq(nextIndex).addClass('current');
        };

        var startTimeIndicator = function () {
          $timeIndicator.animate({width: '680px'}, slideInterval);
        };

        // initialize the plugin with the desired settings
        $box.boxSlider({
            speed: 1000
          , autoScroll: true
          , timeout: slideInterval
          , next: '#next'
          , prev: '#prev'
          , pause: '#pause'
          , effect: 'scrollVert3d'
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

        $('#effect-list').on('click', '.effect', function (ev) {
          var $effect = $(this);

          $box.boxSlider('option', 'effect', $effect.data('fx'));
          $effects.removeClass('current');
          $effect.addClass('current');

          switchIndicator(null, null, 0, 0);
          ev.preventDefault();
        });

		  });

		</script>
	</body>
</html>
