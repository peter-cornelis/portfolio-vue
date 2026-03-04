<script setup>
    import NavLink from "@/components/NavLink.vue";
    import ThemeToggle  from "@/components/ThemeToggle.vue";

    const navItems = ["about", "skills", "experience", "projects", "contact"];
</script>

<template>
    <header class="glass z-100">
        <div class="relative grid grid-flow-col items-center justify-between gap-4 max-w-7xl px-4 py-2 mx-auto">
            <h1 class="w-fit text-3xl font-bold bg-linear-to-r from-pink-500 to-sky-500 dark:to-sky-300 text-transparent bg-clip-text">Peter Cornelis</h1>
            <div class="grid grid-flow-col items-center">
                <nav class="ml-auto w-fit">
                    <ul class="grid grid-flow-col gap-2">
                        <NavLink v-for="value in navItems" :key="value" :value="value" />
                    </ul>
                </nav>
                <ThemeToggle />
            </div>
        </div>
    </header>
</template>
