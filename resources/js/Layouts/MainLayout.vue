<template>
  <div>
    <h3>Time spent here: {{ timer }}</h3>
    <Link href="route('listing.index')">
      Listings
    </Link>
    <Link href="route('listing.create')">
      New listing
    </Link>
    <div v-if="flashSuccess" class="success">
      {{ flashSuccess }}
    </div>
  </div>

  <slot>Empty</slot>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.value.flash.success,
)

const timer = ref(0)
setInterval(() => timer.value++, 1000)
</script>
