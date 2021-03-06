var total_photos_counter = 0;
Dropzone.options.myDropzone = {
    uploadMultiple: true,
    parallelUploads: 2,
    maxFilesize: 16,
    previewTemplate: document.querySelector('#preview').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove file',
    dictFileTooBig: 'Image is larger than 16MB',
    timeout: 10000,
 
    init: function () {
        this.on("removedfile", function (file) {
            $.post({
                url: $('#remove-url').val(),
                data: {id: file.name, _token: $('[name="_token"]').val()},
                dataType: 'json',
                success: function (data) {
                    total_photos_counter--;
                    $("#counter").text("# " + total_photos_counter);
                }
            });
        });
    },
    success: function (file, data) {
        total_photos_counter++;
        $("#counter").text("# " + total_photos_counter);
        $.each(data.image_ids, function(k, v) {
            $('<input>').attr({
                type: 'hidden',
                value: v,
                name: 'image_ids[]'
            }).appendTo('#form');
        });
    }
};