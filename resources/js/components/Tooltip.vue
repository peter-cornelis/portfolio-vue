<script setup>
defineProps({
    text: {
        type: String,
        default: null
    }
});
</script>

<template>
    <div class="absolute left-1/2 -translate-x-1/2 group-hover:flex hidden flex-col items-center">
        <div
            class="h-1.5 w-1.5 rounded-full bg-black/75 my-1 shadow-lg shadow-black/50 outline outline-indigo-100/15 dark:outline-indigo-100/5" />
        <span
            class="bg-black/75 text-white text-xs rounded px-2 py-1 shadow-lg shadow-black/50 outline outline-indigo-100/15 dark:outline-indigo-100/5">
            {{ text }}
        </span>
    </div>
</template>
