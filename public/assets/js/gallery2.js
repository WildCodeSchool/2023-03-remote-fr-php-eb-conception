var images = document.querySelectorAll("img");
for(i=0; i<images.length; i++) {
  images[i].addEventListener('click', function(){
     this.classList.toggle("expanded"); 
     img.classList.toggle("full") }); 
}