<template>
  <div>
    <ListingDisplayInfo :listing="listing" />
  </div>
</template>

<script setup>
import ListingDisplayInfo from '@/Components/ListingDisplayInfo.vue'
defineProps({
  listing: Object,
})
</script>
