<script setup>
    import { usePosition } from "@/composables/usePosition";

    defineProps({
        value: String
    });

    const { position, setPosition } = usePosition();

</script>
<template>
    <li
        class="group relative overflow-hidden px-4 py-2 rounded-full"
        @mouseenter="setPosition($event)"
        @mouseleave="setPosition($event)"
    >
        <a href="#{{ value }}" class="relative text-sm font-medium text-text rounded-full">
            {{ value }}
        </a>
        <span
            class="absolute w-96 h-48 rounded-full inset-shadow-sm bg-violet-200/7 inset-shadow -translate-x-1/2 -translate-y-1/2 scale-0 group-hover:scale-100 transition-transform duration-700"
            :style="{ left: position.x + 'px', top: position.y + 'px' }"
        ></span>
    </li>
</template>
