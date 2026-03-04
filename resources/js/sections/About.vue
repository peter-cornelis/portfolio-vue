<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();
</script>
<template>
    <div class="relative grid items-center gap-8 max-w-7xl px-4 py-16 mx-auto">
        <span
            class="absolute -top-280 -left-100 bg-linear-to-br from-cyan-300 dark:to-cyan-700 to-emerald-200 dark:from-emerald-700 w-400 h-400 rounded-full -z-10 transition-all duration-2000">
        </span>
        <section id="about" class="relative grid grid-cols-2 gap-4 p-4">
            <div>
                <!-- picture and socials here -->
            </div>
            <div class="px-6 py-4">
                <h2 class="text-2xl font-bold">{{ t('about.hey') }}</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-xl">{{ t('about.introduction') }}</p>
            </div>
        </section>
    </div>
</template>
