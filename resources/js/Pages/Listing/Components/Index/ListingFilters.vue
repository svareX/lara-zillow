<template>
  <form>
    <div class="mb-8 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center">
        <input
          v-model.number="filterForm.priceFrom"
          type="number" placeholder="Price from"
          class="input-filter-l w-28 number"
        />
        <input
          v-model.number="filterForm.priceTo"
          type="number" placeholder="Price to"
          class="input-filter-r w-28 number"
        />
      </div>

      <div class="flex flex-nowrap items-center">
        <select v-model.number="filterForm.beds" class="input-filter-l w-28">
          <option :value="null">Beds</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
        <select v-model.number="filterForm.baths" class="input-filter-r w-28">
          <option :value="null">Baths</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
      </div>

      <div class="flex flex-nowrap items-center">
        <input
          v-model.number="filterForm.areaFrom"
          type="number" placeholder="Area from"
          class="input-filter-l w-28 number"
        />
        <input
          v-model.number="filterForm.areaTo"
          type="number" placeholder="Area to"
          class="input-filter-r w-28 number"
        />
      </div>
      <button type="reset" class="btn-outline" @click="clear">Clear filters</button>
    </div>
  </form>
</template>

<script setup>
import {router} from '@inertiajs/vue3'
import { reactive, watch } from 'vue'
import { debounce } from 'lodash'

const props = defineProps({
  filters: Object,
})
const clear = () => {
  filterForm.priceFrom = null
  filterForm.priceTo = null
  filterForm.beds = null
  filterForm.baths = null
  filterForm.areaFrom = null
  filterForm.areaTo = null
}


const filterForm = reactive({
  priceFrom: props.filters.priceFrom ?? null,
  priceTo: props.filters.priceTo ?? null,
  beds: props.filters.beds ?? null,
  baths: props.filters.baths ?? null,
  areaFrom: props.filters.areaFrom ?? null,
  areaTo: props.filters.areaTo ?? null,
})
watch(
  filterForm, debounce(() => router.get(
    route('listing.index'),
    filterForm,
    { preserveState: true, preserveScroll: true },
  ), 1111),
)
</script>
