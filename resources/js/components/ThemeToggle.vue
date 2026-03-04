<script setup>
    import DarkMode from "@/components/svgs/DarkMode.vue";
    import LightMode from "@/components/svgs/LightMode.vue";
    import {onMounted, ref, watch} from 'vue';
    let theme = ref(localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'));
    let switching = ref( false );

    onMounted(() => setTheme(theme.value));

    watch(theme, (value) => {
        localStorage.setItem('theme', value);
        setTheme(value);
    });

    function toggleTheme() {
        switching.value = true;
        setTimeout(() => {
            theme.value = theme.value === "light" ? "dark" : "light";
        }, 300);

        setTimeout(() => {
            switching.value = false;
        }, 350);
    }

    function setTheme(value) {
        document.documentElement.classList.toggle('dark', value === 'dark');
    }

</script>
<template>
    <button @click="toggleTheme()" class="grid w-8 h-8 rounded-full items-center justify-center">
        <LightMode v-if="theme === 'dark'" class="w-5 transition-all duration-300" :class="switching ? 'opacity-0 scale-0 rotate-180' : 'opacity-100 scale-100 rotate-0'" />
        <DarkMode v-else class="w-5 transition-all duration-300" :class="switching ? 'opacity-0 scale-0 rotate-180' : 'opacity-100 scale-100 rotate-0'" />
    </button>
</template>
