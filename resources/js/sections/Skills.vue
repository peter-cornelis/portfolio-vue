<script setup>
import { useI18n } from "vue-i18n";
import StarRating from "@/components/StarRating.vue";
import { techIcons } from "@/components/svgs";

const { t } = useI18n();
const ratings = {
    html: 3,
    css: 3,
    mysql: 2,
    javascript: 4,
    php: 4
};
</script>
<template>
    <section id="skills">
        <h2>{{ t('skills.title') }}</h2>
        <div class="grid xl:grid-cols-[1fr_auto]">
            <div class="relative w-fit min-w-90 mx-auto lg:col-start-1">
                <span aria-hidden="true" class="absolute -top-25 -right-25 lg:top-45 lg:-left-20 bg-linear-to-br from-emerald-300 dark:from-teal-500 to-lime-200 dark:to-rose-300 w-40 h-40 rounded-full -z-10 transition-all duration-2000">
                </span>
                <article class=" white-glass w-fit">
                    <h3 class="text-center">{{ t('skills.sub_1_title') }}</h3>
                    <ul class="w-fit">
                        <star-rating v-for="(rating, skill) in ratings" :key="skill" :filled="rating">{{ t(`general.${skill}`) }}</star-rating>
                    </ul>
                </article>
            </div>
            <article class="grid md:grid-cols-2 gap-8 my-8 lg:mt-0 max-w-4xl mx-auto lg:col-start-2 lg:row-start-1">
                <div>
                    <h3>{{ t('skills.sub_2_title') }}</h3>
                    <p>{{ t('skills.sub_2_info') }}</p>
                </div>
                <div>
                    <h3>{{ t('skills.sub_3_title') }}</h3>
                    <p>{{ t('skills.sub_3_info') }}</p>
                </div>
                <div>
                    <h3>{{ t('skills.sub_4_title') }}</h3>
                    <p>{{ t('skills.sub_4_info') }}</p>
                </div>
                <div>
                    <h3>{{ t('skills.sub_5_title') }}</h3>
                    <ul class="w-fit">
                        <li class="grid grid-cols-2 gap-8 text-left">
                            <span class="font-bold text-right">{{ t('skills.sub_5_nl') }}</span>
                            {{ t('skills.sub_5_nl_state') }}
                        </li>
                        <li class="grid grid-cols-2 gap-8 text-left">
                            <span class="font-bold text-right">{{ t('skills.sub_5_eng') }}</span>
                            {{ t('skills.sub_5_eng_state') }}
                        </li>
                        <li class="grid grid-cols-2 gap-8 text-left">
                            <span class="font-bold text-right">{{ t('skills.sub_6_fr') }}</span>
                            {{ t('skills.sub_6_fr_state') }}
                        </li>
                    </ul>
                </div>
            </article>
        </div>
        <div class="overflow-x-clip mt-12">
            <h3 class="text-center font-semibold">{{ t('skills.carousel_title') }}</h3>
            <div class="relative flex">
                <div class="absolute z-20 left-0 w-16 h-full bg-linear-to-r from-primary dark:from-darkPrimary to-transparent transition-colors duration-500"></div>
                <div class="absolute z-20 right-0 w-16 h-full bg-linear-to-l from-primary dark:from-darkPrimary to-transparent transition-colors duration-500"></div>
                <ul class="flex gap-16 my-8 mx-auto px-8 w-fit animate-scroll">
                    <li v-for="(component, key) in techIcons" :key="key" class="group w-16">
                        <component :is="component.icon" class="h-12 mx-auto group-hover:scale-125 transition-transform duration-300"/>
                        <span class="block text-center mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">{{ component.name }}</span>
                    </li>
                </ul>
                <ul class="flex gap-16 my-8 mx-auto px-8 w-fit animate-scroll" aria-hidden="true">
                    <li v-for="(component, key) in techIcons" :key="key" class="group w-16">
                        <component :is="component.icon" class="h-12 mx-auto group-hover:scale-125 transition-transform duration-300"/>
                        <span class="block text-center mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">{{ component.name }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>
