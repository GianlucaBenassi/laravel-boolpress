<template>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <router-link class="navbar-brand" :to="{ name: 'home' }">MyBlog</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name: 'about' }">About</router-link>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="/admin/home">Dashboard</a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang='scss' scoped>

</style>