import SteamCategoryList from "./components/SteamCategoryList";


require('./bootstrap')
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap-vue/dist/bootstrap-vue.css"

import { createApp } from 'vue'
import * as VueRouter from 'vue-router';


import SteamItem from './components/SteamItem'
import SteamCreateItem from './components/SteamCreateItem'
import SteamItemList from './components/SteamItemList'
import SteamCategoryItem from "./components/SteamCategoryItem";
import SteamCreateCategory from "./components/SteamCreateCategory";
import SteamUpdateItem from "./components/SteamUpdateItem";
import Register from "./components/Register";
import Login from "./components/Login";
import Nav from "./components/Nav";

const app = createApp({})

app.component('steam-item', SteamItem)
app.component('steam-create-item', SteamCreateItem)
app.component('steam-item-list', SteamItemList)
app.component('steam-category-list', SteamCategoryList)
app.component('steam-category', SteamCategoryItem)
app.component('steam-update-item', SteamUpdateItem)

app.component('register', Register)
app.component('login', Login)

app.component('navigation', Nav)

const routes = [
    { name: 'dashboard', path: '/', component: SteamCategoryList},
    { path: '/create/item', component: SteamCreateItem },
    { path: '/create/category', component: SteamCreateCategory },
    { path: '/category/items/:category_id', component: SteamItemList},
    { path: '/edit/item/:item_id', component: SteamUpdateItem},
    { path: '/register', component: Register},
    { path: '/login', component: Login},
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = VueRouter.createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: VueRouter.createWebHistory(),
    routes, // short for `routes: routes`
})


app.use(router)

app.mount('#app')

export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
    },
    methods: {
        logout(e) {
            console.log('ss')
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
}
