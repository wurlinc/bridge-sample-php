window.YouTube = {
  onPlayerReady: function(evt) {
  },

  onPlayerStateChange: function(evt) {
    if (evt.data == YT.PlayerState.PLAYING) {
      document.getElementById("play_pause").innerHTML="pause";
    } else if (evt.data == YT.PlayerState.PAUSED) {
      document.getElementById("play_pause").innerHTML="play";
    } else if (evt.data == YT.PlayerState.ENDED) {
      // TODO Clean up video resources.
    }
  }
}

/* Load the YouTube API. It will call onYouTubeIframeAPIReady */
if (document.getElementsByClassName("youtube_script").length <1) {
  var tag = document.createElement('script');
  tag.setAttribute("class", "youtube_script");
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}
// This function creates an <iframe> (and YouTube player)
// after the API code downloads, and starts video playback.
function onYouTubeIframeAPIReady() {
   window.youtube_player = new YT.Player('video_container', {
      height: '390',
      width: '640',
      // For videos that use a "video ID" and an SDK (like YouTube), we simply use it directly off the official SDK.
      videoId: window.playback_info.videoId,
      playerVars: { 'autoplay': 1, 'controls': 0 },
      events: {
        // Code your YouTube player the normal way... You may typically end up with a JS file for each overall player type, so you can support events, etc.
        'onReady': window.YouTube.onPlayerReady,
        'onStateChange': window.YouTube.onPlayerStateChange
      }
   });
}

window.player_wrapper = window.YouTube;