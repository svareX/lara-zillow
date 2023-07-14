<template>
  <form @submit.prevent="store">
    <div>
      <div>
        <label>Beds</label>
        <input v-model.number="form.beds" type="number" />
        <div v-if="form.errors.beds">
          {{ form.errors.beds }}
        </div>
      </div>

      <div>
        <label>Baths</label>
        <input v-model.number="form.baths" type="number" />
        <div v-if="form.errors.baths">
          {{ form.errors.baths }}
        </div>
      </div>

      <div>
        <label>Area</label>
        <input v-model.number="form.area" type="number" />
        <div v-if="form.errors.area">
          {{ form.errors.area }}
        </div>
      </div>

      <div>
        <label>City</label>
        <input v-model="form.city" type="text" />
        <div v-if="form.errors.city">
          {{ form.errors.city }}
        </div>
      </div>

      <div>
        <label>Post Code</label>
        <input v-model="form.code" type="text" />
        <div v-if="form.errors.code">
          {{ form.errors.code }}
        </div>
      </div>

      <div>
        <label>Street</label>
        <input v-model="form.street" type="text" />
        <div v-if="form.errors.street">
          {{ form.errors.street }}
        </div>
      </div>

      <div>
        <label>Street Nr</label>
        <input v-model.number="form.street_nr" type="number" />
        <div v-if="form.errors.street_nr">
          {{ form.errors.street_nr }}
        </div>
      </div>

      <div>
        <label>Price</label>
        <input v-model.number="form.price" type="number" />
        <div v-if="form.errors.price">
          {{ form.errors.price }}
        </div>
      </div>

      <div>
        <button type="submit">Create</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
const form = useForm({
  beds: 0,
  baths: 0,
  area: 0,
  city: null,
  code: null,
  street: null,
  street_nr: null,
  price: 0,
})
const store = () => form.post(route('listing.store'))
</script>

  <style scoped>
  label {
    margin-right: 2em;
  }
  div {
    padding: 2px
  }
  </style>
