
<!--  Outer wrapper for presentation only, this can be anything you like -->
<div id="banner-slide">

  <!-- start Basic Jquery Slider -->
  <ul class="bjqs">
    <?php
      $res = mysql_query("SELECT * FROM articles");
  while($data = mysql_fetch_array($res))
  {
    $id = $data['id']; //id de l'article
    echo '<li><div style="max-width:70%;margin-left:15%;"><h3>'.$data['titre'].'</h3>'; //titre de l'article
    
    $imageFile = dirname(__FILE__).'/assets/images/'.$id.'.jpg'; //chemin de l'image
    if(file_exists($imageFile))
    {
      echo "<img style='margin-right:10px;' id='image' src='vignette.jpg.php?id=$id' class='img-rounded pull-left'>"; //l'image de l'article
    }
    echo '<p>'.nl2br(htmlspecialchars($data['contenu'])).'</p>'; //contenu de l'article
  }
  ?>
  </ul>
  <!-- end Basic jQuery Slider -->

</div>

<!-- attach the plug-in to the slider parent element and adjust the settings as required -->
<script class="secret-source">
  jQuery(document).ready(function($) {
    
    $('#banner-slide').bjqs({
      animtype      : 'slide',
      height        : 320,
      width         : 620,
      responsive    : true,
      randomstart   : true
    });
    
  });
</script>