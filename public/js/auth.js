$(document).ready(function(){

    // Button Variables
    const registerBtn = $("#registerBtn");
    const loginBtn = $("#loginBtn");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // REGISTER
    registerBtn.on('click', function(){
        const formData = new FormData($('#registerForm')[0]);
        $.ajax({
            url : 'register',
            method : 'POST',
            data : formData,
            contentType: false,
            processData: false,  
            cache : false,
            dataType : 'json',
            beforeSend : function(){
                registerBtn.prop('disabled', true).html('Loading...');
            },
            success : function(response){
                registerBtn.prop('disabled', false).html('Register');
                console.log(response);
                if(response.res === "success"){
                    alert(response.message);
                    $('#registerForm')[0].reset();
                }else{
                    alert(response.message);
                }
            },
            error : function(xhr, status, error){
                console.log(xhr.responseText);
                alert(xhr.responseText);
            }
        });
    });
    // LOGIN
    loginBtn.on('click', function(){
        const formData = $("#loginForm").serialize();
        $.ajax({
            url : 'login',
            method : 'POST',
            data : formData,
            dataType : 'json',
            cache : false,
            beforeSend : function(){
                loginBtn.prop('disabled', true).html('Logging In...');
            },
            success : function(response){
                loginBtn.prop('disabled', false).html('Log In');
                if(response.res === "success"){
                    window.location.href = "/profile";
                }
                alert(response.message);
            }, 
            error : function(xhr, status, error){
                console.log(xhr.responseText);
            }
        });
    });
});