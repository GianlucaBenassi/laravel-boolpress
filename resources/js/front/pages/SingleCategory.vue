<template>
    <div class="container">
        <h1 class="my-5">{{category.name}}</h1>
        <h3>Linked posts:</h3>

        <div v-if="category.posts.length > 0">
            <div class="list-group" v-for="post in category.posts" :key="post.id">
                <router-link :to="{ name: 'posts', params: { slug: post.slug } }" class="list-group-item list-group-item-action my-1">
                    <h5>{{post.title}}</h5>
                </router-link>
            </div>
        </div>
        <p v-else>No posts</p>

    </div>
</template>

<script>
export default {
    name: 'SingleCategory',
    data() {
        return {
            category: {}
        }
    },
    created() {
        axios.get(`/api/categories/${this.$route.params.slug}`)
            .then((response) => {
                this.category = response.data;
            })
            .catch((error) => {
                this.$router.push({name: 'page-404'});
            });
    }
}
</script>

<style lang:'scss' scoped>

</style>