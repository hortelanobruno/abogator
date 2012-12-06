<div id="inside-content" class="containerNews">
    <div class="contentNews">
          <div class="contentNewsTitle">
            <?php
                  echo  $noticia['titulo'];
            ?>
        </div>
        <div class="contentNewsDate">
            <?php
                  echo  $noticia['fecha'];
            ?>
        </div>
        <div class="single-entry">
            <?php
                  echo  $noticia['contenido'];
            ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="clear"></div>
    <div class="clear"></div>
</div>
<br/>
<br/>
<br/>

<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'abogadodelrey'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
