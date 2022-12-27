<template>
  <dropdown>
    <template #default>
      <i-ic-baseline-translate
        class="w-6 h-6 mr-1 text-gray-700 hover:text-indigo-600 focus:text-indigo-600 cursor-pointer select-none"
      />
    </template>
    <template #dropdown>
      <div class="mt-2 text-sm bg-white rounded shadow-xl">
        <router-link
          v-for="locale in availableLocales"
          :key="locale"
          as="button"
          method="POST"
          class="block py-2 px-6 w-full rounded-t hover:text-white hover:bg-indigo-500"
          :class="{
            'text-white bg-indigo-500': currentLocale === locale,
          }"
          :href="route('locale.set', { locale })"
        >
          {{ t(`locales.${locale}`) }}
        </router-link>
      </div>
    </template>
  </dropdown>
</template>

<script setup lang="ts">
const { t, availableLocales } = useI18n()
const currentLocale = useProperty("locale")
</script>
