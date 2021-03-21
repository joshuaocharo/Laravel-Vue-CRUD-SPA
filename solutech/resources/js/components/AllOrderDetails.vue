<template>
    <div>
        <h3 class="text-center">All Order Details</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Order Id</th>
                <th>Product Id</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="orderdetail in orderdetails" :key="orderdetail.id">
                <td>{{ orderdetail.id }}</td>
                <td>{{ orderdetail.order_id }}</td>
                <td>{{ orderdetail.product_id }}</td>
                <td>{{ orderdetail.created_at }}</td>
                <td>{{ orderdetail.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editod', params: { id: orderdetail.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteOrderDetail(orderdetail.id)">Delete</button>
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
                orderdetails: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/orderdetails')
                .then(response => {
                    this.orderdetails = response.data;
                });
        },
        methods: {
            deleteOrderDetail(id) {
                this.axios
                    .delete(`http://localhost:8000/api/orderdetail/delete/${id}`)
                    .then(response => {
                        let i = this.orderdetails.map(item => item.id).indexOf(id); // find index of your object
                        this.orderdetails.splice(i, 1)
                    });
            }
        }
    }
</script>