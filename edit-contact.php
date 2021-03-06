$(function() {
    $('.datepicker').datepicker({
        minDate: new Date(1900, 1, 1),
        maxDate: new Date(),
        yearRange: 25
    });


    $(".file-field").change(function(){
        let file_input = $(this).children().children('input[type=file]');
        console.log(file_input[0].files[0]);//this given the file object in js
        if(file_input && file_input[0].files[0]){
            //try to render the file as an image
            var reader = new FileReader();
            //reader.readAsDataURL(FileObject)
            reader.readAsDataURL(file_input[0].files[0])
            reader.onload = function(evt){
                //console.log(evt.target.result);
                $("#tmp_image").attr('src',evt.target.result);
            }
        }
    });
    $("#edit-contact-form").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 2
            },
            last_name: {
                required: true,
                minlength: 2
            },
            telephone: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            birthdate: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            address: {
                required: true,
                minlength: 5
            },
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
});
