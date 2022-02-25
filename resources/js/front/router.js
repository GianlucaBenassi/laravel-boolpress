import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import About from "./pages/About";
import Post from "./pages/Post";
import Categories from "./pages/Categories";
import SingleCategory from "./pages/SingleCategory";
import PageNotFound from "./pages/PageNotFound";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/posts/:slug",
            name: "posts",
            component: Post
        },
        {
            path: "/categories",
            name: "categories",
            component: Categories
        },
        {
            path: "/categories/:slug",
            name: "single-category",
            component: SingleCategory
        },
        {
            path: "*",
            name: "page-404",
            component: PageNotFound
        },
    ]
});

export default router