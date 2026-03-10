<script setup>
import { useI18n } from "vue-i18n";
import { ref, computed } from "vue";
import { github, techIcons } from "@/components/svgs";

let opened = ref(0);
const { t } = useI18n();
const projects = computed(() => [
    {
        name: "Dropzoned",
        alt: t('projects.sub_drop_alt'),
        description: t('projects.sub_drop_info'),
        imageUrl: new URL('../../images/dropzoned.webp', import.meta.url).href,
        usedTech: [techIcons.html, techIcons.css, techIcons.laravel, techIcons.alpine, techIcons.livewire],
        githubUrl: "https://github.com/peter-cornelis/dropzoned"
    },
    {
        name: "Portfolio",
        alt: t('projects.sub_portfolio_alt'),
        description: t('projects.sub_portfolio_info'),
        imageUrl: new URL('../../images/portfolio.webp', import.meta.url).href,
        usedTech: [techIcons.html, techIcons.tailwind, techIcons.laravel, techIcons.alpine, techIcons.livewire],
        githubUrl: "https://github.com/peter-cornelis/portfolio"
    },
    {
        name: "Stock Market Rally",
        alt: t('projects.sub_rally_alt'),
        description: t('projects.sub_rally_info'),
        imageUrl: new URL('../../images/rally.webp', import.meta.url).href,
        usedTech: [techIcons.html, techIcons.tailwind, techIcons.laravel, techIcons.javascript],
        githubUrl: "https://github.com/peter-cornelis/stock-market-rally"
    },
]);

function setActiveProject(index) {
    if (opened.value !== index) {
        opened.value = index;
    }
};
</script>
<template>
    <section id="projects" class="relative">
        <span aria-hidden="true" class="absolute top-5 left-1/2 -translate-x-1/2 bg-linear-to-bl from-rose-300 dark:from-rose-400 to-purple-300 w-140 h-140 rounded-full -z-10 transition-all duration-2000">
        </span>
        <span aria-hidden="true" class="absolute top-100 left-1/3 -translate-x-1/2 bg-linear-to-br from-rose-300 dark:from-rose-400 to-purple-400 w-60 h-60 rounded-full -z-10 transition-all duration-2000">
        </span>
        <h2>{{ t('projects.title') }}</h2>
        <ul class="shadow-lg shadow-black/5 glass max-w-4xl mx-auto">
            <li
                v-for="(project, index) in projects"
                :key="index"
                @click="setActiveProject(index)"
                class="relative p-2 z-${(index + 1) * 10} first:rounded-t-lg last:rounded-b-lg not-last:border-b border-white/5 hover:bg-indigo-700/5 dark:hover:bg-white/2 transition-colors duration-300"
                :class="{'cursor-pointer': opened !== index}"
            >
                <h4 class="text-center">{{ project.name }}</h4>
                <div :class="opened === index ? 'p-2 opacity-100 max-h-180' : 'opacity-0 max-h-0'" class="grid md:grid-cols-2 gap-4 transition-max-height duration-700">
                    <img class="rounded-lg w-full self-stretch object-cover" :src="project.imageUrl" :alt="project.alt">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="milky text-sm rounded-lg p-4 sm:col-span-2">
                            <p>{{ project.description }}</p>
                            <div class="flex gap-4 mx-auto p-1 mt-4 w-fit">
                                <component v-for="tech in project.usedTech" :key="tech.name" :is="tech.icon" class="w-6" :mono="true"/>

                            </div>
                        </div>
                        <a :href="project.githubUrl" target="_blank" rel="noopener noreferrer" class="btn text-center mt-auto">
                            Live Demo
                        </a>
                        <a :href="project.githubUrl" target="_blank" rel="noopener noreferrer" class="btn-secondary mt-auto">
                            <span class="flex items-center gap-2 mx-auto w-fit">
                                <component :is="github" class="w-6"/>
                                Code
                            </span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </section>
</template>
