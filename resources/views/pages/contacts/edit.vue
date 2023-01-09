<template layout>
  <div>
    <h1 class="mb-8 text-3xl font-bold">
      <i18n-t keypath="contacts.edit.header">
        <template #name>
          <span class="text-sm">
            {{
              t("contacts.index.displayName", {
                first_name: form.fields.first_name,
                last_name: form.fields.last_name,
              })
            }}
          </span>
        </template>
      </i18n-t>
    </h1>

    <trashed-message v-if="contact.deleted_at" class="mb-6" @restore="restore">
      {{ t("users.edit.isDeleted") }}
    </trashed-message>

    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="form.submit">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input
            v-model="form.fields.first_name"
            :error="form.errors.first_name"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('contacts.attributes.first_name')"
            required
            :maxlength="100"
          />
          <text-input
            v-model="form.fields.last_name"
            :error="form.errors.last_name"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('contacts.attributes.last_name')"
            required
            :maxlength="100"
          />
          <select-input
            v-model.number="form.fields.organization_id"
            :error="form.errors.organization_id"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('contacts.attributes.organization_id')"
          >
            <option :value="null" />
            <option
              v-for="organization in organizations"
              :key="organization.id"
              :value="organization.id"
            >
              {{ organization.name }}
            </option>
          </select-input>
          <text-input
            v-model="form.fields.email"
            :error="form.errors.email"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('contacts.attributes.email')"
            type="email"
            :maxlength="50"
          />
          <text-input
            v-model="form.fields.phone"
            :error="form.errors.phone"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('contacts.attributes.phone')"
            :maxlength="50"
          />
          <text-input
            v-model="form.fields.address"
            :error="form.errors.address"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('contacts.attributes.address')"
            :maxlength="150"
          />
          <text-input
            v-model="form.fields.city"
            :error="form.errors.city"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('contacts.attributes.city')"
            :maxlength="50"
          />
          <text-input
            v-model="form.fields.region"
            :error="form.errors.region"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('contacts.attributes.region')"
            :maxlength="50"
          />
          <select-input
            v-model="form.fields.country"
            :error="form.errors.country"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('contacts.attributes.country')"
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
            :label="t('contacts.attributes.postal_code')"
          />
        </div>
        <div
          class="flex items-center justify-between px-8 py-4 bg-gray-50 border-t border-gray-100"
        >
          <button
            v-if="!contact.deleted_at"
            class="text-red-600 hover:underline"
            tabindex="-1"
            type="button"
            @click="destroy"
          >
            {{ t("contacts.edit.deleteLabel") }}
          </button>
          <loading-button
            :loading="form.processing"
            class="btn-indigo"
            type="submit"
          >
            {{ t("contacts.edit.updateLabel") }}
          </loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()

useHead({
  title: computed(() =>
    t("contacts.edit.title", {
      first_name: props.contact.data.first_name,
      last_name: props.contact.data.last_name,
    })
  ),
})

const props = defineProps<{
  contact: App.Data.EditContactData
  organizations: App.Data.OrganizationData[]
}>()

const form = useForm<App.Data.StoreContactData>({
  fields: props.contact.data,
  method: "PUT",
  url: route("contacts.update", { contact: props.contact.id }),
  transform: pickDefinedValues,
})

const destroy = () => {
  if (confirm(t("contacts.delete.confirmMessage"))) {
    router.delete(
      route("contacts.destroy", {
        contact: props.contact.id,
      })
    )
  }
}

const restore = () => {
  if (confirm(t("contacts.restore.confirmMessage"))) {
    router.put(
      route("contacts.restore", {
        contact: props.contact.id,
      })
    )
  }
}
</script>
