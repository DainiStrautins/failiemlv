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

        var times = f.size == 0 ? 0 : Math.floor( Math.log(f.size) / Math.log(1024) );
        var full_size = ( f.size / Math.pow(1024, times) ).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][times];
        file_extension = f.name.substring(f.name.lastIndexOf('.')+1, f.name.length) || f.name;


        original_name = f.name.replace(/\.[^/.]+$/, "");
        if(original_name.length > 35){
            complete_file_name= original_name.substring(0, 35) + '...';
        }else{
            complete_file_name= original_name + '.'+ file_extension;
        }

        output.push('<div class="col-lg-6"><div class="bg-info ml-2 p-4 mt-3 text-white rounded "> ',escape(complete_file_name),'</div> </div><div class="col-lg-6"><div class="bg-info ml-2 p-4 mt-3 text-white rounded"> ', full_size ,' </div></div>');
    }
    document.getElementById('list').innerHTML = '<div class="container-fluid"><div class="row">' + output.join('') + '</div></div>';
    }
}

document.getElementById('filename').addEventListener('change', handleFileSelect, false);
