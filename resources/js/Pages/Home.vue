<template>
    <App>
        <div class="banner-wrapper">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3 custom-bg">
                <div class="container-fluid py-5">
                </div>
            </div>
            <h1 class="display-6 fw-bold text-white">Selamat Datang di Stikomers Canteen</h1>
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

.custom-bg {
    background-image: url('/img/stikom-depan.jpeg');
    background-position: center;
    position: relative;
    height:270px;
}

.custom-bg:before {
  content: "";
  position: absolute;
  left: 0; right: 0;
  top: 0; bottom: 0;
  background: rgba(0,0,0,.5);
}

.banner-wrapper {
    position: relative;
}

.banner-wrapper h1{
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translateX(-50%);
    width: 90%;
}

</style>
