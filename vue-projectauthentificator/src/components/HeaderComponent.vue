<template>
    <div class="header">
        <button @click="toggleMenu" :class="['burger-menu', { 'active': showMenu }]">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <transition name="slide">
            <ul v-if="showMenu" class="menu">
                <li style="cursor:pointer" @click="disconnect()">Se déconnecter</li>
            </ul>
        </transition>

        <div class="logo">
            <img src="@/assets/logo.jpg" alt="Logo">
        </div>

        <div class="section-title">
            <h1>TEST H1</h1>
        </div>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            showMenu: false
        };
    },
    methods: {
        toggleMenu() {
            this.showMenu = !this.showMenu;
        },
        disconnect() {
            localStorage.removeItem("userID");
            this.$router.push("login");
        }
    }
};
</script>
  
<style>
.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 10%;
    padding: 20px;
    /* Increased padding */
    box-shadow: 0px 5px 0px rgb(207, 189, 189);
}

.burger-menu {
    margin: 1%;
    box-shadow: #333;
    position: relative;
    z-index: 500;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 75px;
    border: none;
    background-color: #fff;
    height: 50px;
    cursor: pointer;
}

.burger-menu span {
    background-color: #333;
    width: 100%;
    height: 10%;
}

.menu {
    position: fixed;
    top: 50%;
    /* Center the menu vertically */
    left: 50%;
    /* Center the menu horizontally */
    transform: translate(-50%, -50%);
    width: 250px;
    background-color: #fff;
    box-shadow: 0px 5px 0px rgb(207, 189, 189);
    z-index: 998;
    padding: 40px;
    /* Increased padding */
}

.slide-enter-active,
.slide-leave-active {
    transition: transform 0.3s ease-in-out;
}

.slide-enter,
.slide-leave-to {
    transform: translateX(-100%);
}

.logo {
    width: 30%;
    /* Increased logo width */
    text-align: center;
    /* Center the logo */
}

.logo img {
    width: 100%;
    max-width: 300px;
}

.section-title {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    align-content: center;
}
</style>
  