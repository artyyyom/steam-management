<template>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Category</div>
                        <router-link style="text-decoration: none" class="h5 mb-0 font-weight-bold text-gray-800" :to="'/category/items/' + id" tag="button">{{ title }}</router-link>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {

        };
    },
    mounted() {

    },
    methods: {

    },
    props: ['title', 'id']
}
</script>
