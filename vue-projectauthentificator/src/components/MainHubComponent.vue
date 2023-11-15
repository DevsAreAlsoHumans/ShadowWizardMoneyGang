<template>
    <headerComp />
    <LoginComponent />
</template>
<script>
import axios from 'axios';
import headerComp from "@/components/HeaderComponent.vue"
import LoginComponent from './LoginComponent.vue';

export default {
    components: {
        headerComp,
        LoginComponent,
    }
}
</script>
<style></style>
