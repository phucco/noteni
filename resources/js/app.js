require('./bootstrap');
require('./ckeditor');
// require('./main');

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

    if ($("#status_3").is(':checked')) {
        password.prop('disabled', false);
    }
    
	$("input[name=status]").on('change', function() {
		var disabled = $(this).val() !== '3';
		password.prop('disabled', disabled);
        if (disabled) { password.val(""); }
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

    $("#shortened_btn").click(function (event) {
        event.preventDefault();
        copyThisLink();        
        document.getElementById("shortened_btn").innerHTML = "Copied!";
        document.getElementById("shortened_btn").classList.add("font-weight-bold");
        setTimeout( function() {
            document.getElementById("shortened_btn").classList.remove("font-weight-bold");
            document.getElementById("shortened_btn").innerHTML = "Click here to copy this shorten URL";
        }, 3000);
    });
});

function copyThisLink()
{
    try {
        var link = document.getElementById("shortened_url");
        link.select();
        link.setSelectionRange(0, 99999);
        copyToClipboard(link.value);
    } catch (error) {
        console.log(error);        
    }
}

function copyToClipboard(textToCopy) {
    if (navigator.clipboard && window.isSecureContext) {
        return navigator.clipboard.writeText(textToCopy);
    } else {
        let textArea = document.createElement("textarea");
        textArea.value = textToCopy;
        textArea.style.position = "fixed";
        textArea.style.left = "-999999px";
        textArea.style.top = "-999999px";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        return new Promise((res, rej) => {
            document.execCommand('copy') ? res() : rej();
            textArea.remove();
        });
    }
}