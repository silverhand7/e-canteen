<template>
    <div class="card rounded">
        <img :src="menu.image != '' && menu.image != null ? 'storage/' + menu.image : 'https://dummyimage.com/600x400/cccccc/ffffff&text=No+Photo'" alt="cover" class="img-fluid rounded-top cover-list">
        <div class="card-body">
            <h5 class="card-title mb-3">{{ menu.name }}</h5>
            <div class="d-flex">
                <a href="#" class="btn btn-outline-primary btn-sm">Add to cart</a>
                &nbsp;&nbsp;
                <a href="#" class="btn btn-primary btn-sm">Buy</a>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: {
        menu: Object
    }
}

</script>