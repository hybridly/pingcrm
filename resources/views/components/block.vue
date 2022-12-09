<script setup lang="ts">
defineProps<{
	title: string
	url?: string
}>()
</script>

<template>
	<div class="p-6">
		<div class="flex items-center">
			<slot name="icon" />
			<div class="ml-4 text-lg leading-7 font-semibold">
				<component
					:is="url ? 'a' : 'span'"
					:href="url"
					class="text-gray-900 dark:text-white"
					:class="{ underline: url }"
					v-text="title"
				/>
			</div>
		</div>

		<div class="ml-12">
			<div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
				<slot />
			</div>
		</div>
	</div>
</template>
