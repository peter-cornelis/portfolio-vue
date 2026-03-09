<script setup>
defineProps({
    filled: Number,
    size: { type: String, default: 'w-4 h-4' }
});
</script>

<template>
    <li class="grid grid-cols-2 py-2 items-center gap-4">
        <slot />
        <div class="flex items-center gap-4">
            <svg
                v-for="i in 5"
                :key="i"
                class="hover:scale-125 duration-300"
                :class="[
                    size,
                    filled >= i
                        ? 'fill-yellow-400 dark:fill-yellow-600 print:fill-yellow-600'
                        : 'opacity-15 not-print:dark:opacity-70'
                ]"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 16 16"
            >
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
            </svg>
        </div>
    </li>
</template>
