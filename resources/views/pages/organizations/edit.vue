<template layout>
    <div>
        <h1 class="mb-8 text-3xl font-bold">
            <i18n-t keypath="organizations.edit.header">
                <template #name>
                    <span class="text-sm">
                        {{ form.fields.name }}
                    </span>
                </template>
            </i18n-t>
        </h1>
        <trashed-message
            v-if="organization.deleted_at"
            class="mb-6"
            @restore="restore"
        >
            {{ t("organizations.edit.isDeleted") }}
        </trashed-message>
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="form.submit">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input
                        v-model="form.fields.name"
                        :error="form.errors.name"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('organizations.attributes.name')"
                        required
                        :maxlength="100"
                    />
                    <text-input
                        v-model="form.fields.email"
                        :error="form.errors.email"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('organizations.attributes.email')"
                        type="email"
                        :maxlength="50"
                    />
                    <text-input
                        v-model="form.fields.phone"
                        :error="form.errors.phone"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('organizations.attributes.phone')"
                        :maxlength="50"
                    />
                    <text-input
                        v-model="form.fields.address"
                        :error="form.errors.address"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('organizations.attributes.address')"
                        :maxlength="150"
                    />
                    <text-input
                        v-model="form.fields.city"
                        :error="form.errors.city"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('organizations.attributes.city')"
                        :maxlength="50"
                    />
                    <text-input
                        v-model="form.fields.region"
                        :error="form.errors.region"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('organizations.attributes.region')"
                        :maxlength="50"
                    />
                    <select-input
                        v-model="form.fields.country"
                        :error="form.errors.country"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('organizations.attributes.country')"
                    >
                        <option :value="null" />
                        <option value="CA">
                            {{ t("organizations.countries.CA") }}
                        </option>
                        <option value="US">
                            {{ t("organizations.countries.US") }}
                        </option>
                    </select-input>
                    <text-input
                        v-model="form.fields.postal_code"
                        :error="form.errors.postal_code"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('organizations.attributes.postal_code')"
                    />
                </div>
                <div
                    class="flex items-center justify-between px-8 py-4 bg-gray-50 border-t border-gray-100"
                >
                    <button
                        v-if="!organization.deleted_at"
                        class="text-red-600 hover:underline"
                        tabindex="-1"
                        type="button"
                        @click="destroy"
                    >
                        {{ t("organizations.edit.deleteLabel") }}
                    </button>
                    <loading-button
                        :loading="form.processing"
                        class="btn-indigo"
                        type="submit"
                    >
                        {{ t("organizations.edit.updateLabel") }}
                    </loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
const { t } = useI18n();

const props = defineProps<{
    organization: App.Data.EditOrganizationData;
}>();
useHead({
    title: t("organizations.edit.title", {
        name: props.organization.data.name,
    }),
});

const form = useForm<App.Data.StoreOrganizationData>({
    fields: props.organization.data,
    method: "PUT",
    url: route("organizations.update", { organization: props.organization.id }),
});

const destroy = () => {
    if (confirm(t("organizations.delete.confirmMessage"))) {
        router.delete(
            route("organizations.destroy", {
                organization: props.organization.id,
            })
        );
    }
};

const restore = () => {
    if (confirm(t("organizations.restore.confirmMessage"))) {
        router.put(
            route("organizations.restore", {
                organization: props.organization.id,
            })
        );
    }
};
</script>
