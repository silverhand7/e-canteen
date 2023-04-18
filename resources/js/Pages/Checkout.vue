<template>
    <App>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2>Checkout</h2>
                    <p>Silahkan lengkapi pembayaran dengan nominal yang sesuai pada pesanan dibawah:</p>
                    <CartTable :carts="this.carts" :withDeleteButton="false"></CartTable>
                </div>
                <div class="col-md-12">
                    <h3>Cara Pembayaran</h3>
                    <p>Silahkan transfer sejumlah <b>{{ subTotal.toLocaleString('en-US') }}</b> ke rekening dibawah:</p>
                    <table class="table table-sm">
                        <tr>
                            <td>Bank</td>
                            <td>:</td>
                            <td>{{ $page.props.bank }}</td>
                        </tr>
                        <tr>
                            <td>Rekening</td>
                            <td>:</td>
                            <td>{{ $page.props.bank_rekening }}</td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td>{{ $page.props.bank_name }}</td>
                        </tr>
                    </table>

                    <p>Jika sudah melakukan transfer, upload bukti pembayaran disini:</p>
                    <input type="file" name="" id="" class="form-control">

                    <p class="mt-4">Klik tombol simpan pembayaran untuk memproses pesanan.</p>

                    <div class="mt-4 text-end">
                        <button class="btn btn-success btn-lg">Simpan Pembayaran</button>
                    </div>
                </div>
            </div>

        </div>
    </App>
</template>

<script>

import App from '@/layouts/App.vue';
import CartTable from '../components/CartTable.vue';

export default {
    components: {
        App,
        CartTable
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

    data() {
        return {
            carts: this.$page.props.carts
        }
    },
}

</script>