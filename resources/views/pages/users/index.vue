<template layout>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      {{ t("users.index.header") }}
    </h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.keyword"
        class="w-full max-w-md mr-4"
        @reset="onReset"
      >
        <label class="block text-gray-700">
          {{ t("users.index.roleLabel") }}
        </label>
        <select v-model="form.roleOption" class="form-select mt-1 w-full">
          <option :value="null">
            {{ t("users.index.allRoles") }}
          </option>
          <option value="user">
            {{ t("users.index.userRole") }}
          </option>
          <option value="owner">
            {{ t("users.index.ownerRole") }}
          </option>
        </select>
        <label class="block text-gray-700">
          {{ t("users.index.trashedLabel") }}
        </label>
        <select v-model="form.trashedOption" class="mt-1 w-full form-select">
          <option :value="null">
            {{ t("users.index.noTrashed") }}
          </option>
          <option value="with">
            {{ t("users.index.withTrashed") }}
          </option>
          <option value="only">
            {{ t("users.index.onlyTrashed") }}
          </option>
        </select>
      </search-filter>
      <router-link class="btn-indigo" :href="route('users.create')">
        <span class="md:hidden">
          {{ t("users.index.createUserMobile") }}
        </span>
        <span class="hidden md:inline">
          {{ t("users.index.createUser") }}
        </span>
      </router-link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4">
            {{ t("users.attributes.name") }}
          </th>
          <th class="px-6 pt-6 pb-4">
            {{ t("users.attributes.email") }}
          </th>
          <th class="px-6 pt-6 pb-4" colspan="2">
            {{ t("users.attributes.role") }}
          </th>
        </tr>
        <tr
          v-for="user in users.data"
          :key="user.id"
          class="hover:bg-gray-100 focus-within:bg-gray-100"
        >
          <td class="border-t">
            <router-link
              class="px-6 py-4 flex items-center focus:text-indigo-500"
              :href="editLink(user)"
            >
              <img
                v-if="user.photo_path"
                class="block -my-2 mr-2 w-5 h-5 rounded-full"
                :src="user.photo_path"
              />
              {{
                t("users.index.displayName", {
                  first_name: user.first_name,
                  last_name: user.last_name,
                })
              }}
              <i-ic-baseline-delete
                v-if="user.deleted_at"
                class="flex-shrink-0 w-4 h-4 text-gray-400 ml-2"
              />
            </router-link>
          </td>
          <td class="border-t">
            <router-link
              class="px-6 py-4 flex items-center"
              tabindex="-1"
              :href="editLink(user)"
            >
              {{ user.email }}
            </router-link>
          </td>
          <td class="border-t">
            <router-link
              class="px-6 py-4 flex items-center"
              tabindex="-1"
              :href="editLink(user)"
            >
              {{
                user.role === "owner"
                  ? t("users.index.ownerRole")
                  : t("users.index.userRole")
              }}
            </router-link>
          </td>
          <td class="border-t w-px">
            <router-link
              class="px-4 flex items-center"
              tabindex="-1"
              :href="editLink(user)"
            >
              <i-ic-round-keyboard-arrow-right class="w-7 h-7 text-gray-400" />
            </router-link>
          </td>
        </tr>
        <tr v-if="users.data.length === 0">
          <td class="border-t px-6 py-4" colspan="4">
            {{ t("users.index.noneFound") }}
          </td>
        </tr>
      </table>
    </div>
    <pagination v-if="users.links" class="mt-6" :links="users.links" />
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()

useHead({ title: computed(() => t("users.index.title")) })

const props = defineProps<{
  filters: App.Data.UserSearchData
  users: Paginator<App.Data.UserData>
}>()
const form = ref(props.filters)

const throttledSubmit = useThrottleFn(() => {
  router.get(route("users.index"), {
    data: pickDefinedValues(form.value),
    preserveState: true,
  })
}, 250)
watch(form, throttledSubmit, { deep: true })

const onReset = () => {
  form.value = mapValuesToNull(form)
}

const editLink = (user: App.Data.UserData) =>
  route("users.edit", {
    user: user.id,
  })
</script>
