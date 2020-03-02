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
        output.push('<div class="row"><div class="col-lg-8">', escape(f.name), ' (', f.type || 'n/a', ') - ',
            f.size, ' bytes</div> <div class="col-lg-4 float-right"> last modified: ',
            f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
            '</div></div>');
    }
    document.getElementById('list').innerHTML = '<div class="container text-body">' + output.join('') + '</div>';
    }
}

document.getElementById('filename').addEventListener('change', handleFileSelect, false);
