<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <RouterView />
</template>
<style>

html {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  justify-content: flex-start;
  margin: 0;
  padding: 0;
}

body {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  justify-content: flex-start;
  align-items: stretch;
  align-content: space-between;
  margin: 0;
  padding: 0;
}

* {
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
</style>