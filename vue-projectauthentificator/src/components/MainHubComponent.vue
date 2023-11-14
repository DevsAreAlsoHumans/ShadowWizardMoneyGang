<template>
    <headerComp />
</template>
<script>
import axios from 'axios';
import headerComp from "@/components/HeaderComponent.vue"

export default {
    components: {
        headerComp, // Correction ici : headerComp au lieu de headerComp
    }
}
</script>
<style></style>
