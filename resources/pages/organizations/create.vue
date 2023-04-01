<template layout>
  <div>
    <h1 class="mb-8 text-3xl font-bold">
      {{ t("organizations.create.header") }}
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="form.submit">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input
            v-model="form.fields.name"
            :error="form.errors.name"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('organizations.attributes.name')"
            required
            :maxlength="100"
          />
          <text-input
            v-model="form.fields.email"
            :error="form.errors.email"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('organizations.attributes.email')"
            type="email"
            :maxlength="50"
          />
          <text-input
            v-model="form.fields.phone"
            :error="form.errors.phone"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('organizations.attributes.phone')"
            :maxlength="50"
          />
          <text-input
            v-model="form.fields.address"
            :error="form.errors.address"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('organizations.attributes.address')"
            :maxlength="150"
          />
          <text-input
            v-model="form.fields.city"
            :error="form.errors.city"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('organizations.attributes.city')"
            :maxlength="50"
          />
          <text-input
            v-model="form.fields.region"
            :error="form.errors.region"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('organizations.attributes.region')"
            :maxlength="50"
          />
          <select-input
            v-model="form.fields.country"
            :error="form.errors.country"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('organizations.attributes.country')"
          >
            <option :value="null" />
            <option value="CA">
              {{ t("common.countries.CA") }}
            </option>
            <option value="US">
              {{ t("common.countries.US") }}
            </option>
          </select-input>
          <text-input
            v-model="form.fields.postal_code"
            :error="form.errors.postal_code"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('organizations.attributes.postal_code')"
          />
        </div>
        <div
          class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100"
        >
          <loading-button
            :loading="form.processing"
            class="btn-indigo"
            type="submit"
          >
            {{ t("organizations.create.createLabel") }}
          </loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()

useHead({ title: computed(() => t("organizations.create.title")) })

const form = useForm<App.Data.StoreOrganizationData>({
  fields: {
    name: "",
    email: null,
    phone: null,
    address: null,
    city: null,
    region: null,
    country: null,
    postal_code: null,
  },
  method: "POST",
  url: route("organizations.store"),
  transform: pickDefinedValues,
})
</script>
