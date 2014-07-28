<?
require_once('wurl-api.php');
$wurl_api = new WurlApi();
$wurl_api->access_token = $_ENV["WURL_ACCESS_TOKEN"];
if ($wurl_api->access_token == '' or $wurl_api->access_token == null) {
  $wurl_api->access_token = $_REQUEST['access_token'];
}
/* Get the id we are requesting */
#$id = $wurl_api->bridge_get($_REQUEST['id']);



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Bridge API Query Demo</title>
  <style>
  
#video_area {
  float:right;
  width: 40%%;
  padding-right: 10%;
  height: 100%;
}

#video_container {
  right:5%;
}
#video_list {
  width: 42%;
}

  </style>
</head>
<body>
  <p>This is a quick demo on the bridge API.</p>

  <form>
    <input type='text' name="id" value='24_live_another_day'>
    <input type='hidden' name="access_token" value="<?=urlencode($_REQUEST['access_token'])?>">
    <input type='submit' value="Go">
  </form>
  
<?
  $bridge_response = $wurl_api->bridge_get($_REQUEST['id']);
  
  // A response from the bridge search request has properties of itself and an array of matching entities.  
  $properties = $bridge_response->properties;
  $hits = $properties->hits;
  
  if ($hits > 0) {
    $entities   = $bridge_response->entities;
    ?>

    <div id="video_area">
      <div id="video_container">
      &nbsp;
      </div>
    </div>


    <div id="video_list">
      <? foreach($entities as $entity) {

          // Each entity represents a video. We put the playback information on a "data" element.
          // Note playback has the embed code.
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

<? } else { // if $hits > 0 ?>

  <p>Sorry, no results for <?=html_entity_decode($id);?></p>

<? } ?>

<script>


function play_video(target) {
  var json_playback = JSON.parse(decodeURIComponent(target.dataset.playback));
  var container = document.getElementById("video_container");
  var playback_info = JSON.parse(decodeURIComponent(target.dataset.playback))[0];
  switch(playback_info.provider) {
    case "youtube": // YouTube player. Load the API. use videoId to specify the video directly.
      window.video_id = playback_info.videoId;
      if (document.getElementsByClassName("youtube_script").length > 0) {
        youtube_player.stopVideo();
        youtube_player.loadVideoById(playback_info.videoId);
      } else {
        var tag = document.createElement('script');
        tag.setAttribute("class", "youtube_script");
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      }

    // There's also dailymotion and other players.

    default: // Some other player. Set the innerHTML on the embed and hope for the best. ;-)
      container.innerHTML = playback_info.embed.replace(/\+/g, " ");

  }
}

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
function onYouTubeIframeAPIReady() {
   window.youtube_player = new YT.Player('video_container', {
      height: '390',
      width: '640',
      videoId: window.video_id,
      playerVars: { 'autoplay': 1, 'controls': 0 },
      events: {
        // Code your YouTube player the normal way... You may typically end up with a JS file for each overall player type, so you can support events, etc.
/*
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
*/
      }
   });
}
</script>
  
  
</body>
</html>
