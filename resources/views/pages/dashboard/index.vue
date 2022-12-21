<template layout>
    <div>
        <h1 class="mb-8 text-3xl font-bold">{{ t("dashboard.header") }}</h1>
        <p class="mb-8 leading-normal">
            <i18n-t keypath="dashboard.welcomeMessage">
                <template #hybridly>
                    <a
                        class="text-indigo-500 hover:text-orange-600 underline"
                        href="https://hybridly.dev/"
                        >{{ $t("common.hybridly") }}</a
                    >
                </template>
            </i18n-t>
        </p>
    </div>
</template>

<script setup lang="ts">
const { t } = useI18n();

useHead({ title: t("dashboard.title") });
</script>
