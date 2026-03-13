import { ref } from "vue";

// Keep variables inside the useShaker function (No module scope variables),
// this way the shake state is independent for all components that use this composable.

export function useShaker() {

    const shake = ref(false);

    function shaker(inputFilled, timeout = 500) {
        if (!inputFilled) {
            shake.value = true;
            setTimeout(() => shake.value = false, timeout);
        }
    }

    return { shake, shaker };
}
