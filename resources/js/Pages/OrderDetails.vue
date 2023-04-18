<template>
    <App>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Order ID</td>
                                <td>:</td>
                                <td>{{ order.id }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>{{ order.created_at }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td>{{ order.total.toLocaleString('en-US') }}</td>
                            </tr>
                            <tr>
                                <td>Bukti Pembayaran</td>
                                <td>:</td>
                                <td>
                                    <a v-if="order.proof_of_payment" :href="`/storage/${order.proof_of_payment}`" target="_blank">Download</a>
                                    <p v-else>Belum ada pembayaran</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <CartTable :carts="orderDetails"></CartTable>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
import App from '@/layouts/App.vue';
import CartTable from '@/components/CartTable.vue';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        App,
        Link,
        CartTable
    },

    data() {
        return {
            order: this.$page.props.order,
            orderDetails: this.$page.props.order_details
        }
    },
}
</script>