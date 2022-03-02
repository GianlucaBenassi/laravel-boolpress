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

        <h4 class="mt-5">Add comment</h4>
        <form @submit.prevent="addComment()">
            <!-- name -->
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Add your name" v-model="formData.name">
            </div>
            <!-- content -->
            <div class="form-group">
                <textarea class="form-control" id="content" rows="5" placeholder="Add content" v-model="formData.content"></textarea>
            </div>
            <!-- success send comment message -->
            <div class="alert alert-success" role="alert" v-show="commentSend">
                <span>Comment sent and being approved!</span>
                <button type="button" class="ml-2 mb-1 close" @click="commentSend = false">
                    <span>&times;</span>
                </button>
            </div>
            <!-- errors -->
            <ul class="list-group mb-3" v-if="commentErrors.content">
                <li class="list-group-item list-group-item-warning" v-for="(error, index) in commentErrors.content" :key="index">{{error}}</li>
            </ul>
            <!-- submit -->
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

        <!-- comments list -->
        <h4 class="mt-5">Comments list</h4>
        <ul class="list-group">
            <li class="list-group-item" v-for="comment in post.comments" :key="comment.id">
                <span v-if="comment.name"><strong>{{comment.name}}</strong></span>
                <span v-else><strong>Guest</strong></span>
                <p class="mt-2 mb-0">{{comment.content}}</p>
            </li>
        </ul>


    </div>
</template>

<script>
export default {
    name: 'Post',
    data() {
        return {
            post: {},
            formData: {
                name: "",
                content: "",
                post_id: null
            },
            commentSend: false,
            commentErrors: {}
        }
    },
    methods: {
        addComment() {
            axios.post('/api/comments', this.formData)
                .then((response) => {
                    this.formData.name = '';
                    this.formData.content = '';
                    this.commentSend = true;
                    this.commentErrors = {};
                })
                .catch((error) => {
                    this.commentErrors = error.response.data.errors;
                    this.commentSend = false;
                });
        }
    },
    created() {
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then((response) => {
                this.post = response.data;
                this.formData.post_id = this.post.id;
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