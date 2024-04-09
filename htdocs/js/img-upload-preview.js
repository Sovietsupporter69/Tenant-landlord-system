
// used https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded to get image preview code
var loadFile = function(event){
    console.dir("bruh");
    var output =document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function(){
        URL.revokeObjectURL(output.src);
    }
};