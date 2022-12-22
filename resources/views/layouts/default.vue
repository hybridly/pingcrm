<template>
    <div>
        <div id="dropdown" />
        <div class="md:flex md:flex-col">
            <div class="md:flex md:flex-col md:h-screen">
                <div class="md:flex md:flex-shrink-0">
                    <div
                        class="flex items-center justify-between px-6 py-4 bg-indigo-900 md:flex-shrink-0 md:justify-center md:w-56"
                    >
                        <router-link class="mt-1" href="/">
                            <logo class="fill-white" width="120" height="28" />
                        </router-link>
                        <dropdown class="md:hidden" placement="bottom-end">
                            <template #default>
                                <i-ic-baseline-menu
                                    class="w-8 h-8 text-white"
                                />
                            </template>
                            <template #dropdown>
                                <div
                                    class="mt-2 px-8 py-4 bg-indigo-800 rounded shadow-lg"
                                >
                                    <main-menu />
                                </div>
                            </template>
                        </dropdown>
                    </div>
                    <div
                        class="md:text-md flex items-center justify-between p-4 w-full text-sm bg-white border-b md:px-12 md:py-0"
                    >
                        <div class="mr-4 mt-1">
                            {{ user?.account.name }}
                        </div>
                        <div class="mt-1 flex gap-x-3">
                            <locale-switcher />
                            <user-menu />
                        </div>
                    </div>
                </div>
                <div class="md:flex md:flex-grow md:overflow-hidden">
                    <main-menu
                        class="hidden flex-shrink-0 p-11 w-56 bg-indigo-800 overflow-y-auto md:block"
                    />
                    <div
                        class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto"
                        scroll-region
                    >
                        <flash-messages />
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const { t } = useI18n();

useHead({ titleTemplate: (title) => t("common.titleTemplate", { title }) });

const user = useProperty("security.user");
</script>
