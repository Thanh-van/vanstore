let tam = 0
function readURL(input) {
    const {files} = input;
     

    Array.from(files).forEach(file=>{
        var reader = new FileReader();

        reader.onload = e => {
         
            var img = document.getElementById('img-banner_id')
            
             
            img.src = e.target.result;
            console.log(img);
            img.alt = `file-${++tam}` ;
            console.log(img.src);
        }
       
        reader.readAsDataURL(file);
    });

}