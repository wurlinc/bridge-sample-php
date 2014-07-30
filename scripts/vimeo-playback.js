/** A minimalist sample of a Vimeo Events playing implementation. */
window.Vimeo = {
  play: function(playerID) {
    document.getElementById("play_pause").innerHTML="pause";
  },
  seek: function(playerID) {
  },
  ready: function() {
    var flp = Froogaloop($("iframe", document.getElementById("video_container"))[0])
    flp.addEvent('play', Vimeo.play);
    flp.addEvent('seek', Vimeo.seek);
    flp.api('play'); // Autoplay.
  }
}

requirejs.config({
  paths: {
    'froogaloop2': "http://a.vimeocdn.com/js/froogaloop2.min"
  }
});

requirejs(['froogaloop2'], function() {
  var container = document.getElementById("video_container");
  container.innerHTML = playback_info.embed.replace(/\+/g, " ");
  Froogaloop($("iframe", container)[0]).addEvent('ready', window.Vimeo.ready);


/*
         	// Enable the API on each Vimeo video
            jQuery('iframe.vimeo').each(function(){
                Froogaloop(this).addEvent('ready', ready);
            });
            
            function ready(playerID){
                // Add event listerns
                // http://vimeo.com/api/docs/player-js#events
                Froogaloop(playerID).addEvent('play', play(playerID));
                Froogaloop(playerID).addEvent('seek', seek);
                
                // Fire an API method
                // http://vimeo.com/api/docs/player-js#reference
                Froogaloop(playerID).api('play');
            }
            function play(playerID){
                alert(playerID + " is playing!!!");
            }
            function seek() {
                alert('Seeking');
            }
  
        });
*/
        
});
