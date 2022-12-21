<template>
    <div>
        <label v-if="label" class="form-label" :for="id">{{ label }}</label>
        <select
            :id="id"
            v-model="inputValue"
            class="form-select"
            :class="{ error: error }"
            :required="required"
        >
            <slot />
        </select>
        <div v-if="error" class="form-error">{{ error }}</div>
    </div>
</template>

<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        id?: string;
        required?: boolean;
        error?: string;
        label?: string;
        modelValue: string | null;
    }>(),
    {
        id: () => `select-input-${uid()}`,
    }
);

const emit = defineEmits(["update:modelValue"]);

const inputValue = computed({
    get: () => props.modelValue,
    set: (newValue) => emit("update:modelValue", newValue),
});
</script>
