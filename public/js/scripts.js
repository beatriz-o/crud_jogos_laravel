function readImage() {
    
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("foto").src = e.target.result;
            console.log('hello')
        };       
        
        file.readAsDataURL(this.files[0]);
    }
}



// function readImage() {
//     if (this.files && this.files[0]) {
//         var file = new FileReader();
//         file.onload = function(e) {
//             document.getElementById("foto").src = e.target.result;
//         };       
//         file.readAsDataURL(this.files[0]);
//     }
// }
//document.getElementById("imagem").addEventListener("change", readImage, false);
