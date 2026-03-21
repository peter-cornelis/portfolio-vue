<script setup>
import Header from "@/components/Header.vue";
import about from "@/sections/About.vue";
import skills from "@/sections/Skills.vue";
import experience from "@/sections/Experience.vue";
import projects from "@/sections/Projects.vue";
import contact from "@/sections/Contact.vue";
import chat from "@/sections/Chat.vue";
import Print from "@/sections/Print.vue";
</script>
<template>
    <Header />
    <main class="overflow-x-clip print:hidden">
        <about />
        <skills />
        <experience />
        <projects />
        <contact />
        <chat />
    </main>
    <Print />
    <footer class="print:hidden">
        <p class="text-center py-4 text-sm opacity-70">© 2026 | Peter Cornelis</p>
    </footer>
</template>
