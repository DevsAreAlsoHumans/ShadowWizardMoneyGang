<template>
    <header class="site-header">
        <div class="header_content">
            <a v-on:click="redirectHome" class="logo-text">
                Authenticator
            </a>
        </div>
    </header>
</template>

<script>
export default {
    data() {

    },
    methods: {
        redirectHome() {
            this.$router.push('/')
        }
    },
}
</script>
  
<style>
*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --brand-clr: hsl(185, 85%, 40%);
    --bg-primary: hsl(195, 20%, 86%);
    --border-clr: hsl(195, 16%, 82%);
    --accent-blue: hsl(205, 100%, 48%);
    --text-primary: hsl(180, 6%, 38%);
    --text-accent: hsl(195, 2%, 78%);

    --header: 3.5rem;
    --full-width: 100%;
    --padding-space: calc(var(--full-width) - 1rem);
    --max-width: 80rem;
    --min-width: 22.5rem;

    --bd-radius: 0.5em;
    --space-025: 0.25rem;
    --space-05: 0.5rem;
    --space-1: 1rem;
}

a {
    text-decoration: none;
}

body {
    display: flex;
    flex-flow: column;
    min-block-size: 100vh;
    font-family: system-ui;
    background: linear-gradient(45deg, hsl(185, 26%, 72%), hsl(224, 66%, 82%));
}

.site-header {

    --padding: 1rem;
    --header-margin: 5vh;
    --shadow: 0 0.1875em 0.3125em #0003, 0 0.125em 0.5em #0002;
    margin-block: auto;
    min-block-size: var(--header);
    background-color: #fff;
    outline: 1px solid var(--border-clr);
    border-radius: var(--bd-radius);
    padding-inline: var(--padding);
    box-shadow: var(--shadow);
}

.header_content {
    display: flex;
    flex-direction: column;
    gap: 0 clamp(3.5rem, -24.14rem + 61.43vw, 25rem);
}

.header_content>* {
    flex-grow: 1;
    height: var(--header);
    width: calc((45rem - var(--full-width) - (var(--padding) * 2)) * 999);
}

.logo-text {
    color: var(--text-primary);
    font-size: 20px;
    font-weight: 500;
}
</style>
