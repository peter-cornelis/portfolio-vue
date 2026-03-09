<script setup>
    import NavLink from "@/components/NavLink.vue";
    import { useMenu } from "@/composables/useMenu.js";
    import { useDimension } from "@/composables/useDimension.js";

    const navItems = ["about", "skills", "experience", "projects", "contact"];
    const { showMobile } = useMenu();
    const { isDesktop } = useDimension();
</script>

<template>
    <header class="flex sticky z-100 top-0 h-13.5 glass items-center">
        <div class="relative grid grid-flow-col items-center justify-between gap-4 max-w-7xl w-full px-4 py-2 mx-auto">
            <h1 class="w-fit text-2xl sm:text-3xl text-shadow-2xs font-bold bg-linear-to-r from-pink-300 to-indigo-400 dark:to-indigo-300 text-transparent bg-clip-text">Peter Cornelis</h1>
            <div class="relative grid grid-flow-col items-center">
                <nav v-if="isDesktop" class="ml-auto w-fit">
                    <ul class="grid grid-flow-col gap-2">
                        <nav-link v-for="value in navItems" :key="value" :value="value" />
                    </ul>
                </nav>
                <nav-link v-else toggle-type="menu" :mobile="true" />
                <ul class="grid grid-flow-col gap-2 ml-2 pl-2 border-l border-black/20 dark:border-white/20">
                    <nav-link toggle-type="lang" />
                    <nav-link toggle-type="theme" />
                </ul>
            </div>
        </div>
    </header>
    <div
        v-if="!isDesktop"
        class="sticky z-99 grid sm:grid-flow-col top-13.5 left-0 w-full items-center white-glass whitespace-nowrap overflow-hidden transition-max-height duration-300 ease-in-out"
        :class="showMobile ? 'opacity-100 max-h-screen' : 'opacity-0 max-h-0'"
    >
        <nav class="sm:mx-auto sm:p-1">
            <ul class="grid sm:grid-flow-col sm:w-fit gap-2">
                <nav-link v-for="value in navItems" :key="value" :value="value" :mobile="true" />
            </ul>
        </nav>
    </div>
</template>
