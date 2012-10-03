
<div class="container">

    <div class="hero-unit">
        <h1>Welcome to Bonfire.</h1>

        <p>Kickstart your CodeIgniter applications.</p>
    </div>

    <p>If you're new to Bonfire, but familiar with <a href="http://www.codeigniter.com" target="_blank">CodeIgniter</a>, then you should be up an running within the system in no time.</p>

    <p>If you're new to CodeIgniter, make sure you read through and understand the latest <a href="http://codeigniter.com/user_guide/" target="_blank">CodeIgniter User Guide</a> before diving into Bonfire. Your headaches will thank you.</p>


    <p>If you are new to Bonfire, you should start by reading the <?php echo anchor('http://cibonfire.com/learn', 'docs', 'target="_blank"') ?>.</p>

    <?php if (isset($current_user->email)) : ?>

        <div class="alert alert-info" style="text-align: center">
            <?php echo anchor(SITE_AREA, "Dive into Bonfire's Springboard"); ?>
        </div>

    <?php else : ?>

        <p style="text-align: center">
            <?php echo anchor('/login', '<i class="icon-lock icon-white"></i> ' . lang('bf_action_login'), ' class="btn btn-primary btn-large" '); ?>
        </p>

    <?php endif; ?>

    Antiguedad: <?php echo $antiguedad ?>
    <br/>
    Preaviso: <?php echo $preaviso ?>
    <br/>
    Integracion: <?php echo $integracion ?>
    <br/>
    SAC/Antiguedad + preaviso + integracion: <?php echo $sac1 ?>
    <br/>
    Dias trabajados: <?php echo $dias_trabajados ?>
    <br/>
    Vacaciones completas: <?php echo $vacaciones_completas ?>
    <br/>
    Vacaciones proporcionales: <?php echo $vacaciones_proporcionales ?>
    <br/>
    SAC / Vacaciones completas: <?php echo $sac_sobre_vacaciones_completas ?>
    <br/>
    SAC / Vacaciones proporcionales: <?php echo $sac_sobre_vacaciones_proporcionales ?>
    <br/>
    SAC: <?php echo $sac ?>
    <br/>
    SAC Proporcional: <?php echo $sac_proporcional ?>
    <br/>
    Ley 25323 Art 1: <?php echo $ley_25323_1 ?>
    <br/>
    Ley 25323 Art 2: <?php echo $ley_25323_2 ?>
    <br/>
    Ley 24013 Art 8: <?php echo $ley_24013_8 ?>
    <br/>
    Ley 24013 Art 9: <?php echo $ley_24013_9 ?>
    <br/>
    Ley 24013 Art 10: <?php echo $ley_24013_10 ?>
    <br/>
    Ley 24013 Art 15: <?php echo $ley_24013_15 ?>
    <br/>
    Ley 20744 Art 80: <?php echo $ley_20744_80 ?>
    <br/>
    Ley 20744 Art 132 bis: <?php echo $ley_20744_132_bis ?>
    <br/>
    Ley 20744 Art 182: <?php echo $ley_20744_182 ?>
    <br/>
    Horas extraordinarias al 50%: <?php echo $horas_extraordinarias_al_50 ?>
    <br/>
    Horas extraordinarias al 100%: <?php echo $horas_extraordinarias_al_100 ?>
    <br/>
    Horas nocturnas: <?php echo $horas_nocturnas ?>
    <br/>
    Diferencias salariales por categoria: <?php echo $diferencias_salariales_por_categoria ?>
    <br/>




    <br/>
    <br/>


    <?php
    $a_date = "2009-11-23";
    echo date("t", strtotime($a_date));
    echo date("d", strtotime($a_date));
    ?>


</div>

<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'abogator'; // required: replace example with your forum shortname
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
<script>
var idcomments_acct = '519c9ceeed390556628bfeb42bd13eb5';
var idcomments_post_id;
var idcomments_post_url;
</script>
<span id="IDCommentsPostTitle" style="display:none"></span>
<script type='text/javascript' src='http://www.intensedebate.com/js/genericCommentWrapperV2.js'></script>