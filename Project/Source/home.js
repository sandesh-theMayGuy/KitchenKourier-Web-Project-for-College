let slider = document.querySelector('.slider');
let images = document.querySelectorAll('.slider img');
let prevBtn = document.querySelector('.prev-btn');
let nextBtn = document.querySelector('.next-btn');
let index = 0;

nextBtn.addEventListener('click', function() {
  index++;
  if (index === images.length) {
    index = 0;
  }
  slider.style.transform = `translateX(-${index * 100}%)`;
});

prevBtn.addEventListener('click', function() {
  index--;
  if (index < 0) {
    index = images.length - 1;
  }
  slider.style.transform = `translateX(-${index * 100}%)`;
});

setInterval(function() {
  index++;
  if (index === images.length) {
    index = 0;
  }
  slider.style.transform = `translateX(-${index * 100}%)`;
}, 3000);
