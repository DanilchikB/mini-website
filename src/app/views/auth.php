<div id = "authorization">

    <h1>Авторизация</h1>
    
    <form id = "authorization-form" v-on:submit.prevent="authorization" action = "/check/authorization" method = "post">
        <div class = "message" v-html="message"></div>
        <input type = "text" name="login" v-model="login" placeholder="Логин"><br/><br/>
        <input type = "password" name = "password" v-model="password" placeholder="Пароль"><br/><br/>
        <input type="submit" value="Войти">

    </form>

</div>