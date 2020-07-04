// CONTROLE BOTAO MENU
$(".btn-menu").click(function(){
    $(".menu").show();
});
$(".btn-close").click(function(){
    $(".menu").hide();
});
// EFEITO DAS IMAGENS NA PÁGINA SOBRE
// IMAGEM 1
// Pega o modal
var modal = document.getElementById('myModal');

// Pega a imagem e insere dentro do modal - usar isso "alt" como titulo
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Pega o elemento <span> que fecha o modal
var span = document.getElementsByClassName("close")[0];

// Quando o usuário clica no <span> (x), o modal fecha
span.onclick = function() { 
  modal.style.display = "none";
}
// IMAGEM 2
// Pega o modal
var modal = document.getElementById('myModal2');

// Pega a imagem e insere dentro do modal - usar isso "alt" como titulo
var img = document.getElementById('myImg2');
var modalImg = document.getElementById("img02");
var captionText = document.getElementById("caption2");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Pega o elemento <span> que fecha o modal
var span = document.getElementsByClassName("close")[1];

// Quando o usuário clica no <span> (x), o modal fecha
span.onclick = function() { 
  modal.style.display = "none";
}
// IMAGEM 3
// Pega o modal
var modal = document.getElementById('myModal3');

// Pega a imagem e insere dentro do modal - usar isso "alt" como titulo
var img = document.getElementById('myImg3');
var modalImg = document.getElementById("img03");
var captionText = document.getElementById("caption3");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Pega o elemento <span> que fecha o modal
var span = document.getElementsByClassName("close")[2];

// Quando o usuário clica no <span> (x), o modal fecha
span.onclick = function() { 
  modal.style.display = "none";
}

// Carousel
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

// Automatic Slideshow
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
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}