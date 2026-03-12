<script setup>
    import { useI18n } from "vue-i18n";
    import TimelineItem from "@/components/TimelineItem.vue";

    const { t } = useI18n();
</script>
<template>
    <section id="experience">
        <h2>{{ t('experience.title') }}</h2>
        <div class="w-fit mx-auto">
            <ol class="relative w-fit ml-8 border-l border-black/20 dark:border-white/20 print:hidden">
                <timeline-item start="2025" :end="`${t('experience.present')}`" at="vdab">
                    {{ t('experience.sub_1_title') }}
                </timeline-item>
                <timeline-item start="2015" end="2024" at="Codima BV" :isWork="true">
                    {{ t('experience.sub_2_title') }}
                </timeline-item>
                <timeline-item start="2014" end="2015" at="vdab">
                    {{ t('experience.sub_5_title') }}
                </timeline-item>
                <timeline-item start="2007" end="2012" at="Colora Gent" :isWork="true">
                    {{ t('experience.sub_3_title') }}
                </timeline-item>
                <timeline-item end="2006" at="Sint-Vincentius Deinze">
                    {{ t('experience.sub_4_title') }}
                </timeline-item>
            </ol>
        </div>
    </section>
</template>
