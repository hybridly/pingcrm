<template>
    <div class="flex items-center">
        <div class="flex w-full bg-white rounded shadow">
            <dropdown
                class="focus:z-10 px-4 hover:bg-gray-100 border-r focus:border-white rounded-l focus:ring md:px-6"
                placement="bottom-start"
            >
                <template #default>
                    <div class="flex items-baseline">
                        <span class="hidden text-gray-700 md:inline">
                            {{ t("common.filterLabel") }}
                        </span>
                        <svg
                            class="w-2 h-2 fill-gray-700 md:ml-2"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 961.243 599.998"
                        >
                            <path
                                d="M239.998 239.999L0 0h961.243L721.246 240c-131.999 132-240.28 240-240.624 239.999-.345-.001-108.625-108.001-240.624-240z"
                            />
                        </svg>
                    </div>
                </template>
                <template #dropdown>
                    <div
                        class="mt-2 px-4 py-6 w-screen bg-white rounded shadow-xl max-w-xs"
                    >
                        <slot />
                    </div>
                </template>
            </dropdown>
            <input
                v-model="keyword"
                class="relative px-6 py-3 w-full rounded-r focus:shadow-outline"
                autocomplete="off"
                type="text"
                name="search"
                :placeholder="t('common.searchPlaceholder')"
            />
        </div>
        <button
            class="ml-3 text-gray-500 hover:text-gray-700 focus:text-indigo-500 text-sm min-w-max"
            type="button"
            @click="$emit('reset')"
        >
            {{ t("common.resetLabel") }}
        </button>
    </div>
</template>

<script setup lang="ts">
const { t } = useI18n();

const props = defineProps<{ modelValue: string | null }>();
const emit = defineEmits<{
    (e: "update:modelValue", value: string | null): void;
    (e: "reset"): void;
}>();

const keyword = computed({
    get: () => props.modelValue,
    set: (newValue: string | null) => emit("update:modelValue", newValue),
});
</script>
