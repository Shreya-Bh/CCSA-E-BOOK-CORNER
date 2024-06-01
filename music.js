document.querySelectorAll('.music-player').forEach(function(audio) {
    audio.addEventListener('play', function() {
      document.querySelectorAll('.music-player').forEach(function(otherAudio) {
        if (otherAudio !== audio) {
          otherAudio.pause();
          otherAudio.currentTime = 0;
        }
      });
    });
  });
  
  