<template>
    <!-- Default form subscription -->
    <div class="container">
        <div class="m-2">
            <router-link to="/">Back</router-link>
        </div>
        <div class="row">
            <form @submit.prevent="submitForm">
                <label for="defaultFormSubscriptionCategory" class="grey-text">Category</label>
                <select class="form-select" id="defaultFormSubscriptionCategory" aria-label="Default select example" v-model="category_id">
                    <option v-for="category in categories" v-bind:value="category.id">
                        {{ category.title }}
                    </option>
                </select>

                <br>

                <label for="defaultFormSubscriptionTitle" class="grey-text">Title</label>
                <input v-model="title" type="text" id="defaultFormSubscriptionTitle" class="form-control">

                <br>

                <label for="defaultFormSubscriptionPrice" class="grey-text">Price</label>
                <input v-model="price" type="text" id="defaultFormSubscriptionPrice" class="form-control">

                <br>

                <label for="defaultFormSubscriptionCount" class="grey-text">Count</label>
                <input v-model="count" type="text" id="defaultFormSubscriptionCount" class="form-control">

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-secondary">Create</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Default form subscription -->
</template>

<script>
export default {
    data() {
        return {
            title: '',
            price: 0,
            count: 0,
            categories: [],
            category_id: 0,
        }
    },
    mounted() {
        axios
            .get(`http://127.0.0.1:8000/api/categories`)
            .then(response => {
                this.categories = response.data.data;
                this.category_id = this.categories[0].id;
            });

        axios
            .get(`http://127.0.0.1:8000/api/items/${this.$route.params.item_id}`)
            .then(response => {
                this.title = response.data.data.title
                this.price = response.data.data.price
                this.count = response.data.data.count
            });
    },
    methods: {

        // submit the form to our backend api
        async submitForm() {
            const res = await fetch('http://127.0.0.1:8000/api/items', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },

                // pass in the information from our form
                body: JSON.stringify({
                    title: this.title,
                    price: this.price,
                    count: this.count,
                    category_id: this.category_id
                })
            });
        }
    }
}
</script>
