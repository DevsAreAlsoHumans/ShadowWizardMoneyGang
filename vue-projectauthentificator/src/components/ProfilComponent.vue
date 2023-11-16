<template>
    <p v-on:click="disconnect">Se deconnecter</p>
    {{ infoUser }}
    <div class="newPassword">
        <label>Nouveau mot de passe</label>
        <input v-model="newPassword" type="password">
        <label>Confirmer le mot de passe</label>
        <input v-model="confirmNewPassword" type="password">
        {{ errorMessageNewPassword }}
        <button v-on:click="updatePassword()">Changer le MDP</button>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            idUser: JSON.parse(localStorage.idUser),
            infoUser: {},
            newPassword : "",
            confirmNewPassword : "",
            errorMessageNewPassword : "",
        }
    },
    methods: {
        async checkIfConnect() {
            if (JSON.parse(localStorage.idUser) == null) {
                this.$router.push("/login")
            }
        },
        async disconnect() {
            localStorage.setItem("idUser", null)
            this.$router.push("/login")
        },
        async getUserInfo() {
            const req = await axios.get("http://localhost/user/" + this.idUser.id)
            const res = await req.data
            this.infoUser = await res
        },

        checkPassword(){
            if(this.newPassword != this.confirmNewPassword)this.errorMessageNewPassword = "Mots de passe différents"
            else if(this.newPassword.length<3)this.errorMessageNewPassword = "Le mot de passe doit être de 4 caractères minimum"
            else{
                this.errorMessageNewPassword = ""
                return true
            }
        },
        async updatePassword(){
            if(this.checkPassword()==true){
                const data = {
                    "password" : this.newPassword,
                }
                const req = await axios.put("http://localhost/user/" + this.idUser.id, data)
                const res = await req.data
                if(res==true){
                    this.errorMessageNewPassword = "Mot de passe correctement modifié"
                }
            }
        },
    },
    async mounted() {
        this.checkIfConnect()
        this.getUserInfo()
    }
}
</script>

<style>
.newPassword{
    display: flex;
    flex-direction: column;
}

</style>