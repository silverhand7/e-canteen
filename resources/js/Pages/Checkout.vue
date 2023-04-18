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

                    <form @submit.prevent="submitPayment">
                        <p>Jika sudah melakukan transfer, upload bukti pembayaran disini:</p>
                        <div class="form-group mb-4">
                            <input
                                type="file"
                                class="form-control"
                                @input="form.proof_of_payment = $event.target.files[0]"
                            >
                            <div v-if="errors.proof_of_payment" class="text-danger">
                                {{ errors.proof_of_payment }}
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Catatan tambahan (jika ada)</label>
                            <textarea v-model="form.note" class="form-control"></textarea>
                        </div>

                        <p class="">Klik tombol simpan pembayaran untuk memproses pesanan.</p>
                        <div class="mt-4 text-end">
                            <button class="btn btn-success btn-lg">Simpan Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </App>
</template>

<script>

import App from '@/layouts/App.vue';
import CartTable from '../components/CartTable.vue';
import { useForm } from '@inertiajs/vue3';

export default {
    data() {
        return {
            carts: this.$page.props.carts,
            form: useForm({
                proof_of_payment: null,
                status: 'paid',
                note: null,
                order_details: this.$page.props.carts,
            }),
        }
    },
    props: {
        errors: Object
    },
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

            return subTotal;
        }
    },

    methods: {
        submitPayment() {
            this.form.post('/checkout');
        }
    }
}

</script>