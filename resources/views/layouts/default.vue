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
                        <dropdown class="mt-1" placement="bottom-end">
                            <template #default>
                                <div
                                    class="group flex items-center cursor-pointer select-none"
                                >
                                    <div
                                        class="mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap"
                                    >
                                        <span>{{ user?.first_name }}</span>
                                        <span class="hidden md:inline"
                                            >&nbsp;{{ user?.last_name }}</span
                                        >
                                    </div>
                                    <i-ic-round-keyboard-arrow-down
                                        class="w-6 h-6 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600"
                                    />
                                </div>
                            </template>
                            <template #dropdown>
                                <div
                                    class="mt-2 py-2 text-sm bg-white rounded shadow-xl"
                                >
                                    <router-link
                                        class="block px-6 py-2 hover:text-white hover:bg-indigo-500"
                                        :href="`/users/${user?.id}/edit`"
                                        >My Profile</router-link
                                    >
                                    <router-link
                                        class="block px-6 py-2 hover:text-white hover:bg-indigo-500"
                                        href="/users"
                                        >Manage Users</router-link
                                    >
                                    <router-link
                                        class="block px-6 py-2 w-full text-left hover:text-white hover:bg-indigo-500"
                                        href="/logout"
                                        method="delete"
                                        as="button"
                                        >Logout</router-link
                                    >
                                </div>
                            </template>
                        </dropdown>
                    </div>
                </div>
                <div class="md:flex md:flex-grow md:overflow-hidden">
                    <main-menu
                        class="hidden flex-shrink-0 p-12 w-56 bg-indigo-800 overflow-y-auto md:block"
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
useHead({ titleTemplate: (title) => `${title} - Ping CRM` });

const user = useProperty("security.user");
</script>
