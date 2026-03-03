<script setup>
    import NavLink from "@/components/NavLink.vue";
    import { useGlow } from "@/composables/useGlow.js";
    const navItems = ["about", "skills", "experience", "projects", "contact"];

    const { glow } = useGlow();
</script>

<template>
    <header class="grid grid-flow-col items-center gap-4 px-4 py-2 isolate bg-violet-200/20 shadow-lg ring-1 ring-black/5 backdrop-blur-md">
        <h1 class="relative w-fit text-3xl font-bold bg-linear-to-r from-sky-500 via-emerald-500 to-amber-500 text-transparent bg-clip-text">Peter Cornelis</h1>
        <span class="absolute w-fit text-3xl font-bold left-4 bg-linear-to-r from-sky-500 via-emerald-500 to-amber-500 text-transparent bg-clip-text blur-sm transition-opacity duration-1000" :style="{ opacity: glow }">Peter Cornelis</span>
        <nav class="ml-auto w-fit">
            <ul class="grid grid-flow-col gap-2">
                <NavLink v-for="value in navItems" :key="value" :value="value" />
            </ul>
        </nav>
    </header>
</template>
