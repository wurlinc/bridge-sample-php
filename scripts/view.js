window.PlayerView = {

  set_state_playing: function() {
    document.getElementById("play_pause").innerHTML="pause";
  },
  
  set_state_paused: function() {
    document.getElementById("play_pause").innerHTML="play";
  },

  set_state_stopped: function() {
    document.getElementById("play_pause").innerHTML="play";
  },
  
  set_state_finished: function() {
    document.getElementById("play_pause").innerHTML="play";
  },
  
  set_playhead: function(position, total) {
    $("#playhead").html(""+position+"/"+total);
  }

}