<script setup>
    defineProps({
        value: String
    });
</script>
<template>
    <li>
        <a href="#{{ value }}" class="px-2 py-1 rounded-md text-sm font-medium text-text hover:bg-gray-100 hover:text-gray-900">{{ value }}</a>
    </li>
</template>
