// авторизация
$('.login-btn').click(function(e){
    e.preventDefault();

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'text',
        data: {
            login: login,
            password: password
        },
        success (data){
            $('.msg').text(data);
        }
    });
})