<script setup>
    import Header from "@/components/Header.vue";
    import about from "@/sections/About.vue";
    import skills from "@/sections/Skills.vue";
    import experience from "@/sections/Experience.vue";
    import projects from "@/sections/Projects.vue";
</script>
<template>
    <Header />
    <main class="overflow-x-clip">
        <about />
        <skills />
        <experience />
        <projects />
    </main>
    <footer>
        <p class="text-center py-4 text-sm opacity-50">© 2026 | Peter Cornelis</p>
    </footer>
</template>
