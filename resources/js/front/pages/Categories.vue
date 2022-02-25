<template>
    <div class="container mt-5">
        <h1>Categories list</h1>

        <div class="list-group" v-for="category in categories" :key="category.id">
            <router-link :to="{ name: 'categories', params: { slug: category.slug } }" class="list-group-item list-group-item-action my-1">
                <h5>{{category.name}}</h5>
            </router-link>
        </div>

    </div>
</template>

<script>
export default {
    name: 'Categories',
    data() {
        return {
            categories: []
        }
    },
    created() {
        axios.get('/api/categories')
            .then((response) => {
                this.categories = response.data;
            })
    }
}
</script>

<style lang:'scss' scoped>

</style>