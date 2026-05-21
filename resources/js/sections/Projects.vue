<script setup>
import { useI18n } from "vue-i18n";
import { ref, computed } from "vue";
import { github, techIcons, arrowRight, arrowDown } from "@/components/svgs";

const opened = ref(0);
const { t } = useI18n();
const projects = computed(() => [
    {
        name: "Eurocom Software",
        alt: t('projects.sub_eurocom_alt'),
        description: t('projects.sub_eurocom_info'),
        imageUrl: new URL('../../images/eurocom_dashboard.webp', import.meta.url).href,
        usedTech: [techIcons.docker, techIcons.prometheus, techIcons.grafana, techIcons.powershell, techIcons.python, techIcons.caddy, techIcons.css],
        githubUrl: "https://github.com/peter-cornelis/eurocom_dashboard",
        demoUrl: null
    },
    {
        name: "Dropzoned",
        alt: t('projects.sub_drop_alt'),
        description: t('projects.sub_drop_info'),
        imageUrl: new URL('../../images/dropzoned.webp', import.meta.url).href,
        usedTech: [techIcons.html, techIcons.css, techIcons.laravel, techIcons.alpine, techIcons.livewire],
        githubUrl: "https://github.com/peter-cornelis/dropzoned",
        demoUrl: "https://drop.petercornelis.be"
    },
    {
        name: "Portfolio",
        alt: t('projects.sub_portfolio_alt'),
        description: t('projects.sub_portfolio_info'),
        imageUrl: new URL('../../images/portfolio.webp', import.meta.url).href,
        usedTech: [techIcons.html, techIcons.css, techIcons.tailwind, techIcons.laravel, techIcons.vue],
        githubUrl: "https://github.com/peter-cornelis/portfolio-vue",
        demoUrl: "https://dev.petercornelis.be"
    },
    {
        name: "Stock Market Rally",
        alt: t('projects.sub_rally_alt'),
        description: t('projects.sub_rally_info'),
        imageUrl: new URL('../../images/rally.webp', import.meta.url).href,
        usedTech: [techIcons.html, techIcons.tailwind, techIcons.laravel, techIcons.javascript],
        githubUrl: "https://github.com/peter-cornelis/stock-market-rally",
        demoUrl: "https://rally.petercornelis.be"

    },
]);

function setActiveProject(index) {
    if (opened.value !== index) opened.value = index;
};
</script>
<template>
    <section id="projects" class="relative">
        <span aria-hidden="true"
            class="absolute top-5 left-1/2 -translate-x-1/2 bg-linear-to-bl from-rose-300 dark:from-rose-400 to-purple-300 w-140 h-140 rounded-full -z-10 shadow-[0px_0px_70px_15px] shadow-rose-300/20 transition-all duration-1000">
        </span>
        <span aria-hidden="true"
            class="absolute top-100 left-1/3 -translate-x-1/2 bg-linear-to-br from-rose-300 dark:from-rose-400 to-purple-400 w-60 h-60 rounded-full -z-10 shadow-[0px_0px_30px_5px] shadow-rose-300/20 transition-all duration-1000">
        </span>
        <h2>{{ t('projects.title') }}</h2>
        <ul class="shadow-lg shadow-black/5 glass max-w-4xl mx-auto overflow-y-clip">
            <li v-for="(project, index) in projects" :key="index" @click="setActiveProject(index)"
                class="relative p-2 first:rounded-t-lg last:rounded-b-lg not-last:border-b border-black/5 dark:border-white/5 transition-colors duration-300"
                :class="{ 'cursor-pointer hover:bg-indigo-700/5 dark:hover:bg-white/3': opened !== index }">
                <h3 class="relative text-center">{{ project.name }}
                    <component v-if="opened !== index" :is="arrowDown"
                        class="absolute left-2 top-0 w-8 mx-auto opacity-60 hover:opacity-80" />
                    <component v-else :is="arrowRight"
                        class="absolute left-2 top-0 w-8 mx-auto opacity-60 hover:opacity-80" />
                </h3>
                <transition name="project">
                    <div v-if="opened === index"><!-- extra container resolve transition glitch by padding-->
                        <div class="grid md:grid-cols-2 gap-4 p-2">
                            <img class="soft-img" :src="project.imageUrl" :alt="project.alt">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div class="milky text-sm rounded-lg p-4 mb-auto sm:col-span-2">
                                    <p>{{ project.description }}</p>
                                    <div>
                                        <h4 class="mt-4">{{ t('projects.used') }}:</h4>
                                    </div>
                                    <div class="flex gap-4 mx-auto p-1 mt-2 w-fit">
                                        <div v-for="tech in project.usedTech" :key="tech.name" class="relative group">
                                            <component :is="tech.icon" class="w-6" :mono="true" />
                                            <div
                                                class="absolute left-1/2 -translate-x-1/2 group-hover:flex hidden flex-col items-center">
                                                <div
                                                    class="mx-auto border-6 border-transparent border-b-black/70 w-0" />
                                                <span
                                                    class="whitespace-nowrap bg-black/70 text-white text-xs rounded px-2 py-1 shadow-lg shadow-black/50">
                                                    {{ tech.name }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a v-if="project.demoUrl" :href="project.demoUrl" target="_blank"
                                    rel="noopener noreferrer" class="btn text-center mt-auto">
                                    Live Demo
                                </a>
                                <a :href="project.githubUrl" target="_blank" rel="noopener noreferrer"
                                    class="btn-secondary mt-auto" :class="project.demoUrl ? '' : 'sm:col-span-2'">
                                    <span class="flex items-center gap-2 mx-auto w-fit">
                                        <component :is="github" class="w-6" />
                                        Code
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </transition>
            </li>
        </ul>
    </section>
</template>
<style scoped>
.project-enter-active {
    transition: max-height 1s ease-in-out, opacity 1s ease-in-out;
    overflow: clip;
}

.project-leave-active {
    transition: max-height 0.6s, opacity 0.6s;
    overflow: clip;
}

.project-enter-from,
.project-leave-to {
    max-height: 0;
    opacity: 0;
}

.project-enter-to,
.project-leave-from {
    max-height: 40rem;
    opacity: 1;
}
</style>
