<template>
    <label for="username">Username</label>
    <input v-model="username" type="text" id="username">
    <label for="mail">mail</label>
    <input v-model="mail" type="text" id="mail">
    <label for="password">Password</label>
    <input v-model="password" type="password" id="password">
    <button v-on:click="register">Register</button>
</template>


<script>
import axios from 'axios'
export default {
    data(){
        return{
            username : "",
            password : "",
            mail : "",
        }
    },
    methods : {
        async register(){
            const data = {
                "username" : this.username,
                "password" : this.password,
                "mail" : this.mail
            }
            const req = await axios.post("http://localhost/user/register", data)
            const res = await req.data
        }
    },
    mounted() {

    }
}
</script>