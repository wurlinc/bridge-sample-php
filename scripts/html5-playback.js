var container = document.getElementById("video_container");
container.innerHTML = playback_info.embed.replace(/\+/g, " ");

var video_tag = $("video")[0];
video_tag.onended = function() {
  PlayerView.set_state_finished();
}
video_tag.onemptied = function() {
}
video_tag.onloadedmetadata = function() {
}
video_tag.onloadeddata = function() {
}
video_tag.oncanplay = function() {
}
video_tag.oncanplaythrough = function() {
}
video_tag.onplaying= function() {
  PlayerView.set_state_playing()
}
video_tag.onwaiting = function() {
}

video_tag.ondurationchange = function() {
}
video_tag.ontimeupdate = function() {
  PlayerView.set_playhead(video_tag.currentTime, video_tag.duration);
}
video_tag.onplay = function() {
  PlayerView.set_state_playing();
}
video_tag.onpause = function() {
  PlayerView.set_state_paused();
}
video_tag.onratechange = function() {
}
video_tag.onvolumechange = function() {
}
