$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const saveChangesBtn = $('#saveChangesBtn');
    saveChangesBtn.on('click', function(){
        const formData = new FormData($('#profileForm')[0]);

        $.ajax({
            url : 'save_changes',
            method : 'POST',
            data : formData,
            contentType: false,
            processData: false,
            dataType : 'json',
            cache : false,
            beforeSend : function(){
                saveChangesBtn.prop('disabled', true).html('Saving...');
            },
            success : function(response){
                saveChangesBtn.prop('disabled', false).html('Save Changes');
                console.log(response);
                if(response.res === "success"){
                    alert('Save Successfully!')
                }else{
                    alert('Failed to Save!');
                }
            },
            error : function(xhr, status, error){
                console.log(xhr.responseText);
            }
        });

    });


});