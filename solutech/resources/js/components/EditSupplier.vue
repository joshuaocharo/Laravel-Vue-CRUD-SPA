<template>
    <div>
        <h3 class="text-center">Edit Suppliers</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateSupplier">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="supplier.name">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Suppliers</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                supplier: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/supplier/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.supplier = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateSupplier() {
                this.axios
                    .post(`http://localhost:8000/api/supplier/update/${this.$route.params.id}`, this.supplier)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>