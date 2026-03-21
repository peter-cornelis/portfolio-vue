import { ref } from "vue";

const media = window.matchMedia("(min-width: 896px)");
const isDesktop = ref(media.matches);

media.addEventListener("change", (e) => {
    isDesktop.value = e.matches;
});

export function useDimension() {
    return { isDesktop };
}
