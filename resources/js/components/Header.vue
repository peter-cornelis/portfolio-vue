<script setup>
import NavLink from "@/components/NavLink.vue";
import { useMenu } from "@/composables/useMenu.js";
import { useDimension } from "@/composables/useDimension.js";
import { ref, onMounted } from "vue";

const navLinks = ["about", "skills", "experience", "projects", "contact"];
const { showMobile } = useMenu();
const { isDesktop } = useDimension();

const current = ref("about");

onMounted(() => {
    const sections = document.querySelectorAll("section");
    window.addEventListener("scroll", () => {
        sections.forEach((section) => {
            if (section.getBoundingClientRect().top <= window.innerHeight / 2) {
                current.value = section.getAttribute("id");
            }
        });
    });
});
</script>

<template>
    <header class="flex sticky z-100 top-0 h-13.5 glass items-center shadow-md print:hidden">
        <div class="relative grid grid-flow-col items-center justify-between gap-4 max-w-7xl w-full px-4 py-2 mx-auto">
            <h1
                class="w-fit text-2xl sm:text-3xl text-shadow-2xs font-bold bg-linear-to-r from-pink-300 to-indigo-400 dark:to-indigo-300 text-transparent bg-clip-text">
                Peter Cornelis</h1>
            <div class="relative grid grid-flow-col items-center">
                <nav v-if="isDesktop" class="ml-auto w-fit">
                    <ul class="grid grid-flow-col gap-2">
                        <nav-link v-for="navLink in navLinks" :key="navLink" :section="navLink"
                            :active="current === navLink" />
                    </ul>
                </nav>
                <nav-link v-else toggle-type="menu" :mobile="true" />
                <ul
                    class="grid grid-flow-col gap-2 ml-2 pl-2 border-l border-black/20 dark:border-white/20 items-center">
                    <nav-link toggle-type="lang" />
                    <nav-link toggle-type="theme" />
                </ul>
            </div>
        </div>
    </header>
    <transition>
        <nav v-if="!isDesktop && showMobile"
            class="sticky z-99 top-13.5 left-0 w-full items-center white-glass shadow-md">
            <ul class="grid sm:grid-flow-col sm:w-fit sm:py-1 pb-1 gap-2 sm:mx-auto">
                <nav-link v-for="navLink in navLinks" :key="navLink" :section="navLink" :mobile="true"
                    :active="current === navLink" />
            </ul>
        </nav>
    </transition>
</template>

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: max-height 0.3s ease-in-out;
    white-space: nowrap;
    overflow: clip;
}

.v-enter-from,
.v-leave-to {
    max-height: 0;
}

.v-enter-to,
.v-leave-from {
    max-height: 15rem;
}
</style>
