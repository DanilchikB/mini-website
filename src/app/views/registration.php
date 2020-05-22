<div id="registration">

    <h1>Регистрация</h1>
    <form id = "registration-form" v-on:submit.prevent="sendingRegistration" action = "/check/registration" method = "post">
        <input type = "text" name="login" v-model="login" placeholder="Логин"><br/>
        <div class = "message" v-html="loginMessage"></div>

        <input type = "password" name = "password" v-model="password" placeholder="Пароль"><br/>
        <div class = "message" v-html="passwordMessage"></div>
        
        <input type = "password" name = "repeat-password" v-model="passwordRepeat" placeholder="Повторите пароль"><br/>
        <div class = "message" v-html="passwordRepeatMessage"></div>

        <input type="submit" value="Зарегистрироваться">

    </form>

</div>