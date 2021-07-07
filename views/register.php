<div id = "main">
    <div class = "post_title"><h2>Регистрация нового пользователя</h2></div>
     <div>
         <br><div id="message"><?=$registerStatus?></div><br>
        <input type='text' id='newUserLogin' placeholder='Логин'><br>
        <input type='password' id='newUserPass' placeholder='Пароль'><br>
         <br><button id="register" class="register">Зарегистрироваться</button><br>
    </div>
</div>

<script>
    let button = document.querySelectorAll('.register');
    button.forEach((elem) => {
        elem.addEventListener('click', ()=> {
            let newUserLogin = document.getElementById('newUserLogin').value;
            let newUserPass = document.getElementById('newUserPass').value;
            //console.log('click', newUserLogin, newUserPass);
            (async () => {
                const response = await fetch('/api/registration/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        newUserLogin: newUserLogin,
                        newUserPass: newUserPass
                    }),
                });
                const answer = await response.json();
                document.getElementById('message').innerText = answer.status;
            })();
        })
    })

</script>