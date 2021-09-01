require('./bootstrap');
require('./ckeditor');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var contentEditor =  document.getElementById('content');
if (typeof(contentEditor) != 'undefined' && contentEditor != null)
{
    ClassicEditor.create(document.querySelector("#content"), {
        removePlugins: ['EasyImage', 'ImageUpload'],
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', '|',
                'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|',
                'link', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                'undo', 'redo'
            ]
        }
    })
    .catch(error => {
        console.error(error);
    });
}

$(document).ready(function(){
    $("#edit-name-btn").click(function () {
        $("#name").show();
    });
    
	var password = $("#password");

    if ($("#status_3").is(':checked')) {password.prop('disabled', false);}
    
	$("input[name=status]").on('change', function() {
		var disabled = $(this).val() !== '3';
		password.prop('disabled', disabled);
	});

	$("#btn_submit").click(function () {
        var slug = $("#slug").val();
        var password = $("#input-password").val();

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {slug: slug, password: password},
            url: '/check-password',
            success: function (result) {
                if (result.error == false) {
                    $(".form-group").remove();
                    $("#slug").remove();
                    $(".card-body").prepend(result.content);
                } else {
                    console.log(result);
                }
            }
        });
    });
});