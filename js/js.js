$(document).ready(function(){
	var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('fas fa-eye');
            $(this).find('i').addClass('far fa-eye-slash');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('fas fa-eye');
            $(this).find('i').removeClass('far fa-eye-slash');
            showPass = 0;
        }
        
    });
});