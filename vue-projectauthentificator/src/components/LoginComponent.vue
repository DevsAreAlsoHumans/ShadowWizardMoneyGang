<template>
    <div class="login-page">
        <div class="form">
            <div class="login-form">
                <input type="text" v-model="username" id="username" placeholder="Username">
                <input type="text" v-model="password" id="password" placeholder="Password" />
                <button v-on:click="login">Login</button>
                <p class="message">Not registered? <a v-on:click="redirectRegister">Create an account</a></p>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';
import headerComp from "@/components/HeaderComponent.vue"

export default {
    data() {
        return {
            username: "",
            password: "",
        }
    },
    methods: {
        redirectRegister() {
            this.$router.push('/register');
        },

        
        async login() {
            const data = {
                "username": this.username,
                "password": this.password,
            }
            const req = await axios.post("http://localhost/user/login", data)
            const res = await req.data
            localStorage.setItem("idUser", JSON.stringify(res));
            this.$router.push("/profil")
        }
    },
    components: {
        headerComp,
    },
    mounted() {

    }
}
</script>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
}

.form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    outline: 1px solid var(--border-clr);
    border-radius: var(--bd-radius);
    padding-inline: var(--padding);
    box-shadow: var(--shadow);
}

.form input {
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
}

.form button {
    font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #4CAF50;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
}

.form button:hover,
.form button:active,
.form button:focus {
    background: #43A047;
}

.form .message {
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 12px;
}

.form .message a {
    color: #4CAF50;
    text-decoration: none;
}


.container .info {
    margin: 50px auto;
    text-align: center;
}

.container .info h1 {
    margin: 0 0 15px;
    padding: 0;
    font-size: 36px;
    font-weight: 300;
    color: #1a1a1a;
}

.container .info span {
    color: #4d4d4d;
    font-size: 12px;
}

.container .info span a {
    color: #000000;
    text-decoration: none;
}

.container .info span .fa {
    color: #EF3B3A;
}
</style>
