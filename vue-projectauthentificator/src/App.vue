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
  margin: 0;
  padding: 0;
}

body {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  align-content: space-between;
}

* {
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
</style>