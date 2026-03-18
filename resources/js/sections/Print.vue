<script setup>
    import { useI18n } from "vue-i18n";
    import { house, phone, mail, car, linkedIn, github, linked } from "@/components/svgs";
    import { useContact } from "@/composables/useContact";
    import TimelineItemVert from "@/components/TimelineItemVert.vue";
    import TechLists from "@/components/TechLists.vue";

    const { contact } = useContact();

    const { t } = useI18n();
</script>
<template>
    <div class="relative not-print:hidden w-5xl">
        <div class="grid grid-cols-[1fr_auto] pt-4 px-6">
            <h1 class="w-fit text-4xl font-bold py-2 bg-teal-500 text-white px-4 rounded-md rotate-1 shadow">{{ contact.name }}</h1>
            <p class="text-2xl font-bold mb-4 mt-2 bg-violet-400 text-white py-1 px-4 rounded-md w-fit -rotate-0.5 shadow">Full-Stack Developer</p>
            <address class="grid grid-cols-2 text-lg mb-12 mr-8">
                <ul class="grid gap-2">
                    <li class="flex items-start gap-2">
                        <house class="icon mt-1" />
                        <span class="inline-block">
                            {{ t('contact.street') }}
                            <span class="block">{{ t('contact.city') }},</span>
                            {{ t('contact.country') }}
                        </span>
                    </li>
                    <li class="flex items-center gap-2">
                        <phone class="icon" />
                        <a :href="`tel:${contact.phone}`">{{ contact.phone }}</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <mail class="icon" />
                        <a :href="`mailto:${contact.email}`">{{ contact.email }}</a>
                    </li>
                </ul>
                <ul class="grid gap-2 ml-auto mb-auto text-right">
                    <li class="flex items-center justify-end gap-2">
                        <a href="https://dev.petercornelis.be">www.petercornelis.be</a>
                        <linked class="icon"/>
                    </li>
                    <li class="flex items-center justify-end gap-2">
                        <a :href="contact.linkedin">peter-cornelis-dev</a>
                        <linkedIn class="w-7 h-7 text-text/80"/>
                    </li>
                    <li class="flex items-center justify-end gap-2">
                        <a :href="contact.github">peter-cornelis</a>
                        <github class="w-7 h-7 text-text/80"/>
                    </li>
                    <li class="flex items-center justify-end gap-2 mt-5">
                        {{ t('contact.drive') }}
                        <car class="icon"/>
                    </li>
                </ul>
            </address>
            <span class="bg-text/80 rounded-[50%_50%_50%_10%] p-1 w-fit h-fit row-start-1 col-start-2 row-span-3 my-auto">
                <img src="../../images/profiel-15.avif" alt="" class="w-64 h-64 rounded-[50%_50%_9%_50%] shadow shadow-black/20 scale-x-[-1]">
            </span>
        </div>
        <p class="px-6 py-6 mx-1 mb-4 text-lg text-primary bg-text/80 font-semibold rounded-md shadow">{{ t('about.print_introduction') }}</p>
        <div class="p-4">
            <h2 class="col-span-2">{{ t('skills.title') }}</h2>
            <article class="grid grid-cols-4 gap-8 lg:mt-0 mx-auto lg:col-start-2 lg:row-start-1">
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
        <h2 class="pt-8">{{ t('skills.sub_1_title') }}</h2>
        <tech-lists :mono="true"/>
        <h2>{{ t('experience.title') }}</h2>
        <div class="w-fit mx-auto">
            <ol class="relative flex w-full mt-38 border-t mx-auto mr-8 border-black/10">
                <timeline-item-vert end="2006" at="Sint-Vincentius Deinze" class="relative top-7 left-0 w-60">
                    {{ t('experience.sub_4_title') }}
                </timeline-item-vert>
                <timeline-item-vert start="2007" end="2012" at="Colora Gent" :isWork="true" class="absolute -top-29 left-35 w-30">
                    {{ t('experience.sub_3_title') }}
                </timeline-item-vert>
                <timeline-item-vert start="2014" end="2015" at="vdab" class="relative top-7 left-13 w-30">
                    {{ t('experience.sub_5_title') }}
                </timeline-item-vert>
                <timeline-item-vert start="2015" end="2024" at="Codima BV" :isWork="true" class="relative -top-29 left-20 w-50">
                    {{ t('experience.sub_2_title') }}
                </timeline-item-vert>
                <timeline-item-vert start="2023" end="2024" at="HoGent" class="relative top-7 left-10 w-70">
                    Micro-Credential - Financiële planning voor particulieren
                </timeline-item-vert>
                <timeline-item-vert start="2025" :end="`${t('experience.present')}`" at="vdab" class="absolute -top-29 right-0 w-50">
                    {{ t('experience.sub_1_title') }}
                </timeline-item-vert>
            </ol>
        </div>
    </div>
</template>
