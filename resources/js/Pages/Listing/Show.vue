<template>
  <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box v-if="listing.images.length" class="md:col-span-7 flex items-center">
      <div class="grid grid-cols-2 gap-1">
        <img
          v-for="image in listing.images" :key="image.id"
          :src="image.src" class="hover:cursor-pointer"
          @click="() => showImg(index)"
        />
      </div>
      <vue-easy-lightbox :visible="visibleRef" :imgs="listing.images" :index="indexRef" @hide="onHide" />
    </Box>
    <EmptyState v-else class="md:col-span-7 flex items-center">No images</EmptyState>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>
        <template #header>
          Basic info
        </template>
        <Price :price="listing.price" class="text-2xl font-bold mr-3" />
        <div
          v-if="listing.sold_at != null"
          class="text-xs font-bold uppercase border border-dashed p-1 relative bottom-1  border-green-300 text-green-500 dark:border-green-600 dark:text-green-600 inline-block rounded-md"
        >
          sold
        </div>
        <ListingSpace :listing="listing" class="text-lg" />
        <ListingAddress :listing="listing" class="text-gray-500" />
      </Box>

      <Box>
        <template #header>
          Monthly Payment
        </template>
        <div>
          <label class="label">Interest rate ({{ interest }} % )</label>
          <input
            v-model="interest"
            type="range" min="0.1" max="15" step="0.1"
            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
          />

          <label class="label">Duration ({{ duration }} years)</label>
          <input
            v-model="duration"
            type="range" min="3" max="35" step="1"
            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
          />

          <div class="text-gray-600 dark:text-gray-300 mt-2">
            <div class="text-gray-400">Your monthly payment</div>
            <Price :price="monthlyPayment" class="text-3xl" />
          </div>

          <div class="mt-2 text-gray-500">
            <div class="flex justify-between">
              <div>Total paid</div>
              <div>
                <Price :price="totalPaid" class="font-medium" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Principal paid</div>
              <div>
                <Price :price="listing.price" class="font-medium" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Interest paid</div>
              <div>
                <Price :price="totalInterest" class="font-medium" />
              </div>
            </div>
          </div>
        </div>
      </Box>
      <div v-if="user && user.id !== listing.owner.id">
        <MakeOffer v-if="user && !offerMade" :listing-id="listing.id" :price="listing.price" @offer-updated="offer = $event" />
        <OfferMade v-if="user && offerMade" :offer="offerMade" />
      </div>
    </div>
  </div>
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import MakeOffer from '@/Pages/Listing/Components/Show/MakeOffer.vue'
import OfferMade from '@/Pages/Listing/Components/Show/OfferMade.vue'
import EmptyState from '@/Components/UI/EmptyState.vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const user = computed(() => page.props.user)
const props = defineProps({
  listing: Object,
  offerMade: Object,
})

const interest = ref(5)
const duration = ref(20)
const offer = ref(props.listing.price)

const {monthlyPayment, totalPaid, totalInterest} = useMonthlyPayment(offer, interest, duration)

const visibleRef = ref(false)
const indexRef = ref(0)
const showImg = (index) => {
  indexRef.value = index
  visibleRef.value = true
}
const onHide = () => visibleRef.value = false


</script>
