import {ref, computed, onMounted, onUnmounted} from "vue";

export function useGlow(options = [4, 6, 8]) {
    const opacity = ref(4);
    const glow = computed(() => opacity.value / 10);

    let glowInterval = null;

    onMounted(() => {
        glowInterval = setInterval(() => {
            opacity.value = options[Math.floor(Math.random() * options.length)];
        }, 1000);
    });

    onUnmounted(() => {
        clearInterval(glowInterval);
    });

    return {
        glow
    };
}
