<template>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        </div>

        <router-link to="/create/category" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create category</router-link>
    </div>
    <div class="row">
        <SteamCategoryItem
            v-for="(item, index) in categories"
            v-bind:key="item.id"
            v-bind:title="item.title"
            v-bind:id="item.id"
        />
    </div>
</template>

<script>
import SteamCategoryItem from './SteamCategoryItem.vue'

export default {
    components: {
        SteamCategoryItem,
    },
    data() {
        return {
            categories: null
        };
    },
    mounted() {
        axios
            .get('http://127.0.0.1:8000/api/categories')
            .then(response => {
                this.categories = response.data.data;
            });
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/login";
        }
        next();
    }
}
</script>
