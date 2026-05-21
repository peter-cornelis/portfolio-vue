<script setup>
defineProps({
    mono: {
        type: Boolean,
        default: false
    },
    knowledge: {
        type: Boolean,
        default: true
    }
});
</script>
<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
        <path :fill="mono ? 'currentColor' : '#77c1d2'" :fill-opacity="mono ? 0.5 : 1"
            d="M96.2 39 122 64.7 96.2 90.3 70.4 64.7Z" />
        <path :fill="mono ? 'currentColor' : '#2d3441'" d="m31.8 39 53.4 53.2H33.7L6 64.7Z" />
    </svg>
</template>
