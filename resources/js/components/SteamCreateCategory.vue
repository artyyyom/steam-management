<template>
    <!-- Default form subscription -->
    <div class="container">
        <div class="m-2">
            <router-link to="/">Back</router-link>
        </div>
        <div class="row">
            <form @submit.prevent="submitForm">
                <label for="defaultFormSubscriptionTitle" class="grey-text">Title</label>
                <input v-model="title" type="text" id="defaultFormSubscriptionTitle" class="form-control">

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
        }
    },
    methods: {

        // submit the form to our backend api
        async submitForm() {
            const res = await fetch('http://127.0.0.1:8000/api/categories', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },

                // pass in the information from our form
                body: JSON.stringify({
                    title: this.title,
                })
            });
        }
    }
}
</script>
