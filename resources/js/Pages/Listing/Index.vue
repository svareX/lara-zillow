<template>
  <div v-for="listing in listings" :key="listing.id">
    <Link :href="route('listing.show', listing.id)">
      <div>
        <ListingDisplayInfo :listing="listing" />
      </div>
    </Link>
    <Link :href="route('listing.edit', listing.id)">Edit</Link>
    <Link :href="route('listing.destroy', listing.id)" method="delete" as="button">Delete</Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import ListingDisplayInfo from '@/Components/ListingDisplayInfo.vue'
defineProps({
  listings: Array,
})
</script>
