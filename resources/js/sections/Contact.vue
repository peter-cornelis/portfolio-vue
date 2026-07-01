<script setup>
import { useI18n } from "vue-i18n";
import { useForm } from '@inertiajs/vue3';
import { github, linkedIn, checkmark, spinner, } from '@/components/svgs';
import { useShaker } from "@/composables/useShaker";
import { ref, computed } from 'vue';

const { t, locale } = useI18n();
const success = ref(false);
const { shake, shaker } = useShaker();
const form = useForm({
    name: '',
    email: '',
    message: ''
});

const inputsFilled = computed(() =>
    form.name.trim().length > 0 &&
    form.email.trim().length > 0 &&
    form.message.trim().length > 0
);

function submit() {
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            success.value = true;
            setTimeout(() => success.value = false, 4000);
        }
    });
}

</script>
<template>
    <section id="contact">
        <h2>{{ t('contact.title') }}</h2>
        <div class="grid md:grid-cols-[1fr_auto] gap-8 max-w-4xl mx-auto">
            <form @submit.prevent="submit" class="glass w-full">
                <label for="name">
                    {{ t('contact.form.name') }}
                    <span>{{ form.errors.name ? '| ' + t(`${form.errors.name}`) : '*' }}</span>
                    <input type="text" v-model="form.name" id="name" class="milky" :class="{ 'animate-shake': shake }">
                </label>

                <label for="email">
                    {{ t('contact.form.email') }}
                    <span>{{ form.errors.email ? '| ' + t(`${form.errors.email}`) : '*' }}</span>
                    <input type="email" v-model="form.email" id="email" class="milky"
                        :class="{ 'animate-shake': shake }">
                </label>

                <label for="message">
                    {{ t('contact.form.message') }}
                    <span>{{ form.errors.message ? '| ' + t(`${form.errors.message}`) : '*' }}</span>
                    <textarea v-model="form.message" id="message" class="milky resize-none"
                        :class="{ 'animate-shake': shake }" rows="8"></textarea>
                </label>
                <div class="relative">
                    <div @click="shaker(inputsFilled)" class="absolute w-full h-full cursor-not-allowed"
                        :class="{ 'z-20': !inputsFilled }"></div>
                    <button type="submit" class="relative w-full"
                        :class="!inputsFilled && !form.processing && !success ? 'btn-disabled' : success ? 'btn' : 'btn-secondary'"
                        :disabled="!inputsFilled || form.processing || success">
                        <span v-if="success">
                            {{ t('contact.form.success') }}
                            <checkmark class="inline-block ml-2" />
                        </span>
                        <span v-if="!success && !form.processing">
                            {{ t('contact.form.send') }}
                        </span>
                        <spinner v-if="form.processing" class="mx-auto" />
                    </button>
                </div>
            </form>
            <div class="w-fit">
                <div class="w-full glass pt-4 rounded-lg mb-auto hidden md:block">
                    <h3 class="text-center">Socials</h3>
                    <ul
                        class="grid grid-cols-2 mt-4 py-3 outline outline-black/10 bg-linear-to-r from-violet-400 to-teal-400 dark:from-violet-500 dark:to-teal-400 rounded-b-lg">
                        <li class="border-r border-white/25">
                            <a href="https://github.com/peter-cornelis" target="_blank" rel="noopener noreferrer"
                                :title="t('general.github_profile')" class="relative group">
                                <github
                                    class="w-7 mx-auto cursor-pointer text-white group-hover:scale-110 transition-transform" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/peter-cornelis-dev/" target="_blank"
                                rel="noopener noreferrer" :title="t('general.linkedin_profile')" class="relative group">
                                <linked-in
                                    class="w-7 mx-auto cursor-pointer text-white group-hover:scale-110 transition-transform" />
                            </a>
                        </li>
                    </ul>
                </div>
                <a :href="`/download-pdf/${locale}`" target="_blank" :aria-label="t('general.download_cv')"
                    rel="noopener noreferrer"
                    class="group text-white shadow outline outline-black/10 bg-linear-to-r from-violet-400 to-teal-400 dark:from-violet-500 dark:to-teal-400 rounded-lg py-3 px-5 hidden md:flex mt-8 items-center justify-center">
                    <svg class="w-7 rounded-sm mx-auto mr-4 group-hover:scale-110 transition-transform"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        fill="currentColor">
                        <path
                            d="M200-200v-560 179-19 400Zm80-240h221q2-22 10-42t20-38H280v80Zm0 160h157q17-20 39-32.5t46-20.5q-4-6-7-13t-5-14H280v80Zm0-320h400v-80H280v80Zm-80 480q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v258q-14-26-34-46t-46-33v-179H200v560h202q-1 6-1.5 12t-.5 12v56H200Zm409-229q-29-29-29-71t29-71q29-29 71-29t71 29q29 29 29 71t-29 71q-29 29-71 29t-71-29ZM480-120v-56q0-24 12.5-44.5T528-250q36-15 74.5-22.5T680-280q39 0 77.5 7.5T832-250q23 9 35.5 29.5T880-176v56H480Z" />
                    </svg>
                    Curriculum Vitae
                </a>

            </div>
        </div>
    </section>
</template>
