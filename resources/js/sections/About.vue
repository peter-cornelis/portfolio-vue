<script setup>
import { github, linkedIn } from "@/components/svgs";
import ResumeLink from "@/components/ResumeLink.vue";
import { useI18n } from "vue-i18n";

const { t } = useI18n();
</script>
<template>
    <section id="about" class="relative grid lg:grid-cols-[auto_1fr] my-10">
        <span aria-hidden="true"
            class="absolute -top-302 -left-100 bg-linear-to-tr from-emerald-300 dark:from-emerald-600 to-cyan-200 dark:to-cyan-500 w-400 h-400 rounded-full -z-10 shadow-2xl shadow-teal-300/20 dark:shadow-teal-200/10 transition-colors duration-500">
        </span>
        <span aria-hidden="true"
            class="absolute -top-202 -left-10 bg-primary dark:bg-darkPrimary w-220 h-220 rounded-full -z-10 shadow-[inset_0_0_30px_15px] shadow-teal-300/20 dark:shadow-teal-300/10 transition-colors duration-500">
        </span>
        <div
            class="bg-white/25 rounded-[50%_50%_10%_50%] p-2 w-fit row-span-3 shadow mx-auto mt-8 mb-auto lg:ml-6 lg:mr-18">
            <img src="../../images/profiel-15.avif" alt=""
                class="w-68 h-68 rounded-[50%_50%_8%_50%] shadow shadow-black/20">
        </div>
        <h2>{{ t('about.hey') }} <br> {{ t('about.hey_2') }}</h2>
        <p class="text-lg">{{ t('about.introduction') }}</p>
        <ul class="grid grid-flow-col gap-8 w-fit mt-8 items-center">
            <li>
                <a href="https://github.com/peter-cornelis" target="_blank" rel="noopener noreferrer"
                    :title="t('general.github_profile')" class="relative">
                    <div class="absolute inset-1 backdrop-blur-lg rounded-full w-6.5 h-6.5"></div>
                    <github class="relative w-8 cursor-pointer" />
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/in/peter-cornelis-dev/" target="_blank" rel="noopener noreferrer"
                    :title="t('general.linkedin_profile')" class="relative">
                    <div class="absolute inset-1 backdrop-blur-lg rounded w-6 h-6"></div>
                    <linked-in class="relative w-8 cursor-pointer" />
                </a>
            </li>
            <li>
                <resume-link />
            </li>
        </ul>
    </section>

</template>
