
    var imgPosition = document.querySelectorAll(".aspect-radio-169 img");
    var imgContainer = document.querySelector('.aspect-radio-169');
    var dotItems = document.querySelectorAll(".dot");

    let index = 0;
    let imgNumber = imgPosition.length;

    imgPosition.forEach(function(image, i) {
        image.style.left = i * 100 + "%";
        dotItems[i].addEventListener("click", function() {
            dotSlide(i);
        });
    });

    function imgBanner() {
        index++;
        if (index >= imgNumber) {
            index = 0;
        }
        dotSlide(index);
    }

    function dotSlide(i) {
        var dotActive = document.querySelector(".active");
        dotActive.classList.remove("active");
        dotItems[i].classList.add("active");
        imgContainer.style.left = "-" + i * 100 + "%";
    }

    setInterval(imgBanner, 3000);
    const itemslidebar = document.querySelectorAll(".category-left-li");
    itemslidebar.forEach(function(menu,index) {
        menu.addEventListener("click",function() {
            menu.classList.toggle("block")
        });
    })
    