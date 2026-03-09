// https://developer.mozilla.org/en-US/docs/Web/API/Window/matchMedia

import { ref, watch } from "vue";

const showMobile = ref(false);

function toggleMenu() {
    showMobile.value = !showMobile.value;
}

function onDocumentClick(e) {
  if (e.target.closest('.mobile-menu') || e.target.closest('header')) return;
  showMobile.value = false;
}

watch(showMobile, (open) => {
    if (open) {
        document.addEventListener('click', onDocumentClick);
    } else {
        document.removeEventListener('click', onDocumentClick);
    }
});

export function useMenu() {
    return { showMobile, toggleMenu };
}
