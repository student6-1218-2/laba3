function previewFile(){
    var preview = document.querySelector('img');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function (){
        preview.src = reader.result
    }

    if(file){
        reader.readAsDataURL(file);
    }
    else{
        preview.src = "https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png";
    }
}