<?
require_once('wurl-api.php');
$wurl_api = new WurlApi();
$wurl_api->access_token = $_ENV["WURL_ACCESS_TOKEN"];
if ($wurl_api->access_token == '' or $wurl_api->access_token == null) {
  $wurl_api->access_token = $_REQUEST['access_token'];
}

/* Get the id we are requesting */
$id = $_REQUEST['id'];

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

 <script src="scripts/require.js"></script>
 <script>
   require.config({
    paths: {
    },
    waitSeconds: 15
  });
  </script>
  <!-- Bootstrap is just for organizing the HTML. Not needed. -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <!-- jQuery is just for $(). We try to use regular JS whenever possible for this demo -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  
 <script src="scripts/view.js"></script>
 <title>Bridge API Query Demo</title>
  <style>

#video_container {
  height: 562px;;
  width: 418px;
  max-width: 562px;
  max-height: 418px;
}

#video_container iframe {
  height: 560px;
  width: 415px;
  max-width: 560px;
  max-height: 415px;
}
#video_container video {
  height: 560px;
  width: 415px;
  max-width: 560px;
  max-height: 415px;
}

  </style>
</head>
<body role="document">

    <div class="container theme-showcase" role="main">

      <div class="page-header">
        <h1>Bridge Demo</h1>
      </div>


  <p>This is a quick demo on the bridge API.</p>


<? 
# Show the form for searching. Non-demo related.
include("query-form.php");
?>

<div class="row">
<div class="col-sm-4">
<?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $bridge_response = $wurl_api->bridge_get($id);
  
  // A response from the bridge search request has properties of itself and an array of matching entities.  
  $properties = $bridge_response->properties;
  $hits = $properties->hits;
  
  if ($hits > 0) {
    $entities   = $bridge_response->entities;
    ?>

    <div id="video_list">
      <? foreach($entities as $entity) {

          // Each entity represents a video. We put the playback information on a "data" element.
          // Note the playback array has the code of how to play it.
          $video_props = $entity->properties;
          $playback = $video_props->playback; ?>

        <p>
        <a href="#" id="play_video_<?=html_entity_decode($video_props->id)?>"
                onclick="play_video(this); return false;"
                data-playback="<?=urlencode(json_encode($playback))?>"
                ><?=html_entity_decode( $video_props->title )?></a>
        <br>
        </p>

      <? } // foreach ?>
    </div>

</div> <!-- col-sm-4 -->
<div class="col-sm-4">

    <div id="video_area">
      <div id="video_controls">
        <span id="playhead">0:00:00</div>
        <button id="play_pause" value="play">play</button>
        <button id="stop" value="play">stop</button>
      </div>
      <div id="video_container">
      <!-- Video tag will get rendered in here -->
      &nbsp;
      </div>
    </div>
</div> <!-- col-sm-4 -->


<? } else { // if $hits > 0 ?>

  <p>Sorry, no results for <?=html_entity_decode($id);?></p>

<? } ?>

<? } ?>

</div>
</div>

<script>

/* Each platform may be different, but for HTML we play the video by grabbing the playback array
  and deciding on the provider of the playback info. To make it simpler we are just grabbing the first
  element, but you can check in the array for an entry with the "provider" for your platform ("youtube",
  "mp4", etc).
 */
function play_video(target) {
  var json_playback = JSON.parse(decodeURIComponent(target.dataset.playback));
  var container = document.getElementById("video_container");
  var playback_info = JSON.parse(decodeURIComponent(target.dataset.playback))[0];
  // Current playback item
  window.playback_info = playback_info;
  if (playback_info.provider == '') {
    // No provider but a video asset? we'll use html5 events on a video tag, and html5-playback.js
    playback_info.provider = "html5";
  }
  requirejs.onError = function (err) {
    // No script for this provider type? Just put the embed task. We won't have events though.
    container.innerHTML = playback_info.embed.replace(/\+/g, " ");
  };
  require(["scripts/"+playback_info.provider+"-playback.js"], function(player_js) {
  }); 

}

</script>
  
  
</body>
</html>
