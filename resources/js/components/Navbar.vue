<template>
    <nav class="navbar navbar-expand-lg bg-light border fixed-top">
        <div class="container-fluid">
            <Link class="navbar-brand" href="/">
                <img src="/img/image-logo.png" alt="logo" class="logo">
            </Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link class="nav-link" aria-current="page" href="/">Home</Link>
                    </li>
                    <li v-if="$page.props.auth" class="nav-item">
                        <Link class="nav-link" href="/orders">Pesanan Anda</Link>
                    </li>
                </ul>
                <div>
                    <div class="d-flex">
                        <Link href="/cart" class="btn btn-sm btn-outline-info mx-2">
                            <i class="fa fa-cart-shopping"></i>
                            <span>&nbsp; {{ $page.props.cartTotal }}</span>
                        </Link>
                        <div v-if="!$page.props.auth">
                            <Link href="/login" class="btn btn-primary btn-sm me-2">Login</Link>
                            <Link href="/register" class="btn btn-outline-primary btn-sm">Register</Link>
                        </div>
                        <div v-else>
                            <Link href="/logout" as="button" method="post" class="btn btn-danger btn-sm">Logout</Link>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    components: {
        Link,
    },

    created() {

    }
}
</script>

<style>

.logo {
    max-width: 200px;
}
</style>