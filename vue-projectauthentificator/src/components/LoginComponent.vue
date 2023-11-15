<template>
    <label for="username">Username</label>
    <input type="text" v-model="username" id="username">
    <label for="password">Password</label>
    <input type="text" v-model="password" id="password">
    <button v-on:click="login">Se Connecter</button>
</template>

<script>
import axios from 'axios'
export default{
    data(){
        return{
            username : "",
            password : "",
        }
    },
    methods : {
        async login(){
            const data = {
                "username" : this.username,
                "password" : this.password,
            }
            const req = await axios.post("http://localhost/user/login",data)
            const res = await req.data
            localStorage.setItem("idUser",JSON.stringify(res));
            this.$router.push("/profil")
        },
    },
}
</script>