<script setup>
    defineProps({
        mono: {
            type: Boolean,
            default: false
        }
    });
</script>
<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 96">
        <path :fill="mono ? 'currentColor' : '#77c1d2'" :fill-opacity="mono ? 0.5 : 1" d="M96.2 21 122 46.7 96.2 72.3 70.4 46.7Z"/>
        <path :fill="mono ? 'currentColor' : '#2d3441'" d="m31.8 21 53.4 53.2H33.7L6 46.7Z"/>
    </svg>
</template>
