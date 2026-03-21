<script setup>
import { useI18n } from "vue-i18n";
import { ref, watch, onUnmounted } from "vue";

const { t } = useI18n();

const hover = ref(false);
const showText = ref(false);

const resumeNotice = setTimeout(() => {
    hover.value = true;
}, 5000);

watch(hover, (isHovering) => {
    if (isHovering) {
        showText.value = true;
    } else {
        setTimeout(() => {
            showText.value = false;
        }, 350);
    }
});

onUnmounted(() => {
    clearTimeout(resumeNotice);
});
</script>
<template>
    <a href="/download-pdf" target="_blank" :aria-label="t('general.download_cv')" rel="noopener noreferrer"
        class="rounded-sm bg-darkPrimary/60 dark:bg-primary/70 text-primary dark:text-text text-sm font-semibold relative flex items-center gap-1 cursor-pointer"
        @mouseover="hover = true" @mouseleave="hover = false">
        <svg class="w-7 rounded-sm bg-darkPrimary dark:bg-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 -960 960 960" fill="currentColor">
            <path
                d="M200-200v-560 179-19 400Zm80-240h221q2-22 10-42t20-38H280v80Zm0 160h157q17-20 39-32.5t46-20.5q-4-6-7-13t-5-14H280v80Zm0-320h400v-80H280v80Zm-80 480q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v258q-14-26-34-46t-46-33v-179H200v560h202q-1 6-1.5 12t-.5 12v56H200Zm409-229q-29-29-29-71t29-71q29-29 71-29t71 29q29 29 29 71t-29 71q-29 29-71 29t-71-29ZM480-120v-56q0-24 12.5-44.5T528-250q36-15 74.5-22.5T680-280q39 0 77.5 7.5T832-250q23 9 35.5 29.5T880-176v56H480Z" />
        </svg>
        <span
            class="pr-2 inline-block overflow-hidden whitespace-nowrap transition-[max-width] duration-500 ease-in-out"
            :class="{ 'max-w-md': hover, '-pl-2 max-w-0': !hover, 'absolute': !showText }"
            v-text="showText ? t('general.cv') : ''">
        </span>
    </a>
</template>
