<template>
    <App>
        <div class="container mt-5">
            <div class="col-md-12">
                <h3 class="mb-4">Riwayat pemesanan anda</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. Order</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="order in orders" :key="order.id">
                            <td>{{ order.id }}</td>
                            <td>{{ order.created_at }}</td>
                            <td>{{ order.total.toLocaleString('en-US') }}</td>
                            <td>{{ order.status }}</td>
                            <td>
                                <Link :href="'/orders/'+order.id" class="btn btn-outline-success btn-sm">Detail</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </App>
</template>

<script>
import App from '@/layouts/App.vue';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        App,
        Link,
    },

    data() {
        return {
            orders: this.$page.props.orders
        }
    },
}

</script>