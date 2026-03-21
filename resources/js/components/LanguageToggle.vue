<script setup>
import { useI18n } from "vue-i18n";
import { ref } from "vue";

const { locale } = useI18n();
let switching = ref(false);

async function toggleLanguage() {
    switching.value = true;
    const newLocale = locale.value === 'en' ? 'nl' : 'en';
    await fetch(`/language/${newLocale}`);
    locale.value = newLocale;
    document.documentElement.lang = newLocale;

    setTimeout(() => {
        switching.value = false;
    }, 300);
}
</script>
<template>
    <a :href="`/language/${locale === 'en' ? 'nl' : 'en'}`" @click.prevent="toggleLanguage"
        class="relative grid w-10 h-10 z-10 rounded-full items-center justify-center transition-transform duration-300"
        :class="switching ? 'scale-0 rotate-180' : 'scale-100 rotate-0'">
        <span class="text-sm font-bold uppercase">{{ locale === 'en' ? 'nl' : 'en' }}</span>
    </a>
</template>
