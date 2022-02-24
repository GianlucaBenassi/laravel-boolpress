import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import About from "./pages/About";
import Post from "./pages/Post";

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
    ]
});

export default router