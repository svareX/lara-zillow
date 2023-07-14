<template>
  <div>
    <h3>Time spent here: {{ timer }}</h3>
    <Link href="/listing">
      Listings
    </Link>
    <Link href="/listing/create">
      New listing
    </Link>
  </div>

  <slot>Empty</slot>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const timer = ref(0)
setInterval(() => timer.value++, 1000)
</script>
