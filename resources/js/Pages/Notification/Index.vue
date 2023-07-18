<template>
  <h1 class="text-3xl mb-4">Your Notifications</h1>

  <section v-if="notifications.data.length" class="text-gray-700 dark:text-gray-400">
    <div
      v-for="notification in notifications.data" :key="notification.id" class="border rounded-md mt-3 p-3 border-gray-200 dark:border-gray-800 flex justify-between items-center hover:bg-gray-800"
      @mouseover="markAsRead(notification)"
    >
      <div>
        <span v-if="notification.type === 'App\\Notifications\\OfferMade'">
          Offer <Price :price="notification.data.amount" /> for
          <Link
            :href="route('realtor.listing.show', { listing: notification.data.listing_id })"
            class="text-indigo-600 dark:text-indigo-400"
          >listing</Link> was made
        </span>

        <span v-if="notification.type === 'App\\Notifications\\OfferAccepted'">
          Offer <Price :price="notification.data.amount" /> for
          <Link
            :href="route('realtor.listing.show', { listing: notification.data.listing_id })"
            class="text-indigo-600 dark:text-indigo-400"
          >listing</Link> has been accepted
        </span>

        <span v-if="notification.type === 'App\\Notifications\\OfferRejected'">
          Offer <Price :price="notification.data.amount" /> for
          <Link
            :href="route('realtor.listing.show', { listing: notification.data.listing_id })"
            class="text-indigo-600 dark:text-indigo-400"
          >listing</Link> has been rejected
        </span>
      </div>
      <div>
        <Link
          v-if="!notification.read_at" :href="route('notification.seen', notification)"
          as="button"
          method="put" class="btn-outline text-xs font-medium uppercase"
        >
          Mark as read
        </Link>
      </div>
    </div>
  </section>

  <EmptyState v-else>No notifications yet!</EmptyState>

  <section
    v-if="notifications.data.length"
    class="w-full flex justify-center"
  >
    <Pagination :links="notifications.links" />
  </section>
</template>

<script setup>
import Price from '@/Components/Price.vue'
import EmptyState from '@/Components/UI/EmptyState.vue'
import Pagination from '@/Components/UI/Pagination.vue'
import { Link, router } from '@inertiajs/vue3'
defineProps({
  notifications: Object,
})

function markAsRead(notification) {
  if (!notification.read_at) {
    router.put(route('notification.seen', notification), {}, {
      preserveState: true,
      preserveScroll: true})
  }
}
</script>
