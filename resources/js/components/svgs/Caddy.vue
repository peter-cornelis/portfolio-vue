<script setup>
defineProps({
    mono: {
        type: Boolean,
        default: false
    },
    knowledge: {
        type: Boolean,
        default: true
    }
});
</script>
<template>
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="Layer_1" x="0" y="0" viewBox="0 0 512 512"
        :stroke="mono ? 'currentColor' : 'none'" :fill="mono ? 'currentColor' : 'none'">
        <g id="Icon" transform="matrix(.85801 0 0 .90748 -3246.99 -1465.83)">
            <path id="path2"
                d="M-51.7 26.4c.1-6.4-5.5-11.6-12.2-11.6-3.6 0-6.8 1.5-9.1 3.9-2 2.1-3.3 4.9-3.3 7.9-.1 6.4 5.5 11.6 12.2 11.6 6.7-.1 12.3-5.4 12.4-11.8z"
                :stroke="mono ? 'currentColor' : '#1f88c0'"
                style="display:inline;fill:none;stroke-width:5.7819;stroke-linejoin:round;stroke-miterlimit:22.0264"
                transform="rotate(188.679 2107.672 748.746)scale(3.41014)" />
            <path id="path3"
                d="M4217.164 1832.067s7.23-6.484 16.677-14.671c15.922-15.027 37.43-36.213 37.43-36.213l-7.031-7.707s-25.336 16.637-43.393 29.559c-9.982 7.66-18.28 13.092-18.28 13.092z"
                class="st0" />
            <g id="Padlock" style="display:inline">
                <path id="path4"
                    d="M24.1 91.2h51c2.9 0 5.2-2.2 5.2-4.9V37.9c0-2.7-2.3-4.9-5.2-4.9H-.8C-3.7 33-6 35.2-6 37.9v28.6"
                    :stroke="mono ? 'currentColor' : '#22b638'"
                    style="fill:none;stroke-width:9.5045;stroke-miterlimit:20.1153"
                    transform="translate(3938.31 1737.25)scale(3.11426)" />
                <path id="path5" d="M12.6 33V9.7c0-12.8 11.1-23.3 24.6-23.3S61.8-3.1 61.8 9.7V33"
                    :stroke="mono ? 'currentColor' : '#22b638'"
                    style="fill:none;stroke-width:9.5045;stroke-linejoin:round;stroke-miterlimit:20.1153"
                    transform="translate(3938.31 1737.25)scale(3.11426)" />
            </g>
            <path id="path6"
                d="M28.5 56.3c0-2-.5-3.9-1.4-5.5-2.1-3.6-6.1-6.1-10.8-6.1C9.6 44.7 4 50 3.9 56.4 3.9 62.8 9.4 68 16.1 68s12.3-5.3 12.4-11.7Z"
                :stroke="mono ? 'currentColor' : '#1f88c0'"
                style="display:inline;fill:none;stroke-width:8.4748;stroke-linejoin:round;stroke-miterlimit:34.5908"
                transform="rotate(7.483 -11286.0508 30322.6703)scale(5.35538)" />
            <path id="path7"
                d="M4036.657 1923.344s-40.417 23.032-69.58 40.521c-16.492 10.221-28.941 18.58-28.941 18.58l25.805 31.141s11.845-9.152 26.031-22.006c25.046-22.506 58.435-53.981 58.435-53.981z" />
        </g>
    </svg>
</template>
