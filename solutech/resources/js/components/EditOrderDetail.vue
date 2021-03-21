<template>
    <div>
        <h3 class="text-center">Edit Order Details</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateOrderDetail">
                    <div class="form-group">
                        <label>Order Id</label>
                        <input type="text" class="form-control" v-model="orderdetail.order_id">
                    </div>
                    <div class="form-group">
                        <label>Product Id</label>
                        <input type="text" class="form-control" v-model="orderdetail.product_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Order Details</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                orderdetail: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/orderdetail/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.orderdetail = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateOrderDetail() {
                this.axios
                    .post(`http://localhost:8000/api/orderdetail/update/${this.$route.params.id}`, this.orderdetail)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>