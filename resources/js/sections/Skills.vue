<script setup>
import { useI18n } from "vue-i18n";
import { techIcons } from "@/components/svgs";
import TechLists from "@/components/TechLists.vue";

const { t } = useI18n();
</script>
<template>
    <section id="skills">
        <h2>{{ t('skills.title') }}</h2>
        <article
            class="grid md:grid-cols-2 xl:grid-cols-4 gap-8 my-8 lg:mt-0 max-w-4xl mx-auto lg:col-start-2 lg:row-start-1">
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
        <h3 class="text-center font-semibold py-8">{{ t('skills.sub_1_title') }}</h3>
        <tech-lists :icons-size="'w-10'" />
    </section>
</template>
