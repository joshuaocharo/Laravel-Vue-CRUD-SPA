<template>
    <div>
        <h3 class="text-center">All Supplier Products</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Supply Id</th>
                <th>Product Id</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="supplierproduct in supplierproducts" :key="supplierproduct.id">
                <td>{{ supplierproduct.id }}</td>
                <td>{{ supplierproduct.supply_id }}</td>
                <td>{{ supplierproduct.product_id }}</td>
                <td>{{ supplierproduct.created_at }}</td>
                <td>{{ supplierproduct.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editsp', params: { id: supplierproduct.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deletesupplierproduct(supplierproduct.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                supplierproducts: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/supplierproducts')
                .then(response => {
                    this.supplierproducts = response.data;
                });
        },
        methods: {
            deletesupplierproduct(id) {
                this.axios
                    .delete(`http://localhost:8000/api/supplierproduct/delete/${id}`)
                    .then(response => {
                        let i = this.supplierproducts.map(item => item.id).indexOf(id); // find index of your object
                        this.supplierproducts.splice(i, 1)
                    });
            }
        }
    }
</script>