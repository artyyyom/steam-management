<template>
    <tr :id="'row' + id">
        <th scope="row">{{ index+1 }}</th>
        <td>{{ title }}</td>
        <td>{{ price }}</td>
        <td>{{ count }}</td>
        <td>{{ formatPrice(price * count) }}</td>
        <td>{{ currentPrice }}</td>
        <td>
            <router-link :to="'/edit/item/' + id" tag="span">Edit</router-link>|<span @click="updateItemPrice(id)">Update</span>|<span @click="deleteItemPrice(id)">Delete</span>
        </td>
    </tr>
</template>

<script>
export default {
    data() {
        return {
            currentPrice: 0
        };
    },
    mounted() {

    },
    methods: {
         updateItemPrice(id) {
            axios
                .post('http://127.0.0.1:8000/api/updatePrice', {id: id})
                .then(response => {
                    this.currentPrice = response.data.lowest_price_text
                });
        },
         deleteItemPrice(id) {
            axios
                .delete('http://127.0.0.1:8000/api/items/' + id)
                .then(response => {
                    const el = document.getElementById('row' + id)
                    el.remove();
                });
        },
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
    },
    props: ['title', 'count', 'price', 'index', 'id']
}
</script>
