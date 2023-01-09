<template layout>
  <div>
    <h1 class="mb-8 text-3xl font-bold">
      {{ t("users.create.header") }}
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="form.submit">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input
            v-model="form.fields.first_name"
            :error="form.errors.first_name"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('users.attributes.first_name')"
            required
            :maxlength="25"
          />
          <text-input
            v-model="form.fields.last_name"
            :error="form.errors.last_name"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('users.attributes.last_name')"
            required
            :maxlength="25"
          />
          <text-input
            v-model="form.fields.email"
            type="email"
            :error="form.errors.email"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('users.attributes.email')"
            required
            :maxlength="50"
          />
          <text-input
            v-model="form.fields.password"
            type="password"
            :error="form.errors.password"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('users.attributes.password')"
            required
            :maxlength="255"
          />
          <select-input
            v-model="form.fields.role"
            :error="form.errors.role"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('users.attributes.role')"
            required
          >
            <option value="user">
              {{ t("users.index.userRole") }}
            </option>
            <option value="owner">
              {{ t("users.index.ownerRole") }}
            </option>
          </select-input>

          <file-input
            v-model="form.fields.photo_file"
            :error="form.errors.photo_file"
            class="pb-8 pr-6 w-full lg:w-1/2"
            :label="t('users.attributes.photo_path')"
            accept="image/*"
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
            {{ t("users.create.createLabel") }}
          </loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()

useHead({ title: computed(() => t("users.create.title")) })

const form = useForm<App.Data.StoreUserData>({
  fields: {
    first_name: "",
    last_name: "",
    email: "",
    password: null,
    role: "user",
    photo_file: null,
    user_id: null,
  },
  method: "POST",
  url: route("users.store"),
  transform: pickDefinedValues,
})
</script>
