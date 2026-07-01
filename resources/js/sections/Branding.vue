<script setup>
import { techIcons } from "@/components/svgs";
</script>
<template>
    <section id="about" class="relative grid lg:grid-cols-[auto_1fr] my-10">
        <span aria-hidden="true"
            class="absolute -top-302 -left-100 bg-linear-to-tr from-emerald-300 dark:from-emerald-600 to-cyan-200 dark:to-cyan-500 w-400 h-400 rounded-full -z-10 shadow-[0px_0px_70px_15px] shadow-teal-300/20 dark:shadow-teal-200/20 border border-black/10 animate-rotation transition-colors duration-500">
        </span>
        <span aria-hidden="true"
            class="absolute -top-212 -left-10 bg-primary dark:bg-darkPrimary w-220 h-220 rounded-full -z-10 shadow-[inset_0_0_40px_15px] shadow-teal-300/20 dark:shadow-teal-300/20 border border-teal-600/30 dark:border-teal-900/50 transition-colors duration-500">
        </span>
        <div class="relative">
            <component :is="techIcons.php.icon"
                class="w-42 mb-4 absolute left-300 -top-8 rotate-25 drop-shadow-lg drop-shadow-black/30 text-violet-500"
                :mono="true" />
            <component :is="techIcons.laravel.icon"
                class="w-36 mb-4 absolute left-240 top-38 -rotate-12 drop-shadow-lg drop-shadow-black/30 text-rose-400"
                :mono="true" />
            <component :is="techIcons.html.icon"
                class="w-32 mb-4 absolute left-170 -top-5 rotate-3 drop-shadow-lg drop-shadow-black/30 text-yellow-300"
                :mono="true" />
            <component :is="techIcons.css.icon"
                class="w-24 mb-4 absolute left-100 top-15 rotate-0 drop-shadow-lg drop-shadow-black/30 text-green-400"
                :mono="true" />

            <component :is="techIcons.javascript.icon"
                class="w-16 mb-4 absolute left-140 top-45 rotate-6 drop-shadow-lg drop-shadow-black/30 text-lime-400"
                :mono="true" />
        </div>
    </section>

</template>
