<template>
    <div>
        <h3 class="text-center">Add Suppliers</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addSupplier">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="supplier.name">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Add Suppliers</button>
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
        methods: {
            addSupplier() {

                this.axios
                    .post('http://localhost:8000/api/supplier/adds', this.supplier)
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