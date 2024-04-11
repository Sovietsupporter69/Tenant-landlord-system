// Websdite:Stack Overflow
// Name Of Webpage: Preview an image before it is uploaded 
// Date:Nov 27, 2014 at 8:17
// URL:https://stackoverflow.com/a/27165977
var loadFile = function(event){
    var output =document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function(){
        URL.revokeObjectURL(output.src);
    }
};