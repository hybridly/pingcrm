<template layout>
    <div>
        <h1 class="mb-8 text-3xl font-bold">
            <router-link
                class="text-indigo-400 hover:text-indigo-600"
                :href="route('organizations.index')"
            >
                Organizations
            </router-link>
            <span class="text-indigo-400 font-medium">/</span>
            {{ form.fields.name }}
        </h1>
        <trashed-message
            v-if="organization.deleted_at"
            class="mb-6"
            @restore="restore"
        >
            This organization has been deleted.
        </trashed-message>
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="form.submit">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input
                        v-model="form.fields.name"
                        :error="form.errors.name"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Name"
                        required
                        :maxlength="100"
                    />
                    <text-input
                        v-model="form.fields.email"
                        :error="form.errors.email"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Email"
                        type="email"
                        :maxlength="50"
                    />
                    <text-input
                        v-model="form.fields.phone"
                        :error="form.errors.phone"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Phone"
                        :maxlength="50"
                    />
                    <text-input
                        v-model="form.fields.address"
                        :error="form.errors.address"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Address"
                        :maxlength="150"
                    />
                    <text-input
                        v-model="form.fields.city"
                        :error="form.errors.city"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="City"
                        :maxlength="50"
                    />
                    <text-input
                        v-model="form.fields.region"
                        :error="form.errors.region"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Province/State"
                        :maxlength="50"
                    />
                    <select-input
                        v-model="form.fields.country"
                        :error="form.errors.country"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Country"
                    >
                        <option :value="null" />
                        <option value="CA">Canada</option>
                        <option value="US">United States</option>
                    </select-input>
                    <text-input
                        v-model="form.fields.postal_code"
                        :error="form.errors.postal_code"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Postal code"
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
                        Delete Organization
                    </button>
                    <loading-button
                        :loading="form.processing"
                        class="btn-indigo"
                        type="submit"
                    >
                        Update Organization
                    </loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
const props = defineProps<{
    organization: App.Data.EditOrganizationData;
}>();
useHead({ title: props.organization.data.name });

const form = useForm<App.Data.StoreOrganizationData>({
    fields: props.organization.data,
    method: "PUT",
    url: route("organizations.update", { organization: props.organization.id }),
});

const destroy = () => {
    if (confirm("Are you sure you want to delete this organization?")) {
        router.delete(
            route("organizations.destroy", {
                organization: props.organization.id,
            })
        );
    }
};

const restore = () => {
    if (confirm("Are you sure you want to restore this organization?")) {
        router.put(
            route("organizations.restore", {
                organization: props.organization.id,
            })
        );
    }
};
</script>
