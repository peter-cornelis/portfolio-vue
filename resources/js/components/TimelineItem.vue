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
            <span class="absolute flex items-center justify-center w-10 h-10 bg-primary dark:bg-darkPrimary rounded-full -inset-s-5 ring-2 hover:ring-3" :class="isWork ? 'ring-teal-500 dark:ring-teal-400' : 'ring-violet-500 dark:ring-violet-400'">
                <work v-if="isWork" class="w-6 h-6" />
                <school v-else class="w-6 h-6" />
                <span class="absolute w-10 h-10 rounded-full hover:ring-1 hover:animate-ping duration-300" :class="isWork ? 'ring-teal-500' : 'ring-violet-500'"></span>
            </span>
            <span class="capitalize border text-heading text-xs font-semibold dark:text-mainLight px-1.5 py-0.5 rounded"
            :class="isWork ? 'bg-teal-400/60 dark:bg-teal-500/80' : 'bg-violet-400/60 dark:bg-violet-500/80'">{{ start == null ? end : `${start}, ${end}` }}</span>
            <h3 class="flex items-center capitalize text-lg font-semibold text-heading mt-2 p-0"><slot/></h3>
            <p class="uppercase text-mainDark/60 dark:text-mainLight/50 py-.5 mb-6">{{ at }}</p>
        </div>
    </li>
</template>
