<template layout>
    <div>
        <h1 class="mb-8 font-bold text-3xl">Organizations</h1>
        <div class="mb-6 flex justify-between items-center">
            <search-filter
                v-model="form.keyword"
                class="w-full max-w-md mr-4"
                @reset="onReset"
            >
                <label class="block text-gray-700">Trashed:</label>
                <select
                    v-model="form.trashedOption"
                    class="mt-1 w-full form-select"
                >
                    <option :value="null">No Trashed</option>
                    <option value="with">With Trashed</option>
                    <option value="only">Only Trashed</option>
                </select>
            </search-filter>
            <router-link
                class="btn-indigo"
                :href="route('organizations.create')"
            >
                <span>Create</span>
                <span class="hidden md:inline">&nbsp;Organization</span>
            </router-link>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-6 pt-6 pb-4">Name</th>
                    <th class="px-6 pt-6 pb-4">City</th>
                    <th class="px-6 pt-6 pb-4" colspan="2">Phone</th>
                </tr>
                <tr
                    v-for="organization in organizations.data"
                    :key="organization.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <router-link
                            class="px-6 py-4 flex items-center focus:text-indigo-500"
                            :href="editLink(organization)"
                        >
                            {{ organization.name }}
                            <i-ic-baseline-delete
                                v-if="organization.deleted_at"
                                class="flex-shrink-0 w-4 h-4 text-gray-400 ml-2"
                            />
                        </router-link>
                    </td>
                    <td class="border-t">
                        <router-link
                            class="px-6 py-4 flex items-center"
                            tabindex="-1"
                            :href="editLink(organization)"
                        >
                            {{ organization.city }}
                        </router-link>
                    </td>
                    <td class="border-t">
                        <router-link
                            class="px-6 py-4 flex items-center"
                            tabindex="-1"
                            :href="editLink(organization)"
                        >
                            {{ organization.phone }}
                        </router-link>
                    </td>
                    <td class="border-t w-px">
                        <router-link
                            class="px-4 flex items-center"
                            tabindex="-1"
                            :href="editLink(organization)"
                        >
                            <i-ic-round-keyboard-arrow-right
                                class="w-7 h-7 text-gray-400"
                            />
                        </router-link>
                    </td>
                </tr>
                <tr v-if="organizations.data.length === 0">
                    <td class="border-t px-6 py-4" colspan="4">
                        No organizations found.
                    </td>
                </tr>
            </table>
        </div>
        <pagination
            v-if="organizations.links"
            class="mt-6"
            :links="organizations.links"
        />
    </div>
</template>

<script setup lang="ts">
useHead({ title: "Organizations" });

const props = defineProps<{
    filters: App.Data.SearchOrganizationData;
    organizations: Paginator<App.Data.OrganizationData>;
}>();
const form = ref(props.filters);

const throttledSubmit = useThrottleFn(() => {
    router.get(route("organizations.index"), {
        data: pickDefinedValues(form.value),
        preserveState: true,
    });
}, 250);
watch(form, throttledSubmit, { deep: true });

const onReset = () => {
    form.value = mapValuesToNull(form);
};

const editLink = (organization: App.Data.OrganizationData) =>
    route("organizations.edit", {
        organization: organization.id,
    });
</script>
