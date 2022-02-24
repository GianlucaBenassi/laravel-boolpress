<template>
    <div class="container">
        <h1 class="text-center my-5">{{post.title}}</h1>
        <p>{{post.content}}</p>
        <span class="badge badge-primary fs-2">{{post.category.name}}</span>
        <ul class="p-0">
            <li v-for="tag in post.tags" :key="tag.id" class="d-inline-block mr-2">
                <span class="badge badge-secondary">{{tag.name}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'Post',
    data() {
        return {
            post: {}
        }
    },
    created() {
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then((response) => {
                this.post = response.data;
            });
    }
}
</script>

<style lang='scss' scoped>

ul {
    list-style: none;
}

</style>