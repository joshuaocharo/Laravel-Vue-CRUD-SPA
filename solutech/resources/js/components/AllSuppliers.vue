<template>
    <div>
        <h3 class="text-center">All Suppliers</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="supplier in suppliers" :key="supplier.id">
                <td>{{ supplier.id }}</td>
                <td>{{ supplier.name }}</td>
                <td>{{ supplier.created_at }}</td>
                <td>{{ supplier.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edits', params: { id: supplier.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deletesupplier(supplier.id)">Delete</button>
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
                suppliers: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/suppliers')
                .then(response => {
                    this.suppliers = response.data;
                });
        },
        methods: {
            deletesupplier(id) {
                this.axios
                    .delete(`http://localhost:8000/api/supplier/delete/${id}`)
                    .then(response => {
                        let i = this.suppliers.map(item => item.id).indexOf(id); // find index of your object
                        this.suppliers.splice(i, 1)
                    });
            }
        }
    }
</script>