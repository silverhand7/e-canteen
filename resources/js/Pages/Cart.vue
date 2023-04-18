<template>
    <App>
        <div class="container mt-5">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(cart, index) in carts" :key="cart.id">
                            <td>{{ index+1 }}</td>
                            <td>{{ cart.name }}</td>
                            <td>{{ cart.price.toLocaleString('en-US') }}</td>
                            <td>{{ cart.qty }}</td>
                            <td>{{ (cart.price * cart.qty).toLocaleString('en-US') }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:right"><b>Sub Total</b></td>
                            <td></td>
                            <td><b>{{ subTotal.toLocaleString('en-US') }}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </App>
</template>

<script>
import App from '@/layouts/App.vue';

export default {
    components: {
        App
    },
    data() {
        return {
            carts: this.$page.props.carts
        }
    },
    computed: {
        subTotal() {
            let subTotal = 0;
            this.carts.forEach((cart) => {
                subTotal += cart.qty * cart.price;
            })
            return subTotal
        }
    }
}

</script>