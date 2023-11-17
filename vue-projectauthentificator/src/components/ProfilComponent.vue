<template>
    <div id="card">
        <p id="title">Profil</p>
        <div id="content">
            <img id="avatar" width="100" height="100" src="/avatar3D.jpg" alt="avatar 3D">
            <svg width="142px" height="142px" viewBox="0 0 24 24" fill="none" id="avatar-svg">
                <defs>
                    <linearGradient id="AvatarGradient">
                        <stop offset="5%" stop-color="#AEDD9A" />
                        <stop offset="95%" stop-color="#44B973" />
                    </linearGradient>
                </defs>
                <path
                    d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C14.8273 3 17.35 4.30367 19 6.34267"
                    stroke="url(#AvatarGradient)" stroke-width="0.5" stroke-linecap="round"></path>
            </svg>
            <p id="user-name">{{ infoUser.username }}</p>
            <p id="user-mail"><a href="mailto:{{ infoUser.mail }}">{{ infoUser.mail }}</a>
            </p>
            <div id="user-general-values">

                <div class="line"></div>

                <div class="line"></div>

            </div>
            <div id="group-btn">
                <p class="btn pointer" id="follow-btn" v-on:click="displayPasswordDiv = !displayPasswordDiv">Edit profil</p>
                <p class="btn pointer" v-on:click="disconnect" id="message-btn">Logout</p>
            </div>
            <div id="socials">
                <svg class="pointer" width="40px" height="40px" viewBox="-20 0 190 190" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M90.62 147.24H88.87C88.68 139.97 88.44 129.53 88.31 120.85L99.97 120.62L102.19 107.62L88.25 108.62C88.5 97.9998 90.47 95.9998 97.37 95.9998C99.53 95.9998 101.75 95.9998 103.22 95.9998V82.4798C99.3782 81.9721 95.5049 81.7415 91.63 81.7898C77.43 81.7898 73 90.6598 73 108.25V109.59L65.83 110.08L65.73 121.28L72.97 121.14C72.97 130.38 72.89 140.14 72.86 146.98C66.75 146.85 60.72 146.72 55.86 146.72C37.55 146.72 32.58 135.89 32.58 122.12C32.58 108.35 32.85 93.1198 32.85 87.8998C32.85 72.4298 39.7 63.8398 56.68 63.8398C62.96 63.8398 86.58 63.7798 94.62 63.7798C110.07 63.7798 117.48 70.1598 117.48 88.8398C117.48 93.4498 117.14 102.08 117.14 126.01C117.11 141.06 110 147.24 90.62 147.24Z">
                    </path>
                </svg>

                <svg class="pointer" width="40px" height="40px" viewBox="-20 0 190 190" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M90.62 147.24C80.3 147.24 65.62 146.72 55.83 146.72C37.52 146.72 32.55 135.89 32.55 122.12C32.55 108.35 32.82 93.1198 32.82 87.8998C32.82 72.4298 39.67 63.8398 56.65 63.8398C62.93 63.8398 86.55 63.7798 94.59 63.7798C110.04 63.7798 117.45 70.1598 117.45 88.8398C117.45 93.4498 117.11 102.08 117.11 126.01C117.11 141.06 110 147.24 90.62 147.24ZM75.12 83.6898C46.3 83.6898 44.91 127.55 75.61 127.55C103.65 127.55 103.83 83.6898 75.12 83.6898ZM101.17 74.9998C92.84 74.9998 92.44 87.6098 101.32 87.6098C109.42 87.5898 109.48 74.9998 101.17 74.9998Z">
                    </path>
                </svg>

                <svg class="pointer" width="40px" height="40px" viewBox="-20 0 190 190" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M75.67 137.53C29.59 137.53 28.87 136.41 28.87 104.6C28.87 74.1802 29.18 73.4902 74.74 73.4902C120.3 73.4902 121.13 74.1302 121.13 105.59C121.13 137.05 121.74 137.53 75.67 137.53ZM63 90.3902L63.48 123.22L93.06 105.6L63 90.3902Z">
                    </path>
                </svg>
            </div>
            <div v-if="displayPasswordDiv" class="newPassword">
                <label>Nouveau mot de passe</label>
                <input v-model="newPassword" type="password">
                <label>Confirmer le mot de passe</label>
                <input v-model="confirmNewPassword" type="password">
                {{ errorMessageNewPassword }}
                <button v-on:click="updatePassword()">Changer le MDP</button>
            </div>
        </div>
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
            displayPasswordDiv : false,
        }
    },
    methods: {
        async checkIfConnect() {
            if (JSON.parse(localStorage.idUser) == null || JSON.parse(localStorage.idUser == "false")) {
                this.$router.push("/mainHub")
            }
        },
        async disconnect() {
            localStorage.setItem("idUser", null)
            this.$router.push("/mainHub")
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

@import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200;8..144,300;8..144,400&display=swap');

@keyframes show {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

* {
    font-family: "Roboto Flex", sans-serif;
    color: #687B87;
}

html {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

body {
    background: linear-gradient(0.25turn, #AEDD9A, #44B973);
}

input{
    border-radius : 4px;
    margin : 5px;
}

button{
    border-radius: 4px;
}
label{
    align-self: center;
}

.newPassword{
    display: flex;
    flex-direction: column;
}

.btn {
    color: white;
    height: 32px;
    width: 100px;
    margin: 0;
    border-radius: 15px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #44B973;
}

.btn:hover {
    background: #378E5A;
}

.pointer {
    cursor: pointer;
}

#card {
    width: 320px;
    height: 100%;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #F7F7F7;
    border-radius: 25px;
}

#menu {
    width: 10%;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

#title {
    width: 80%;
    margin: 0;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    letter-spacing: 1px;
    margin-top: 15px;
    text-transform: uppercase;
}

#settings {
    position: relative;
    width: 10%;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

#settings svg {
    stroke: #687B87;
}

#settings span {
    position: absolute;
    right: 5px;
    top: 3px;
    width: 5px;
    height: 5px;
    background: #44B973;
    border-radius: 90%;
}

#content {
    position: relative;
    height: 94%;
    padding: 25px 20px 20px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

#avatar {
    margin: 20px 0 0 0;
    border-radius: 90%;
}

#avatar-svg {
    position: absolute;
    top: 24px;
    transform: rotate(150deg);
}

#user-name {
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 1px;
    margin: 30px 0 0 0;
}


#user-mail {
    font-size: 18px;
    font-weight: bold;
    letter-spacing: 1px;
    margin: 10px 0 0 0;
}

#user-profession {
    font-size: 18px;
    font-weight: lighter;
    margin: 3px 0 0 0;
}

#user-general-values {
    margin: 30px 0 0 0;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

#user-general-values p {
    width: 30%;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

#user-general-values p span:nth-child(1) {
    font-size: 22px;
    font-weight: bold;
    color: #378E5A;
}

#user-general-values p span:nth-child(2) {
    font-size: 15px;
    font-weight: lighter;
    margin: 3px 0 0 0;
}

.line {
    width: 1px;
    height: 60%;
    margin: 0 20px;
    background-color: #BCBCBC;
}

#group-btn {
    width: 100%;
    margin: 30px 0 0 0;
    display: flex;
    flex-direction: row;
    justify-content: center;
}

#follow-btn {
    margin-right: 5px;
}

#message-btn {
    margin-left: 5px;
}

#socials {
    width: 100%;
    position: relative;
    margin: 20px 0 0 0;
    display: flex;
    flex-direction: row;
    justify-content: center;
}

#socials svg path {
    fill: #687B87;
}
</style>