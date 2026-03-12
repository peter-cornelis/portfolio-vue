<script setup>
    import { useI18n } from "vue-i18n";
    import { ref } from "vue";

    const { t } = useI18n();
    const open = ref(false);
    const noticed = ref(true);
    const shake = ref(false);

    setTimeout(() => noticed.value = false, 500);

    setInterval(() => {
        if (!noticed.value) {
            shake.value = !shake.value;
        }
    }, 3000);

    function toggleChat() {
        open.value = !open.value;
        if (open.value) {
            noticed.value = true;
        }
    }
</script>
<template>
    <div class="fixed bottom-4 right-4 z-90">
        <div v-if="!noticed" id="chatNotice" class="white-glass" :class="{'animate-shake': shake}">
            <div @click="noticed= true" class="close -top-1 -right-1">&#x2715;</div>
            {{t('chat.notice')}}
        </div>
        <button @click="toggleChat" class="grid relative items-center justify-center shadow-black/50 btn-circle w-12 h-12 rounded-full cursor-pointer">
            <svg aria-hidden="true" class="w-6 h-6 drop-shadow" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                <path fill="currentColor" d="M 160 -880 C 138 -880 119.18229 -872.15103 103.51562 -856.48438 C 87.848973 -840.81771 80 -822 80 -800 L 80 -80 L 240 -240 L 800 -240 C 822 -240 840.81771 -247.84897 856.48438 -263.51562 C 872.15103 -279.18229 880 -298 880 -320 L 880 -800 C 880 -822 872.15103 -840.81771 856.48438 -856.48438 C 840.81771 -872.15103 822 -880 800 -880 L 160 -880 z M 160 -800 L 160.15625 -800 L 160.07812 -799.92188 L 160.07812 -799.84375 L 160 -799.76562 L 160 -800 z M 663.04688 -754.14062 C 670.8691 -754.14062 678.11672 -752.19237 684.76562 -748.28125 C 691.41454 -744.37013 696.71388 -739.07078 700.625 -732.42188 C 704.53612 -726.16408 706.48438 -719.30613 706.48438 -711.875 C 706.48438 -704.44387 704.53612 -697.43016 700.625 -690.78125 C 696.71388 -684.52346 691.41454 -679.37987 684.76562 -675.46875 C 678.11672 -671.94874 670.86911 -670.23438 663.04688 -670.23438 C 655.61575 -670.23438 648.60204 -671.94874 641.95312 -675.46875 C 635.69534 -679.37987 630.62987 -684.52346 626.71875 -690.78125 C 622.80763 -697.43016 620.85937 -704.44387 620.85938 -711.875 C 620.85938 -719.30613 622.80763 -726.16408 626.71875 -732.42188 C 630.62987 -739.07078 635.69534 -744.37013 641.95312 -748.28125 C 648.60204 -752.19237 655.61575 -754.14062 663.04688 -754.14062 z M 362.10938 -743.51562 L 444.84375 -743.51562 L 585.07812 -367.5 L 585.07812 -363.35938 L 514.6875 -363.35938 L 478.90625 -464.29688 L 326.32812 -464.29688 L 291.17188 -363.35938 L 222.5 -363.35938 L 222.5 -367.5 L 362.10938 -743.51562 z M 402.03125 -681.32812 L 345.07812 -518.28125 L 459.53125 -518.28125 L 402.03125 -681.32812 z M 695.9375 -629.14062 L 695.9375 -363.35938 L 632.57812 -363.35938 L 632.57812 -622.73438 L 695.9375 -629.14062 z"/>
            </svg>
        </button>
    </div>
    <transition name="fade">
        <div v-if="open" @click="toggleChat" class="fixed z-30 top-13.5 left-0 bg-black/5 w-full h-screen backdrop-blur-lg"></div>
    </transition>
    <transition name="chat">
        <section id="chat" v-if="open" class="fixed white-glass pb-2 top-1/2 left-1/2 -translate-1/2 w-full z-30 sm:max-w-lg">
            <button class="close top-2 right-2" @click="toggleChat">&#x2715;</button>
            <h2 class="text-3xl px-6 mt-6 text-left">{{t('chat.title')}}</h2>
            <form action="" class="grid gap-4">
                <div class="contrastic rounded-md p-1">
                    <div class="max-h-[calc(100vh-19rem)] [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar]:bg-transparent [&::-webkit-scrollbar-thumb]:rounded-xs [&::-webkit-scrollbar-thumb]:bg-white/40 overflow-y-auto">
                        <div class="p-2">
                            {{t('chat.introduction')}} <br>
                            {{ t('chat.q_title')}}
                            <ul class="list-disc text-sm ml-8">
                                <li>{{ t('chat.q_1') }}</li>
                                <li>{{ t('chat.q_2') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <input type="text" class="contrastic w-full" :placeholder="t('chat.placeholder')">
                <button type="submit" class="btn-secondary w-full">{{ t('chat.ask') }}</button>
            </form>
        </section>
    </transition>
</template>
<style scoped>
    /* scoped only applies to the current component https://vuejs.org/api/sfc-css-features.html */
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.5s ease;
    }

    .fade-enter-from, .fade-leave-to {
        opacity: 0;
    }

    .chat-enter-active, .chat-leave-active {
        transition: all 0.5s ease;
    }

    .chat-enter-from, .chat-leave-to {
        transform: rotateX(-0.25turn);
        opacity: 0;
    }
</style>
