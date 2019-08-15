var lightbox = lity();  
$('img').click(function(e) {
  if (e.target.src) {
    lightbox(e.target.src);
  }
});