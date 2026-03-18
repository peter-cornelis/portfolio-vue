<script setup>
    import { github, linkedIn } from "@/components/svgs";
    import { useI18n } from "vue-i18n";
    import { ref, watch } from "vue";

    const { t } = useI18n();
    const hover = ref(false);
    const showText = ref(false);

    watch(hover, (isHovering) => {
        if (isHovering) {
            showText.value = true;
        } else {
            setTimeout(() => {
                showText.value = false;
            }, 350);
        }
    });
</script>
<template>
    <section id="about" class="relative grid lg:grid-cols-[auto_1fr] my-10">
        <span aria-hidden="true" class="absolute -top-304 -left-100 bg-linear-to-br from-cyan-300 dark:to-cyan-800 to-emerald-200 dark:from-green-500 w-400 h-400 rounded-full -z-10 shadow-2xl shadow-teal-200/5 dark:shadow-teal-200/15 transition-colors duration-500">
        </span>
        <span aria-hidden="true" class="absolute -top-204 -left-10 bg-primary dark:bg-darkPrimary w-220 h-220 rounded-full -z-10 shadow-[inset_0_0_30px_15px] shadow-teal-300/5 dark:shadow-teal-300/10 transition-colors duration-500">
        </span>
        <div class="bg-teal-200 dark:bg-teal-600 rounded-[50%_50%_10%_50%] p-2 w-fit row-span-3 shadow mx-auto mt-8 mb-auto lg:ml-6 lg:mr-18">
            <img src="../../images/profiel-15.avif" alt="" class="w-68 h-fit rounded-[50%_50%_8%_50%] shadow shadow-black/20">
        </div>
        <h2>{{ t('about.hey') }} <br> {{ t('about.hey_2') }}</h2>
        <p class="text-lg">{{ t('about.introduction') }}</p>
        <ul class="grid grid-flow-col gap-8 w-fit mt-8 items-center">
            <li>
                <a href="https://github.com/peter-cornelis" target="_blank" rel="noopener noreferrer" :title="t('general.github_profile')">
                    <github class="w-8 cursor-pointer"/>
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/in/peter-cornelis-dev/" target="_blank" rel="noopener noreferrer" :title="t('general.linkedin_profile')">
                    <linked-in class="w-8 cursor-pointer"/>
                </a>
            </li>
            <li class="rounded-sm bg-darkPrimary/60 dark:bg-primary/70 text-primary dark:text-text text-sm font-semibold cursor-pointer">
                <a href="/download-pdf" target="_blank" aria-label="{{ t('general.download_cv') }}" rel="noopener noreferrer"
                    class="relative flex items-center gap-1 cursor-pointer" @mouseover="hover = true" @mouseleave="hover = false">
                    <svg class="w-7 rounded-sm bg-darkPrimary dark:bg-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor">
                        <path d="M200-200v-560 179-19 400Zm80-240h221q2-22 10-42t20-38H280v80Zm0 160h157q17-20 39-32.5t46-20.5q-4-6-7-13t-5-14H280v80Zm0-320h400v-80H280v80Zm-80 480q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v258q-14-26-34-46t-46-33v-179H200v560h202q-1 6-1.5 12t-.5 12v56H200Zm409-229q-29-29-29-71t29-71q29-29 71-29t71 29q29 29 29 71t-29 71q-29 29-71 29t-71-29ZM480-120v-56q0-24 12.5-44.5T528-250q36-15 74.5-22.5T680-280q39 0 77.5 7.5T832-250q23 9 35.5 29.5T880-176v56H480Z"/>
                    </svg>
                    <span
                        class="pr-2 inline-block overflow-hidden whitespace-nowrap transition-[max-width] duration-500 ease-in-out"
                        :class="{'max-w-md': hover, '-pl-2 max-w-0': !hover, 'absolute': !showText}"
                        v-text="showText ? t('general.cv') : ''"
                        >
                    </span>
                </a>
            </li>
        </ul>
    </section>

</template>
