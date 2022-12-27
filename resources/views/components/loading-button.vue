<template>
  <button :disabled="loading" class="flex items-center">
    <i-line-md-loading-loop v-if="loading" class="mr-2" />
    <slot />
  </button>
</template>

<script setup lang="ts">
defineProps<{ loading: boolean }>()
</script>
