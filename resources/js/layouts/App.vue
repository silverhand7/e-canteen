<template>
    <div>
        <Navbar/>
        <div class="pt-5"></div>
        <div class="pt-2"></div>
        <div v-if="$page.props.flash.success" class="alert alert-success border-0 mb-0">
            <strong>Selamat!</strong> {{ $page.props.flash.success }}
        </div>
        <slot />
    </div>
</template>

<script>

import Navbar from '@/components/Navbar.vue'

export default {
    components: {
        Navbar
    },
    created() {

    }
}

</script>