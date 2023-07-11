	/*
	function welcome(){
			$(".search").toggleClass("hid");
			//$("#logo").css({ marginLeft: -30});
			//$(".nav-link").toggleClass("reduc");
		}
document.addEventListener("DOMContentLoaded", function(event) {
     $(".search").toggleClass("hid");
  });
 $(document).on("click", function(evt) {
	 console.log(evt.target);
    if(!$(evt.target).is("#search")) {
		$(".search").toggleClass("hid");
    }
});*/
function open_modal(){
	$('#preview-images').empty();
	$("#modal-dialog").removeClass("mw-100");
	$("#modal-dialog").removeClass("w-75");
	$("#msg").addClass("hid");
	$(".next").addClass("hid");
	$(".prev").addClass("hid");
	$("#modal-footer").addClass("hid");
}
function next(){
	$("#msg").toggleClass("hid");
	$("#modal-dialog").toggleClass("mw-100");
	$("#modal-dialog").toggleClass("w-75");
	let text = $("#modal-footer").text() == 'Next' ? 'Prev' : 'Next';
	if(text == 'Prev'){
		//$("#modal-footer").css({ marginRight: 30em});
	}
	$("#modal-footer").text(text)
	//alert(text);
	 
}
$(document).ready(function() {
	//$("#sortTable").tablesorter();
	
	$('#preview-images').empty();
	let selectedFiles = [];
  $('#file-upload').on('change', function(event) {
	
		const fils = event.target.files;
		selectedFiles.push(...fils);
		console.log(selectedFiles);
    var files = $(this).prop('files');
    
    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      if (file.type.match('image.*') || file.type.match('video.*')) {
        var reader = new FileReader();
        reader.onload = function(e) {
	
          var fileType = file.type.split('/')[0];
          var preview = '';
          if (fileType == 'image') {
            preview = '<img class="preview-image" src="' + e.target.result + '">';
          } else if (fileType == 'video') {
            preview = '<video class="preview-image" src="' + e.target.result + '" autoplay muted loop></video>';
          }
		  
          var wrapper = '<div class="preview-image-wrapper mySlides">' + preview + '<div class="preview-image-remove"></div></div>';
		
          $('#preview-images').append(wrapper);
		  plusSlides(1);
		  
        }
        reader.readAsDataURL(file);
		if(files.length>1){
			$(".next").removeClass("hid");
		    $(".prev").removeClass("hid");
		}
		
		$("#modal-footer").removeClass("hid");
		
      }
    }
  });
  
  $('#preview-images').on('click', '.preview-image-remove', function() {
      var images = $(".preview-image-remove");
	 let idex=images.index(this);
	 $(this).parent().remove();//remove image from dom
	 selectedFiles.splice(idex, 1);
	 if(selectedFiles.length == 0){
		
		$(".next").addClass("hid");
		$(".prev").addClass("hid");
	 }
	 plusSlides(idex-1);
  });
  
  

	
});
  
/********** modal slider */
let slideIndex = 1;
showSlides(slideIndex);
// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}
// Thumbnail image controls
function currentSlide(n) {
     showSlides(slideIndex = n);
}
function showSlides(n) {
  let i;

  let slides = document.getElementsByClassName("mySlides");
  //let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  /*for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }*/
  slides[slideIndex-1].style.display = "block";
  //dots[slideIndex-1].className += " active";
}


/******************page slider */
/**let sliderIndex2 = 1;
showSlide2(sliderIndex2);
// Next/previous controls
function plusSlides2(n) {
    showSlide2(sliderIndex2 += n);
}
// Thumbnail image controls
function currentSlide(n) {
     showSlide2(sliderIndex2 = n);
}
function showSlide2(n) {
  let i;

  let slides = document.getElementsByClassName("mySlide2");
  //let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {sliderIndex2 = 1}
  if (n < 1) {sliderIndex2 = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  /*for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }**/
  /**
  slides[sliderIndex2-1].style.display = "block";
  //dots[slideIndex-1].className += " active";
}**/
