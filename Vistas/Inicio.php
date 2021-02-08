<div class="row">
<div align="center" class="col-md-4 col-md-offset-4">
            
     
            
            <br>
            
            <!--<img src="../Controllers/img/amigos.jpg">-->

<div class="slideshow-container">

<div class="mySlides fade">

  <img src="/GocellaCarrito/<?php echo  URL_THEME ?>img/4.png" style="width:100%">
 
</div>
<div class="mySlides fade">
  
  <img src="/GocellaCarrito/<?php echo  URL_THEME ?>img/5.png" style="width:100%">

</div>

<div class="mySlides fade">
 
  <img src="/GocellaCarrito/<?php echo  URL_THEME ?>img/10.png" style="width:100%">
  
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 

    </div>

  </div> 
  </div> 
  </div>
  <script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>


