<template layout>
  <div>
    <h1 class="mb-8 text-3xl font-bold">
      <i18n-t keypath="users.edit.header">
        <template #name>
          <span class="text-sm">
            {{
              t("users.index.displayName", {
                first_name: form.fields.first_name,
                last_name: form.fields.last_name,
              })
            }}
          </span>
        </template>
      </i18n-t>
    </h1>

    <trashed-message v-if="user.deleted_at" class="mb-6" @restore="restore">
      {{ t("users.edit.isDeleted") }}
    </trashed-message>

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
          class="flex items-center justify-between px-8 py-4 bg-gray-50 border-t border-gray-100"
        >
          <button
            v-if="!user.deleted_at"
            class="text-red-600 hover:underline"
            tabindex="-1"
            type="button"
            @click="destroy"
          >
            {{ t("users.edit.deleteLabel") }}
          </button>
          <loading-button
            :loading="form.processing"
            class="btn-indigo"
            type="submit"
          >
            {{ t("users.edit.updateLabel") }}
          </loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()

const props = defineProps<{ user: App.Data.EditUserData }>()

useHead({
  title: computed(() =>
    t("users.edit.title", {
      first_name: props.user.data.first_name,
      last_name: props.user.data.last_name,
    })
  ),
})

const form = useForm<App.Data.StoreUserData>({
  fields: props.user.data,
  method: "PUT",
  url: route("users.update", { user: props.user.id }),
  transform: pickDefinedValues,
})

const destroy = () => {
  if (confirm(t("users.delete.confirmMessage"))) {
    router.delete(
      route("users.destroy", {
        user: props.user.id,
      })
    )
  }
}

const restore = () => {
  if (confirm(t("users.restore.confirmMessage"))) {
    router.put(
      route("users.restore", {
        user: props.user.id,
      })
    )
  }
}
</script>
