<template>
    <button
        ref="buttonRef"
        type="button"
        class="min-w-max"
        @click="show = true"
    >
        <slot />
        <teleport v-if="show" to="#dropdown">
            <div>
                <div
                    class="fixed top-0 right-0 left-0 bottom-0 z-[99998] bg-black opacity-20"
                    @click="show = false"
                />
                <div ref="dropdownRef" class="absolute z-[99999]">
                    <slot name="dropdown" />
                </div>
            </div>
        </teleport>
    </button>
</template>

<script setup lang="ts">
import { createPopper, Instance } from "@popperjs/core";

const show = ref(false);

const buttonRef = ref<HTMLButtonElement | null>(null);
const dropdownRef = ref<HTMLDivElement | null>(null);
const popperInstance = ref<Instance | null>(null);

onMounted(() =>
    watch(show, (show) => {
        if (show) {
            nextTick(
                () =>
                    (popperInstance.value = createPopper(
                        buttonRef.value as HTMLButtonElement,
                        dropdownRef.value as HTMLDivElement,
                        {
                            placement: "bottom-end",
                            modifiers: [
                                {
                                    name: "preventOverflow",
                                    options: {
                                        altBoundary: true,
                                    },
                                },
                            ],
                        }
                    ))
            );
        } else if (popperInstance.value) {
            popperInstance.value.destroy();
        }
    })
);
</script>
