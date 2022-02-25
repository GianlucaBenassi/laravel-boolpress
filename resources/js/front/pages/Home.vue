<template>
    <div class="container mt-5">
        <h1>Posts list</h1>

        <div class="list-group" v-for="post in posts" :key="post.id">
            <router-link :to="{ name: 'posts', params: { slug: post.slug } }" class="list-group-item list-group-item-action my-1">
                <h5>{{post.title}}</h5>
                <span class="badge badge-primary">{{post.category.name}}</span>
            </router-link>
        </div>

    </div>
</template>

<script>
export default {
    name: 'Home',
    data() {
        return {
            posts: []
        }
    },
    created() {
        axios.get('/api/posts')
            .then((response) => {
                this.posts = response.data;
            })
    }
}
</script>

<style lang='scss' scoped>

</style>