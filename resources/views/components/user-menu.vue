<template>
  <dropdown placement="bottom-end">
    <template #default>
      <div class="group flex items-center cursor-pointer select-none">
        <div
          class="mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap"
        >
          <span>{{ user?.first_name }}</span>
          <span class="hidden md:inline">&nbsp;{{ user?.last_name }}</span>
        </div>
        <i-ic-round-keyboard-arrow-down
          class="w-6 h-6 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600"
        />
      </div>
    </template>
    <template #dropdown>
      <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
        <router-link
          class="block px-6 py-2 hover:text-white hover:bg-indigo-500"
          :href="`/users/${user?.id}/edit`"
        >
          {{ t("common.myProfile") }}
        </router-link>
        <router-link
          class="block px-6 py-2 hover:text-white hover:bg-indigo-500"
          href="/users"
        >
          {{ t("common.manageUsers") }}
        </router-link>
        <router-link
          class="block px-6 py-2 w-full text-left hover:text-white hover:bg-indigo-500"
          href="/logout"
          method="delete"
          as="button"
        >
          {{ t("common.logoutLabel") }}
        </router-link>
      </div>
    </template>
  </dropdown>
</template>

<script setup lang="ts">
const { t } = useI18n()
const user = useProperty("security.user")
</script>
