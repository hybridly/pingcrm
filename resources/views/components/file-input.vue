<template>
  <div>
    <label v-if="label" class="form-label">{{ label }}</label>
    <div class="form-input p-0" :class="{ error: error }">
      <input
        ref="fileRef"
        type="file"
        :accept="accept"
        class="hidden"
        @change="onChange"
      />
      <div v-if="!modelValue" class="p-2">
        <button
          type="button"
          class="px-4 py-1 text-white text-xs font-medium bg-gray-500 hover:bg-gray-700 rounded-sm"
          @click="fileRef?.click"
        >
          Browse
        </button>
      </div>
      <div v-else class="flex items-center justify-between p-2">
        <div class="flex-1 pr-1">
          {{ modelValue.name }}
          <span class="text-gray-500 text-xs">({{ filesize }})</span>
        </div>
        <button
          type="button"
          class="px-4 py-1 text-white text-xs font-medium bg-gray-500 hover:bg-gray-700 rounded-sm"
          @click="onRemove"
        >
          Remove
        </button>
      </div>
    </div>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  modelValue?: File | null
  label?: string
  accept?: string
  error?: string
}>()

const fileRef = ref<HTMLInputElement | null>()

const emit = defineEmits<{
  (event: "update:modelValue", file?: File | null): void
}>()

const onChange = () => emit("update:modelValue", fileRef.value?.files?.item(0))

const onRemove = () => emit("update:modelValue", null)

const filesize = computed(() => {
  if (!props.modelValue) return
  const exponent = Math.floor(Math.log(props.modelValue.size) / Math.log(1024))
  return (
    Number((props.modelValue.size / Math.pow(1024, exponent)).toFixed(2)) +
    " " +
    ["B", "kB", "MB", "GB", "TB"][exponent]
  )
})
</script>
