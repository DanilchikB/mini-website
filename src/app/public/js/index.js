//Регистрация

var registration = new Vue({
    el:'#registration-form',
    data: {
        login: null,
        password: null,
        passwordRepeat: null
    },
    watch:{
        login: function(){
            console.log(this.login.length);
            this.checkLogin();
        },
        password: function(){

        },
        passwordRepeat: function(){

        }
    },
    methods: {
        checkLogin: function(){
            let login = this.login;
            let vm = this;
            setTimeout(function(){
                if(login.length === vm.login.length){
                    fetch('/check/login',{
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                        body: JSON.stringify({login: vm.login})
                    })
                    .then(response=> response.json())
                    .then(data=>console.log(data));
                    console.log(login);
                }
            }, 1500);
            
            
        }
    }
})