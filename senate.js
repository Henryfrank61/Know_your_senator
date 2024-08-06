const toggleMenuClicked = () => {
    const body = document.body;
    const openIcon = document.getElementById("open-icon");
    const closeIcon = document.getElementById("close-icon");
  
    body.classList.toggle("open");
  
    if (body.classList.contains("open")) {
      openIcon.style.display = "none";
      closeIcon.style.display = "flex";
    } else {
      openIcon.style.display = "flex";
      closeIcon.style.display = "none";
    }
  };

  function preview_images() {
    var total_file = document.getElementById("images").files.length;
    for(var i=0;i<total_file;i++){
      $('#image_preview').append(`
                  <div class='col-md-3'>
                      <img style='width:100%' class='img-responsive' src='${URL.createObjectURL(event.target.files[i])}'>
                  </div>`);
    }
  }
  function resetForm(){
    $("#image_preview").html("");
    return true;
  }

  let slideIndex = 0;
showSlides();

// Next-previous control
function nextSlide() {
  slideIndex++;
  showSlides();
  timer = _timer; // reset timer
}

function prevSlide() {
  slideIndex--;
  showSlides();
  timer = _timer;
}

// Thumbnail image controlls