<template>
    <div>
        <h3 class="text-center">Edit Order</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateOrder">
                    <div class="form-group">
                        <label>Order Number</label>
                        <input type="text" class="form-control" v-model="order.order_number">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Order</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                order: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/order/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.order = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateOrder() {
                this.axios
                    .post(`http://localhost:8000/api/order/update/${this.$route.params.id}`, this.order)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>