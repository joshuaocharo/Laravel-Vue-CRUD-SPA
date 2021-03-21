<template>
    <div>
        <h3 class="text-center">Add Supplier Products</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addSupplierProduct">
                    <div class="form-group">
                        <label>Supply Id</label>
                        <input type="text" class="form-control" v-model="supplierproduct.supply_id">
                    </div>
                    <div class="form-group">
                        <label>Product Id</label>
                        <input type="text" class="form-control" v-model="supplierproduct.product_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Supplier Products</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                supplierproduct: {}
            }
        },
        methods: {
            addSupplierProduct() {

                this.axios
                    .post('http://localhost:8000/api/supplierproduct/addsp', this.supplierproduct)
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