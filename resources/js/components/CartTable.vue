<template>
    <div v-if="subTotal != 0">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th v-if="withDeleteButton"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(cart, index) in carts" :key="cart.id">
                    <td>{{ index+1 }}</td>
                    <td>{{ cart.name }}</td>
                    <td>{{ cart.price.toLocaleString('en-US') }}</td>
                    <td>{{ cart.qty }}</td>
                    <td>{{ (cart.price * cart.qty).toLocaleString('en-US') }}</td>
                    <td v-if="withDeleteButton">
                        <button @click="remove(cart)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:right"><b>Sub Total</b></td>
                    <td></td>
                    <td colspan="2"><b>{{ subTotal.toLocaleString('en-US') }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div v-else>
        <p>Belum ada item.</p>
    </div>

</template>

<script>
import axios from 'axios';

export default {
    props: {
        carts: Object,
        withDeleteButton: false,
    },
    computed: {
        subTotal() {
            let subTotal = 0;
            this.carts.forEach((cart) => {
                subTotal += cart.qty * cart.price;
            })

            return subTotal
        }
    },
    methods: {
        remove(cart) {
            axios.post('/delete-item-cart', {
                id: cart.id,
            }).then((result) => {
                this.$page.props.cartTotal = result.data;
                this.carts.splice(this.carts.findIndex(c => c.id == cart.id), 1);
                // console.log(this.$page.props.cart);
            }).catch((err) => {
                console.log(err);
            });
        }
    }
}

</script>