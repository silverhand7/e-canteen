<template>
    <App>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <CartTable :carts="this.carts" :withDeleteButton="true"></CartTable>

                    <div v-if="this.carts.length != 0" class="text-end">
                        <Link href="/checkout" class="btn btn-outline-success btn-lg">Proses Checkout</Link>
                    </div>
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
            carts: this.$page.props.carts
        }
    },
    methods: {

    }
}

</script>