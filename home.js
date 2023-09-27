
const imgPosition = document.querySelectorAll(".aspect-radio-169 img");
const imgContainer = document.querySelector('.aspect-radio-169');
const dotItems = document.querySelectorAll(".dot");

let index = 0;
const imgNumber = imgPosition.length;
let slideInterval;
imgPosition.forEach(function (image, i) {
    image.style.left = i * 100 + "%";
    dotItems[i].addEventListener("click", function () {
        dotSlide(i);
        clearInterval(slideInterval);
        slideInterval = setInterval(imgBanner, 3000);
    });
});
function imgBanner() {
    index = (index + 1) % imgNumber; 
    dotSlide(index);
}
function dotSlide(i) {
    const dotActive = document.querySelector(".active");
    dotActive.classList.remove("active");
    dotItems[i].classList.add("active");
    imgContainer.style.left = `-${i * 100}%`;
}
slideInterval = setInterval(imgBanner, 3000);