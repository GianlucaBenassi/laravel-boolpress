<template>
    <div class="container">\

        <h1 class="text-center my-5">{{post.title}}</h1>
        <p>{{post.content}}</p>
        <span class="badge badge-primary fs-2">{{post.category.name}}</span>
        <ul class="p-0">
            <li v-for="tag in post.tags" :key="tag.id" class="d-inline-block mr-2">
                <span class="badge badge-secondary">{{tag.name}}</span>
            </li>
        </ul>

        <h4 class="mt-5">Add comment</h4>
        <form>
            <!-- name -->
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Add your name">
            </div>
            <!-- content -->
            <div class="form-group">
                <textarea class="form-control" id="content" rows="5" placeholder="Add content"></textarea>
            </div>
            <!-- submit -->
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

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
            })
            .catch((error) => {
                this.$router.push({name: 'page-404'});
            });
    }
}
</script>

<style lang='scss' scoped>

ul {
    list-style: none;
}

</style>