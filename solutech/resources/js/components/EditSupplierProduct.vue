<template>
    <div>
        <h3 class="text-center">Edit Supplier Products</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateSupplierProduct">
                    <div class="form-group">
                        <label>Supply Id</label>
                        <input type="text" class="form-control" v-model="supplierproduct.supply_id">
                    </div>
                    <div class="form-group">
                        <label>Product Id</label>
                        <input type="text" class="form-control" v-model="supplierproduct.product_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Supplier Products</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/supplierproduct/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.supplierproduct = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateSupplierProduct() {
                this.axios
                    .post(`http://localhost:8000/api/supplierproduct/update/${this.$route.params.id}`, this.supplierproduct)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>