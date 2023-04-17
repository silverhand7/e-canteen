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
                    v-for="item in 5" key="item"
                    class="col-xs-6 col-md-4 mb-4 col-6">
                    <div class="card rounded">
                        <img src="https://dummyimage.com/600x400/000/fff" alt="" class="img-fluid rounded-top">
                        <div class="card-body">
                            <h5 class="card-title mb-3">item Name</h5>
                            <div class="d-flex">
                                <a href="#" class="btn btn-outline-primary btn-sm">Add to cart</a>
                                &nbsp;&nbsp;
                                <a href="#" class="btn btn-primary btn-sm">Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
import App from '@/layouts/App.vue';

export default {
    components: {
        App
    }
}

</script>
