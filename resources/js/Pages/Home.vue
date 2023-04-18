<template>
    <App>
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-6 fw-bold">Selamat Datang di Stikomers Canteen</h1>
            </div>
        </div>

        <div class="container my-5">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h2>Menu</h2>
                </div>
            </div>

            <div class="row">
                <div
                    v-for="menu in menus" :key="menu.id"
                    class="col-xs-6 col-md-4 mb-4 col-6">
                    <MenuItem :menu="menu"></MenuItem>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
import App from '@/layouts/App.vue';
import MenuItem from '@/components/MenuItem.vue';

export default {
    components: {
        App,
        MenuItem
    },
    props: {
        menus: Object
    }
}

</script>

<style>

.cover-list {
    width: 100%;
    height: 270px;
    object-fit: cover;
}

</style>
