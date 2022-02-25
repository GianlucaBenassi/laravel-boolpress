<template>
    <div class="container">
        <h1 class="text-center my-5">404 | Page not found!</h1>
        <router-link :to="{ name: 'home'}" class="d-block text-center">Return to home</router-link>
    </div>
</template>

<script>
export default {
    name: 'PageNotFound'
}
</script>

<style lang:'scss' scoped>

</style>