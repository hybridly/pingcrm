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
                <i-ic-baseline-dashboard class="mr-2 w-4 h-4" />
                <span>{{ t("dashboard.menuTitle") }}</span>
            </router-link>
        </div>
        <div class="mb-4">
            <router-link
                class="group flex items-center py-3"
                :class="
                    currentRoute.startsWith('organizations')
                        ? 'text-white'
                        : 'text-indigo-400 hover:text-white'
                "
                :href="route('organizations.index')"
            >
                <i-ic-baseline-groups class="mr-2 w-4 h-4" />
                <span>{{ t("organizations.menuTitle") }}</span>
            </router-link>
        </div>
        <div class="mb-4">
            <router-link
                class="group flex items-center py-3"
                :class="
                    currentRoute.startsWith('contacts')
                        ? 'text-white'
                        : 'text-indigo-400 hover:text-white'
                "
                :href="route('contacts.index')"
            >
                <i-ic-baseline-contacts class="mr-2 w-4 h-4" />
                <span>{{ t("contacts.menuTitle") }}</span>
            </router-link>
        </div>
    </div>
</template>

<script setup lang="ts">
const { t } = useI18n();
const currentRoute = useProperty("currentRoute");
</script>
