<template>
    <div>
        <div class="mb-4">
            <router-link
                class="group flex items-center py-3"
                :class="
                    currentRoute === 'dashboard.index'
                        ? 'text-white'
                        : 'text-indigo-400 hover:text-white'
                "
                :href="route('dashboard.index')"
            >
                <i-ic-baseline-dashboard
                    name="dashboard"
                    class="mr-2 w-4 h-4"
                />
                <span>Dashboard</span>
            </router-link>
        </div>
    </div>
</template>

<script setup lang="ts">
const currentRoute = useProperty("currentRoute");
</script>
