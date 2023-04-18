<template>
    <div class="card rounded">
        <img :src="menu.image != '' && menu.image != null ? 'storage/' + menu.image : 'https://dummyimage.com/600x400/cccccc/ffffff&text=No+Photo'" alt="cover" class="img-fluid rounded-top cover-list">
        <div class="card-body">
            <h5 class="card-title mb-3">{{ menu.name }}</h5>
            <div class="d-flex">
                <button @click="addToCart(menu)" class="btn btn-outline-primary btn-sm">Tambah ke keranjang</button>
                &nbsp;&nbsp;

            </div>
        </div>
    </div>
</template>

<script>

import { router } from '@inertiajs/core';
import axios from 'axios';

export default {
    props: {
        menu: Object,
    },
    created() {
        // console.log(this.$page.props.cart);
        // console.log(this.$page.props.auth?.id);
    },
    methods: {
        addToCart(menu){
            if (this.$page.props.auth?.id != undefined) {
                axios.post('/add-to-cart', {
                    menu_id: menu.id,
                    qty: 1,
                    buyer_id: this.$page.props.auth.id
                }).then((result) => {
                    this.$page.props.cartTotal = result.data;
                    setTimeout(() => {
                        alert('Berhasil menambahkan menu kedalam keranjang');
                    }, 100);
                    // console.log(this.$page.props.cart);
                }).catch((err) => {
                    console.log(err);
                });
            } else {
                router.visit('/login');
            }
        }
    }
}

</script>