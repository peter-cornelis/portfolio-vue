<script setup>
    import { usePosition } from "@/composables/usePosition.js";
    import { useMenu } from "@/composables/useMenu.js";
    import { useI18n } from "vue-i18n";
    import ThemeToggle from "@/components/ThemeToggle.vue";
    import LanguageToggle from "@/components/LanguageToggle.vue";

    defineProps({
        value: String,
        toggleType: String,
        mobile: Boolean
    });

    const { t } = useI18n();
    const { position, setPosition } = usePosition();

    const { toggleMenu } = useMenu();
</script>
<template>
    <!--div component required for the menu toggle (single element)-->
    <component
        :is="toggleType === 'menu' ? 'div' : 'li'"
        class="group relative overflow-hidden sm:rounded-full"
        :class="{'rounded-full': toggleType, 'first:max-sm:mt-2': !toggleType }"
        @mouseenter="setPosition($event)"
        @mouseleave="setPosition($event)"
    >
        <a v-if="value" :href="`#${value}`" class="toggle-menu inline-block relative z-10 w-full text-sm font-medium text-center px-4 py-2">
            {{ t(`nav.${value}`) }}
        </a>
        <language-toggle v-if="toggleType === 'lang'"/>
        <theme-toggle v-if="toggleType === 'theme'"/>
        <button
            v-if="toggleType === 'menu'"
            @click.stop="toggleMenu"
            class="relative z-10 px-3 py-2 text-sm font-semibold"
        >Menu</button>
        <span
            class="absolute w-96 max-sm:w-7xl h-48 rounded-full bg-violet-800/7 -translate-x-1/2 -translate-y-1/2 scale-0 group-hover:scale-100 transition-transform duration-700"
            :class="{'dark:bg-violet-200/9': !mobile || toggleType }"
            :style="{ left: position.x + 'px', top: position.y + 'px' }"
        ></span>
    </component>
</template>
