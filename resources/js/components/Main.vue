<template>
    <main>
        <div class="container mt-5">
            <h1>Posts list</h1>

            <div class="card mt-4" v-for="post in posts" :key="post.id">
                <h5 class="card-header">{{post.title}}</h5>
                <div class="card-body">
                    <p class="card-text">{{post.content}}</p>
                </div>
            </div>

        </div>
    </main>
</template>

<script>
export default {
    name: 'Main',
    data() {
        return {
            posts: []
        }
    },
    created() {
        axios.get('api/posts')
            .then((response) => {
                this.posts = response.data;
            })
    }
}
</script>

<style lang='scss' scoped>

</style>