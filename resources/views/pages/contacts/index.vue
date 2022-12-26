<template layout>
    <div>
        <h1 class="mb-8 font-bold text-3xl">
            {{ t("contacts.index.header") }}
        </h1>
        <div class="mb-6 flex justify-between items-center">
            <search-filter
                v-model="form.keyword"
                class="w-full max-w-md mr-4"
                @reset="onReset"
            >
                <label class="block text-gray-700">
                    {{ t("contacts.index.trashedLabel") }}
                </label>
                <select
                    v-model="form.trashedOption"
                    class="mt-1 w-full form-select"
                >
                    <option :value="null">
                        {{ t("contacts.index.noTrashed") }}
                    </option>
                    <option value="with">
                        {{ t("contacts.index.withTrashed") }}
                    </option>
                    <option value="only">
                        {{ t("contacts.index.onlyTrashed") }}
                    </option>
                </select>
            </search-filter>
            <router-link class="btn-indigo" :href="route('contacts.create')">
                <span class="md:hidden">
                    {{ t("contacts.index.createContactMobile") }}
                </span>
                <span class="hidden md:inline">
                    {{ t("contacts.index.createContact") }}
                </span>
            </router-link>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-6 pt-6 pb-4">
                        {{ t("contacts.attributes.name") }}
                    </th>
                    <th class="px-6 pt-6 pb-4">
                        {{ t("contacts.attributes.city") }}
                    </th>
                    <th class="px-6 pt-6 pb-4">
                        {{ t("contacts.attributes.organization_id") }}
                    </th>
                    <th class="px-6 pt-6 pb-4" colspan="2">
                        {{ t("contacts.attributes.phone") }}
                    </th>
                </tr>
                <tr
                    v-for="contact in contacts.data"
                    :key="contact.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <router-link
                            class="px-6 py-4 flex items-center focus:text-indigo-500"
                            :href="editLink(contact)"
                        >
                            {{
                                t("contacts.index.displayName", {
                                    first_name: contact.first_name,
                                    last_name: contact.last_name,
                                })
                            }}
                            <i-ic-baseline-delete
                                v-if="contact.deleted_at"
                                class="flex-shrink-0 w-4 h-4 text-gray-400 ml-2"
                            />
                        </router-link>
                    </td>
                    <td class="border-t">
                        <router-link
                            class="px-6 py-4 flex items-center"
                            tabindex="-1"
                            :href="editLink(contact)"
                        >
                            {{ contact.organization?.name }}
                        </router-link>
                    </td>
                    <td class="border-t">
                        <router-link
                            class="px-6 py-4 flex items-center"
                            tabindex="-1"
                            :href="editLink(contact)"
                        >
                            {{ contact.city }}
                        </router-link>
                    </td>
                    <td class="border-t">
                        <router-link
                            class="px-6 py-4 flex items-center"
                            tabindex="-1"
                            :href="editLink(contact)"
                        >
                            {{ contact.phone }}
                        </router-link>
                    </td>
                    <td class="border-t w-px">
                        <router-link
                            class="px-4 flex items-center"
                            tabindex="-1"
                            :href="editLink(contact)"
                        >
                            <i-ic-round-keyboard-arrow-right
                                class="w-7 h-7 text-gray-400"
                            />
                        </router-link>
                    </td>
                </tr>
                <tr v-if="contacts.data.length === 0">
                    <td class="border-t px-6 py-4" colspan="4">
                        {{ t("contacts.index.noneFound") }}
                    </td>
                </tr>
            </table>
        </div>
        <pagination
            v-if="contacts.links"
            class="mt-6"
            :links="contacts.links"
        />
    </div>
</template>

<script setup lang="ts">
const { t } = useI18n();

useHead({ title: computed(() => t("contacts.index.title")) });

const props = defineProps<{
    filters: App.Data.SearchData;
    contacts: Paginator<App.Data.ContactData>;
}>();
const form = ref(props.filters);

const throttledSubmit = useThrottleFn(() => {
    router.get(route("contacts.index"), {
        data: pickDefinedValues(form.value),
        preserveState: true,
    });
}, 250);
watch(form, throttledSubmit, { deep: true });

const onReset = () => {
    form.value = mapValuesToNull(form);
};

const editLink = (contact: App.Data.ContactData) =>
    route("contacts.edit", {
        contact: contact.id,
    });
</script>
