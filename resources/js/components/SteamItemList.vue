<template>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Items</h1>
        </div>

        <router-link to="/create/item" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create items</router-link>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Count</th>
            <th scope="col">Sum</th>
            <th scope="col">Current price</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <SteamItem
                v-for="(item, index) in items"
                v-bind:key="item.id"
                v-bind:title="item.title"
                v-bind:count="item.count"
                v-bind:price="item.price"
                v-bind:index="index"
                v-bind:id="item.id"
            />

        </tbody>
    </table>

</template>

<script>
import SteamItem from './SteamItem.vue'

export default {
    components: {
        SteamItem,
    },
    data() {
        return {
            items: null
        };
    },
    mounted() {
        axios
            .get(`http://127.0.0.1:8000/api/getItemsByCategory/${this.$route.params.category_id}`)
            .then(response => {
                this.items = response.data.data;
            });
    }
}
</script>
