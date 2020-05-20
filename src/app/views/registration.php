<div id="registration">

    <h1>Регистрация</h1>
    <form id = "registration-form" v-on:submit="sendingRegistration" action = "/check/registration" method = "post">
        <input type = "text" name="login" v-model="login" placeholder="Логин"></br>
        <input type = "password" name = "password" v-model="password" placeholder="Пароль"></br>
        <input type = "password" name = "repeat-password" v-model="passwordRepeat" placeholder="Повторите пароль"></br>
        <input type="submit" value="Зарегистрироваться">

    </from>

</div>