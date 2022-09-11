//action="reg.php"

/*$('.registerbtn').click(function(e) {
    e.preventDefault();
    let login = $('input[name="login"]').val();
    let password = $('input[name="password"]').val();
    let confirm_password = $('input[name="confirm_password"]').val();
    let email = $('input[name="email"]').val();
    let name = $('input[name="name"]').val();
    $.ajax({
        url: 'reg.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
            confirm_password: confirm_password,
            email: email,
            name: name
        },
        success(data) {
            $('.error-message').text(data);
        }
    });
});
$(document).ready(function() {

    $('.registerbtn').on('click', function() {

        let login = $('input[name="login"]').val();
        let password = $('input[name="password"]').val();
        let confirm_password = $('input[name="confirm_password"]').val();
        let email = $('input[name="email"]').val();
        let name = $('input[name="name"]').val();
        console.log(email);

        $.ajax({
            url: 'reg.php',
            type: 'POST',
            dataType: 'json',
            data: {
                login: login,
                password: password,
                confirm_password: confirm_password,
                email: email,
                name: name
            },
            success(data) {
                $('.error-message').text(data);
            }
        });
    });
});*/