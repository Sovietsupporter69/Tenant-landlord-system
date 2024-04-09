(function () {
    let count=1
    // var images =["../assets/test-property.webp","../assets/test-property-2.webp","../assets/test-property-3.webp"]
    let previousImg = document.getElementById("previous-img");
    let nextImg = document.getElementById("next-img");
    previousImg.addEventListener("click",previous)
    nextImg.addEventListener("click",next)
    console.dir(images.length);

    let SetImg = (img) => {document.getElementById("img-slider-img").setAttribute('src', `/images/${img}`)} 

    SetImg(images[0])

    function previous(){
        if(count ==-1){
            count = images.length-1
            SetImg(images[count])
            count=count-1
        }
        else{
            SetImg(images[count])
            count=count-1
        }
    }
    function next(){
        if(count ==images.length){
            count = 0
            SetImg(images[count])
            count=count+1
        }
        else{
            SetImg(images[count])
            count=count+1

        }
    }
  })();  