<template>
    <div>
        <Navbar/>
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