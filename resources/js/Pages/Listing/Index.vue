<template>
  <div v-for="listing in listings" :key="listing.id">
    <Link :href="`/listing/${listing.id}`">
      <div>
        <ListingDisplayInfo :listing="listing" />
      </div>
    </Link>
    <Link :href="`/listing/${listing.id}/edit`">Edit</Link>
    <Link :href="`/listing/${listing.id}`" method="delete" as="button">Delete</Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import ListingDisplayInfo from '@/Components/ListingDisplayInfo.vue'
defineProps({
  listings: Array,
})
</script>
