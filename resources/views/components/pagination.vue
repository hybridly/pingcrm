<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, key) in links">
                <div
                    v-if="link.url === null"
                    :key="key"
                    class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm leading-4 border rounded cursor-not-allowed select-none"
                >
                    {{ link.label }}
                </div>
                <router-link
                    v-else
                    :key="`link-${key}`"
                    class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded"
                    :class="{ 'bg-white': link.active }"
                    :href="link.url"
                >
                    {{ link.label }}
                </router-link>
            </template>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps<{ links: NonNullable<Paginator["links"]> }>();
</script>
