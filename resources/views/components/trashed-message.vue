<template>
    <div
        class="flex items-center justify-between p-4 max-w-3xl bg-yellow-400 text-yellow-800 rounded"
    >
        <div class="flex items-center">
            <i-ic-baseline-delete class="mr-1 w-5 h-5" />
            <div class="text-sm font-medium">
                <slot />
            </div>
        </div>
        <button
            class="hover:underline text-sm"
            tabindex="-1"
            type="button"
            @click="$emit('restore')"
        >
            Restore
        </button>
    </div>
</template>

<script setup lang="ts">
defineEmits(["restore"]);
</script>
