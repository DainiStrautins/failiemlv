function handleFileSelect(evt) {
    let files = evt.target.files; // FileList object
    //console.log(files); //outputs everything about files
    let file_extension;
    let complete_file_name;
    if (files.length >= 1) {
        // files is a FileList of File objects. List some properties.
        let output = [];
        for (let i = 0, f; f = files[i]; i++) {

            let times = f.size === 0 ? 0 : Math.floor(Math.log(f.size) / Math.log(1024));
            let full_size = (f.size / Math.pow(1024, times)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][times];
            file_extension = f.name.substring(f.name.lastIndexOf('.') + 1, f.name.length) || f.name;
        original_name = f.name.replace(/[^\w\s/]/gi, '');
        original_name = original_name.replace(file_extension, '');
        original_name = original_name.replace(/ /g, '_');
        if (original_name.length > 25) {
            complete_file_name = original_name.substring(0, 25) + '...'+ file_extension;
        } else {
            complete_file_name = original_name + '.' + file_extension;
        }
            output.push('' +
                '<div class="col-lg-6">' +
                    '<div class="bg-info ml-2 p-4 mt-3 text-white rounded "> '
                        , escape(complete_file_name), '' +
                    '</div> ' +
                '</div>' +
                '<div class="col-lg-6">' +
                    '<div class="bg-info ml-2 p-4 mt-3 text-white rounded"> '
                        , full_size, ' ' +
                    '</div>' +
                '</div>');
            console.log(files[i],complete_file_name, full_size);
        }
        document.getElementById('list').innerHTML = '<div class="container-fluid"><div class="row">' + output.join('') + '</div></div>';
    }
}
document.getElementById('filename').addEventListener('change', handleFileSelect, false);
