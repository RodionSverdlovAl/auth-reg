// авторизация
$('.login-btn').click(function(e){
    e.preventDefault();
    $(`input`).removeClass('error');
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data){
            if(data.status){
                document.location.href = '/profile.php';
            }else{
                if(data.type === 1){
                    data.fields.forEach(function(field){
                        $(`input[name="${field}"]`).addClass('error');
                    })
                }
                $('.msg').text(data.massage);
            }
        }
    });
})


// получение аватарки с поля
let avatar = false;
$('input[name="avatar"]').change(function(e){
    avatar = e.target.files[0];
})



// Регистрация
$('.registration-btn').click(function(e){
    e.preventDefault();
    $(`input`).removeClass('error');
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm =$('input[name="password_confirm"]').val(),
        email =  $('input[name="email"]').val(),
        full_name = $('input[name="full_name"]').val()

    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
    formData.append('email', email);
    formData.append('full_name', full_name);
    formData.append('avatar', avatar);

    $.ajax({
        url: 'vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success (data){
            console.log(data);
            if(data.status){
                document.location.href = '/index.php';
                console.log("статус: " + data.status);
            }else{
                if(data.type === 1){
                    data.fields.forEach(function(field){
                        $(`input[name="${field}"]`).addClass('error');
                    })
                }
                $('.msg').text(data.massage);
            }
        }
    });
})
