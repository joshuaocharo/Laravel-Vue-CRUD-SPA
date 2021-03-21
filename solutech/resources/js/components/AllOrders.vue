<template>
    <div>
        <h3 class="text-center">All Orders</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Order Number</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="order in orders" :key="order.id">
                <td>{{ order.id }}</td>
                <td>{{ order.order_number }}</td>
                <td>{{ order.created_at }}</td>
                <td>{{ order.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edito', params: { id: order.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteOrder(order.id)">Delete</button>
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
                orders: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/orders')
                .then(response => {
                    this.orders = response.data;
                });
        },
        methods: {
            deleteOrder(id) {
                this.axios
                    .delete(`http://localhost:8000/api/order/delete/${id}`)
                    .then(response => {
                        let i = this.orders.map(item => item.id).indexOf(id); // find index of your object
                        this.orders.splice(i, 1)
                    });
            }
        }
    }
</script>