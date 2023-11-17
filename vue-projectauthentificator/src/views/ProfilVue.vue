<template>
    <div>
        <HeaderComponent  style="margin-bottom: 20px;"/>
        <ProfilComponent />
    </div>
</template>
    
<script>
import ProfilComponent from "@/components/ProfilComponent.vue"
import HeaderComponent from "../components/HeaderComponent.vue";
export default {
    data() {
        return {
        }
    },
    methods: {

    },
    components: {
        ProfilComponent,
        HeaderComponent,
    }
}

</script>