$('input[type=file]').change(function(){
    $(".after-upload").show();
    $(".hide-after").hide();
});

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    if (files.length >= 1){
        // files is a FileList of File objects. List some properties.
        var output = [];

        for (var i = 0, f; f = files[i]; i++) {

            console.log(f.name);

            var imageName = f.name;

            // Thumbnail Preview
            var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);

            var times = f.size == 0 ? 0 : Math.floor( Math.log(f.size) / Math.log(1024) );
            var full_size = ( f.size / Math.pow(1024, times) ).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][times];
            file_extension = f.name.substring(f.name.lastIndexOf('.')+1, f.name.length) || f.name;


            original_name = f.name.replace(/\.[^/.]+$/, "");
            if(original_name.length > 35){
                complete_file_name= original_name.substring(0, 35) + '...';
            }else{
                complete_file_name= original_name + '.'+ file_extension;
            }
            if (isGood) {
              image = URL.createObjectURL(f);
            }else {
                var image= "https://i.pinimg.com/originals/d0/78/22/d078228e50c848f289e39872dcadf49d.png";
            }

            output.push('<div class="flex-1">', escape(complete_file_name),  '', full_size ,'<img style="height:65px; width:50px" src="',image,'"/> </div>');
        }
        document.getElementById('list').innerHTML = '<div class="flex">' + output.join('') + '</div>';
    }
}

document.getElementById('file-upload').addEventListener('change', handleFileSelect, false);
