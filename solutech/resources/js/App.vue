<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <a href="https://shouts.dev/" target="_blank"><img src="https://i.imgur.com/hHZjfUq.png"></a><br>
            <span class="text-secondary">Solutech</span>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/addo" class="nav-item nav-link">Add Order</router-link>
                    <router-link to="/addp" class="nav-item nav-link">Add Product</router-link>
                    <router-link to="/adds" class="nav-item nav-link">Add Supplier</router-link>
                    <router-link to="/addod" class="nav-item nav-link">Add Order Details</router-link>
                    <router-link to="/addsp" class="nav-item nav-link">Add Supplier Product</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {}
</script>