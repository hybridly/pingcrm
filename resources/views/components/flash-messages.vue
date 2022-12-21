<template>
    <div v-if="show">
        <div
            v-if="flash.success"
            class="flex items-center justify-between mb-8 max-w-3xl bg-green-500 rounded"
        >
            <div class="flex items-center">
                <i-ic-baseline-check
                    class="flex-shrink-0 ml-3 mr-2 w-6 h-6 text-white"
                />
                <div class="py-4 text-white text-sm font-medium">
                    {{ flash.success }}
                </div>
            </div>
            <button type="button" class="group mr-2 p-2" @click="show = false">
                <i-ic-baseline-close
                    class="block w-3 h-3 text-green-800 group-hover:text-white"
                />
            </button>
        </div>
        <div
            v-if="flash.error || Object.keys(errors).length > 0"
            class="flex items-center justify-between mb-8 max-w-3xl bg-red-500 rounded"
        >
            <div class="flex items-center">
                <i-ic-baseline-error-outline
                    class="flex-shrink-0 ml-4 mr-2 w-5 h-5 text-white"
                />
                <div
                    v-if="flash.error"
                    class="py-4 text-white text-sm font-medium"
                >
                    {{ flash.error }}
                </div>
                <div v-else class="py-4 text-white text-sm font-medium">
                    {{
                        t("common.formError", {
                            count: Object.keys(errors).length,
                        })
                    }}
                </div>
            </div>
            <button type="button" class="group mr-2 p-2" @click="show = false">
                <i-ic-baseline-close
                    class="block w-3 h-3 text-red-800 group-hover:text-white"
                />
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
const { t } = useI18n();
const flash = useProperty("flash");
const errors = useProperty("errors");
const show = ref(true);
</script>
