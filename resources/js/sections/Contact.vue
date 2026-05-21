<script setup>
import { useI18n } from "vue-i18n";
import { useForm } from '@inertiajs/vue3';
import { github, linkedIn, checkmark, spinner } from '@/components/svgs';
import { useShaker } from "@/composables/useShaker";
import { ref, computed } from 'vue';

const { t } = useI18n();
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
            <div class="w-fit bg-linear-to-r glass pt-4 rounded-lg mb-auto hidden md:block">
                <h3 class="text-center">Socials</h3>
                <ul
                    class="grid grid-flow-col w-fit mt-4 py-4 px-8 items-center bg-linear-to-r from-violet-300 to-teal-300 dark:from-violet-500 dark:to-emerald-400 text-black rounded-b-lg">
                    <li class="border-r pr-4 border-white/25">
                        <a href="https://github.com/peter-cornelis" target="_blank" rel="noopener noreferrer"
                            :title="t('general.github_profile')" class="relative">
                            <github class="w-8 cursor-pointer text-white" />
                        </a>
                    </li>
                    <li class="pl-4">
                        <a href="https://www.linkedin.com/in/peter-cornelis-dev/" target="_blank"
                            rel="noopener noreferrer" :title="t('general.linkedin_profile')" class="relative">
                            <linked-in class="w-8 cursor-pointer text-white" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>
