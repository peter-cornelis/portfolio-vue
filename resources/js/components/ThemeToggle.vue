<script setup>
    import {lightMode, darkMode} from "@/components/svgs";
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
    <button @click="toggleTheme()" class="relative grid w-10 h-10 z-10 rounded-full items-center justify-center">
        <light-mode
            v-if="theme === 'dark'"
            class="w-5 transition-transform duration-300"
            :class="switching ? 'scale-0 rotate-180' : 'scale-100 rotate-0'"
        />
        <dark-mode
            v-else
            class="w-5 transition-transform duration-300"
            :class="switching ? 'scale-0 rotate-180' : 'scale-100 rotate-0'"
        />
    </button>
</template>
