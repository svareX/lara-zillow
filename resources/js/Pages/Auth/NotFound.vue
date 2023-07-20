<template>
  <div class="flex flex-col gap-4 justify-center items-center py-96">
    <h1 class="text-4xl">
      Unfortunatelly the page you were looking for couldn't be found.
    </h1>
    <Link :href="route('listing.index')" class="btn-primary text-2xl">Home</Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
