//Регистрация

var registration = new Vue({
    el:'#registration-form',
    data: {
        login: null,
        password: null,
        passwordRepeat: null,
        loginMessage: null,
        passwordMessage: null,
        passwordRepeatMessage: null,
        statusLogin: false,
        statusPassword: false,
        statusRepeatPassword: false
    },
    watch:{
        login: function(){
            if(this.login.length > 4){
                this.checkLogin();
                
            }else{
                let vm = this;
                setTimeout(function(){
                    vm.loginMessage = '<div class = "error-message">Логин слишком мал! (Минимум 5 символа)</div>';
                },700);
                this.statusLogin = false;
            }
        },
        password: function(){
            if(this.password.length < 5){
                this.passwordMessage = '<div class = "error-message">Минимальный размер пароля 5 символов!</div>';
                this.statusPassword = false;
            }else if(this.passwordRepeat == null || this.passwordRepeat == ''){
                this.passwordMessage = null;
                this.statusPassword = true;
            }else if(this.password != this.passwordRepeat){
                this.passwordMessage = null;
                this.statusPassword = false;
                this.passwordRepeatMessage = '<div class = "error-message">Пароли не совпадают</div>';
            }else{
                this.statusPassword = true;
                this.passwordRepeatMessage = '<div class = "success-message">Пароли совпадают</div>';
            }
        },
        passwordRepeat: function(){
            if(this.password != this.passwordRepeat){
                this.passwordRepeatMessage = '<div class = "error-message">Пароль не совпадает</div>';
                this.statusRepeatPassword = false;
            }else{
                this.passwordRepeatMessage = '<div class = "success-message">Пароли совпадают</div>';
                this.statusRepeatPassword = true;
            }
        }
    },
    methods: {
        checkLogin: function(){
            let login = this.login;
            let vm = this;
            setTimeout(function(){
                if(login.length === vm.login.length){
                    vm.getLogin();
                    
                }
            }, 1500);
        },
        getLogin: async function(){
            let response = await fetch('/check/login',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify({login: this.login})
            });
            if(response.ok){
                let result = await response.json();
                console.log(result);
                if(!result){
                    this.loginMessage = '<div class = "success-message">Логин свободен</div>';
                    this.statusLogin = true;
                }else{
                    this.loginMessage = '<div class = "error-message">Логин занят</div>';
                    this.statusLogin = false;
                }
            }else{
                alert("Ошибка");
            }
        },
        sendingRegistration: function(){
            if(this.statusLogin && this.statusPassword && this.statusRepeatPassword){
                this.$el.submit();
                
            }else{
                if(this.login === null || this.login ===''){
                    this.loginMessage = '<div class = "error-message">Введите логин!</div>'
                }
                if(this.password === null || this.password ===''){
                    this.passwordMessage = '<div class = "error-message">Введите пароль!</div>'
                }else if(this.passwordRepeat === null || this.passwordRepeat ===''){
                    this.passwordRepeatMessage = '<div class ="error-message">Введите проверку для пароля!</div>'
                }
            }
        }
    }
})