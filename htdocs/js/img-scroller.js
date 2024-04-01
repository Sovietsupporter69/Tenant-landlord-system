(function () {
    var count=1
    var images =["../assets/test-property.webp","../assets/test-property-2.webp","../assets/test-property-3.webp"]
    var previousImg = document.getElementById("previous-img");
    var nextImg = document.getElementById("next-img");
    previousImg.addEventListener("click",previous)
    nextImg.addEventListener("click",next)
    console.dir(images.length);
    function previous(){
        if(count ==-1){
            count = images.length-1
            document.getElementById("img-slider-img").setAttribute('src',images[count])
            count=count-1
        }
        else{
            document.getElementById("img-slider-img").setAttribute('src',images[count])
            count=count-1
        }
    }
    function next(){
        if(count ==images.length){
            count = 0
            document.getElementById("img-slider-img").setAttribute('src',images[count])
            count=count+1
        }
        else{
            document.getElementById("img-slider-img").setAttribute('src',images[count])
            count=count+1

        }
    }
  })();  