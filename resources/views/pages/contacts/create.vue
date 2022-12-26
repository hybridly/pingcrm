<template layout>
    <div>
        <h1 class="mb-8 text-3xl font-bold">
            {{ t("contacts.create.header") }}
        </h1>
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="form.submit">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input
                        v-model="form.fields.first_name"
                        :error="form.errors.first_name"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.first_name')"
                        required
                        :maxlength="100"
                    />
                    <text-input
                        v-model="form.fields.last_name"
                        :error="form.errors.last_name"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.last_name')"
                        required
                        :maxlength="100"
                    />
                    <select-input
                        v-model.number="form.fields.organization_id"
                        :error="form.errors.organization_id"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.organization_id')"
                    >
                        <option :value="null" />
                        <option
                            v-for="organization in organizations"
                            :key="organization.id"
                            :value="organization.id"
                        >
                            {{ organization.name }}
                        </option>
                    </select-input>
                    <text-input
                        v-model="form.fields.email"
                        :error="form.errors.email"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.email')"
                        type="email"
                        :maxlength="50"
                    />
                    <text-input
                        v-model="form.fields.phone"
                        :error="form.errors.phone"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.phone')"
                        :maxlength="50"
                    />
                    <text-input
                        v-model="form.fields.address"
                        :error="form.errors.address"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.address')"
                        :maxlength="150"
                    />
                    <text-input
                        v-model="form.fields.city"
                        :error="form.errors.city"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.city')"
                        :maxlength="50"
                    />
                    <text-input
                        v-model="form.fields.region"
                        :error="form.errors.region"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.region')"
                        :maxlength="50"
                    />
                    <select-input
                        v-model="form.fields.country"
                        :error="form.errors.country"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.country')"
                    >
                        <option :value="null" />
                        <option value="CA">
                            {{ t("common.countries.CA") }}
                        </option>
                        <option value="US">
                            {{ t("common.countries.US") }}
                        </option>
                    </select-input>
                    <text-input
                        v-model="form.fields.postal_code"
                        :error="form.errors.postal_code"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        :label="t('contacts.attributes.postal_code')"
                    />
                </div>
                <div
                    class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100"
                >
                    <loading-button
                        :loading="form.processing"
                        class="btn-indigo"
                        type="submit"
                    >
                        {{ t("contacts.create.createLabel") }}
                    </loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
const { t } = useI18n();

useHead({ title: computed(() => t("contacts.create.title")) });

defineProps<{ organizations: App.Data.OrganizationData[] }>();

const form = useForm<App.Data.StoreContactData>({
    fields: {
        first_name: "",
        last_name: "",
        organization_id: null,
        email: null,
        phone: null,
        address: null,
        city: null,
        region: null,
        country: null,
        postal_code: null,
    },
    method: "POST",
    url: route("contacts.store"),
    transform: pickDefinedValues,
});
</script>
