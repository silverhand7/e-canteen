<template>
  <Card class="flex flex-col items-center justify-center">
    <div class="px-3 py-3 w-full">
      <h1 class="text-3xl text-gray-500 font-light">Selamat Datang di Stikomers Canteen</h1>
    </div>
  </Card>
</template>

<script>
export default {
  props: [
    'card',

    // The following props are only available on resource detail cards...
    // 'resource',
    // 'resourceId',
    // 'resourceName',
  ],

  mounted() {
    //
  },
}
</script>
