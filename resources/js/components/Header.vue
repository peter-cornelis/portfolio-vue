<script setup>
    import NavLink from "@/components/NavLink.vue";
    import ThemeToggle  from "@/components/ThemeToggle.vue";
    import { useGlow } from "@/composables/useGlow.js";
    const navItems = ["about", "skills", "experience", "projects", "contact"];

    const { glow } = useGlow();
</script>

<template>
    <header class="glass z-100">
        <div class="relative grid grid-flow-col items-center gap-4 max-w-7xl px-4 py-2 mx-auto">
            <h1 class="w-fit text-3xl font-bold bg-linear-to-r from-pink-500 to-sky-500 text-transparent bg-clip-text">Peter Cornelis</h1>
            <span class="absolute w-fit text-3xl font-bold left-4 text-white blur-sm transition-opacity duration-1000" :style="{ opacity: glow }">Peter Cornelis</span>
            <nav class="ml-auto w-fit">
                <ul class="grid grid-flow-col gap-2">
                    <NavLink v-for="value in navItems" :key="value" :value="value" />
                </ul>
            </nav>
            <ThemeToggle />
        </div>
    </header>
</template>
