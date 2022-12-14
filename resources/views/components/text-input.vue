<template>
    <div>
        <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
        <input
            :id="id"
            ref="input"
            v-model="inputValue"
            class="form-input"
            :class="{ error: error }"
            :type="type"
            :autofocus="autofocus"
            :autocapitalize="autocapitalize"
        />
        <div v-if="error" class="form-error">{{ error }}</div>
    </div>
</template>

<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        id?: string;
        type?: string;
        autofocus?: boolean;
        // eslint-disable-next-line vue/require-default-prop
        autocapitalize?: string;
        error: string;
        label: string;
        modelValue: string;
    }>(),
    {
        id: () => `text-input-${uid()}`,
        type: "text",
    }
);

const emit = defineEmits(["update:modelValue"]);

const inputValue = computed({
    get: () => props.modelValue,
    set: (newValue) => emit("update:modelValue", newValue),
});
</script>
