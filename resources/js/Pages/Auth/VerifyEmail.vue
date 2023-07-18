<template>
  <div class="flex flex-col gap-4">
    You need to be verified to access this content.
    <Link :href="route('verification.send')" method="post" as="button" class="btn-primary">Resend verification email</Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
