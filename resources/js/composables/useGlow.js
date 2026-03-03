import {ref, computed, onMounted, onUnmounted} from "vue";

export function useGlow(options = [2, 4]) {
    const opacity = ref(4);
    const glow = computed(() => opacity.value / 10);

    let glowInterval = null;

    onMounted(() => {
        glowInterval = setInterval(() => {
            opacity.value = options[Math.floor(Math.random() * options.length)];
        }, 1500);
    });

    onUnmounted(() => {
        clearInterval(glowInterval);
    });

    return {
        glow
    };
}
