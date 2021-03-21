<template>
    <div>
        <h3 class="text-center">Add Order Details</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addOrderDetail">
                    <div class="form-group">
                        <label>Order Id</label>
                        <input type="text" class="form-control" v-model="orderdetail.order_id">
                    </div>
                    <div class="form-group">
                        <label>Product Id</label>
                        <input type="text" class="form-control" v-model="orderdetail.product_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Order Details</button>
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
        methods: {
            addOrderDetail() {

                this.axios
                    .post('http://localhost:8000/api/orderdetail/addod', this.orderdetail)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>