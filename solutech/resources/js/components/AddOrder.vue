<template>
    <div>
        <h3 class="text-center">Add Order</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addOrder">
                    <div class="form-group">
                        <label>Order Number</label>
                        <input type="text" class="form-control" v-model="order.order_number">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Add Order</button>
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
        methods: {
            addOrder() {

                this.axios
                    .post('http://localhost:8000/api/order/addo', this.order)
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