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
    }
});
</script>

<template>
    <li class="last:absolute">
        <div class="mx-10">
            <span
                class="absolute flex items-center justify-center w-10 h-10 text-white rounded-full -inset-s-5 shadow border border-black/10"
                :class="isWork ? 'bg-teal-500' : 'bg-violet-400'">
                <work v-if="isWork" class="w-6 h-6" />
                <school v-else class="w-6 h-6" />
                <span class="absolute w-9 h-9 rounded-full hover:ring-1 hover:animate-ping duration-300"
                    :class="isWork ? 'ring-teal-500' : 'ring-violet-400'"></span>
            </span>
            <span
                class="capitalize text-heading text-xs font-semibold text-white px-1.5 py-0.5 rounded shadow border border-black/10"
                :class="isWork ? 'bg-teal-500/80 dark:bg-teal-500/90' : 'bg-violet-400/80 dark:bg-violet-400/90'">{{
                    start == null ? end : `${start}, ${end}` }}</span>
            <h3 class="flex items-center capitalize text-lg font-semibold text-heading mt-2 p-0">
                <slot />
            </h3>
            <p class="uppercase text-mainDark/60 dark:text-mainLight/50 py-.5 mb-6">{{ at }}</p>
        </div>
    </li>
</template>
