<template>
  <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg font-medium">
          <Link :href="route('listing.index')">Listings</Link>
        </div>
        <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
          <Link :href="route('listing.index')">House market</Link>
        </div>
        <div v-if="user" class="flex items-center gap-4">
          <Link :href="route('realtor.listing.index')" class="text-sm">{{ user.name }}</Link>
          <Link :href="route('realtor.listing.create')" class="btn-primary">New Listing</Link>
          <Link :href="route('logout')" method="delete" as="button">Log out</Link>
        </div>
        <div v-else>
          <Link :href="route('login')">Log in</Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4">
    <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
      {{ flashSuccess }}
    </div>
    <slot>Default</slot>
  </main>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()
const user = computed(
  () => page.props.user,
)
const flashSuccess = computed(
  () => page.props.flash.success,
)
</script>
