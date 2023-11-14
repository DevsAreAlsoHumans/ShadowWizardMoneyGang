<template>
    <hearderComp />
    <div class="headInfo">
        <div class="welcomeMessage">
            <p><strong> Bienvenue</strong></p><br>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import hearderComp from "@/components/HeaderComponent.vue"

export default {
    components: {
        hearderComp,
    }
}


</script>
<style>
.headInfo {
    align-content: center;
    justify-content: flex-start;
    width: 100%;
    height: 100%;
    padding: 0;
    margin-top: 2%;

    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: stretch;
    align-content: stretch;

}

.welcomeMessage {
    height: 100%;
    width: 25%;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: stretch;
    align-content: space-between;
}

.stats {
    width: 40%;
    height: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: stretch;
    align-content: space-between;
}

.callReceive {
    height: 100%;

    display: flex;
    margin-left: 5%;
    margin-right: 5%;
}

.callTake {
    height: 100%;

    display: flex;
    margin-left: 5%;
    margin-right: 5%;
}

.uploadFile {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: stretch;
    align-content: space-between;
    height: 100%;
    width: 20%;
}

.choseDates {
    display: flex;
    flex-direction: column;
    max-width: 15%;
    margin: 2%;
}
</style>