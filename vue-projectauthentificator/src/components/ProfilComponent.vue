<template>
    <p v-on:click="disconnect">Se deconnecter</p>
    {{ idUser }}
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            idUser: JSON.parse(localStorage.idUser),
            infoUser: {}
        }
    },
    methods: {
        async checkIfConnect() {
            if (JSON.parse(localStorage.idUser) == null || JSON.parse(localStorage.idUser == "false")) {
                this.$router.push("/login")
            }
        },
        async disconnect() {
            localStorage.setItem("idUser", null)
            this.$router.push("/login")
        },
        async getUserInfo() {
            const req = await axios.get("http://shadowwizardmoneygang.localhost/user/" + this.idUser.id)
            const res = await req.data
            this.infoUser = await res
        }
    },
    async mounted() {
        this.checkIfConnect()
        this.getUserInfo()
    }
}
</script>