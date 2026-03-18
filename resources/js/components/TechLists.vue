<script setup>
    import { useI18n } from "vue-i18n";
    import { techIcons } from "@/components/svgs";
    import { computed, shallowRef } from "vue";

    defineProps({
        mono: {
            type: Boolean,
            default: false
        },
        iconsSize: {
            type: String,
            default: 'w-9'
        }
    });

    const { t } = useI18n();
    const icons = shallowRef(Object.values(techIcons));
    const backendIcons = computed(() => icons.value.filter(icon => icon.type === 'backend'));
    const frontendIcons = computed(() => icons.value.filter(icon => icon.type === 'frontend'));
    const toolIcons = computed(() => icons.value.filter(icon => icon.type === 'tool'));
</script>
<template>
    <div class="grid grid-cols-[auto_auto] md:grid-cols-[auto_auto_auto] print:grid-cols-[auto_auto_auto] mx-auto w-fit pb-8">
        <div class="max-lg:row-1 ml-auto w-fit px-8">
            <h3 class="type-skill">Backend</h3>
            <ul class="grid grid-cols-2 gap-4">
                <li v-for="tech in backendIcons" :key="tech.name" class="grid print:flex not-print:justify-center gap-2 items-center not-print:text-center">
                    <component :is="tech.icon" :class="[iconsSize, 'not-print:mx-auto']" :mono="mono"/>
                    {{ tech.name }}
                </li>
            </ul>
        </div>
        <div class="not-print:max-md:col-span-2 md:border-l print:border-l border-black/10 not-print:dark:border-white/10 w-fit px-8 not-print:max-md:pt-8">
            <h3 class="type-skill">Frontend</h3>
            <ul class="grid grid-cols-4 gap-4">
                <li v-for="tech in frontendIcons" :key="tech.name" class="grid print:flex not-print:justify-center gap-2 items-center not-print:text-center">
                        <component :is="tech.icon" :class="[iconsSize, 'not-print:mx-auto']" :mono="mono"/>
                    {{ tech.name }}
                </li>
            </ul>
        </div>
        <div class="not-print:max-md:row-1 border-l border-black/10 not-print:dark:border-white/10 w-fit px-8">
            <h3 class="type-skill">Tools</h3>
            <ul class="grid grid-flow-col gap-4 mx-auto">
                <li v-for="tech in toolIcons" :key="tech.name" class="grid print:flex not-print:justify-center gap-2 items-center not-print:text-center">
                    <component :is="tech.icon" :class="[iconsSize, 'not-print:mx-auto']" :mono="mono"/>
                    {{ tech.name }}
                </li>
            </ul>
        </div>
    </div>
</template>
