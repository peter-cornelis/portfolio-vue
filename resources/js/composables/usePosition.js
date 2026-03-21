import { ref, computed } from "vue";

export function usePosition() {
    const x = ref(0);
    const y = ref(0);

    function setPosition(event) {
        x.value = event.offsetX;
        y.value = event.offsetY;
    }

    const position = computed(() => {
        return { x: x.value, y: y.value };
    });

    return {
        position,
        setPosition,
    };
}
