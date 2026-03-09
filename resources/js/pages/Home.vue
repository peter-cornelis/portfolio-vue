<script setup>
    import Header from "@/components/Header.vue";
    import about from "@/sections/About.vue";
import Experience from "@/sections/Experience.vue";
    import skills from "@/sections/Skills.vue";
</script>
<template>
    <Header />
    <main class="overflow-x-clip">
        <about />
        <skills />
        <experience />

    </main>
    <footer>

    </footer>
</template>
