<script setup>
import { school, work } from "@/components/svgs";

defineProps({
    start: {
        type: String,
        default: null
    },
    end: {
        type: String,
        required: true
    },
    at: {
        type: String,
        required: true
    },
    isWork: {
        type: Boolean,
        default: false
    },
});
</script>

<template>
    <li class="group">
        <span
            class="absolute group-last:left-40 left-0 group-odd:-top-12 group-even:top-24 flex items-center justify-center w-10 h-10 text-white rounded-full shadow"
            :class="isWork ? 'bg-teal-500' : 'bg-violet-400'">
            <work v-if="isWork" class="w-6 h-6" />
            <school v-else class="w-6 h-6" />
        </span>
        <div class="group-last:text-right">
            <span
                class="capitalize text-heading text-xs font-semibold text-white dark:text-mainLight px-1.5 py-0.5 rounded shadow"
                :class="isWork ? 'bg-teal-400' : 'bg-violet-400'">{{ start == null ? end : `${start}, ${end}` }}</span>
            <h3 class="flex items-center capitalize text-lg font-semibold text-heading mt-2 p-0">
                <slot />
            </h3>
            <p class="uppercase text-mainDark/60 dark:text-mainLight/50 py-.5 mb-6">{{ at }}</p>
        </div>
    </li>
</template>
