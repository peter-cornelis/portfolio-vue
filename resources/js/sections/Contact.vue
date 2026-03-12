<script setup>
import { useI18n } from "vue-i18n";
import { useForm } from '@inertiajs/vue3';
import { checkmark, spinner } from '@/components/svgs';
import { ref, computed } from 'vue';

const { t } = useI18n();
const success = ref(false);
const shake = ref(false);
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

function Shaker() {
    if (!inputsFilled.value) {
        shake.value = true;
        setTimeout(() => shake.value = false, 500);
    }
}
</script>
<template>
    <section id="contact">
        <h2>{{ t('contact.title') }}</h2>
        <form @submit.prevent="submit" class="glass max-w-xl mx-auto">
            <label for="name">
                {{ t('contact.form.name') }}
                <span>{{ form.errors.name ? '| ' + t(`${form.errors.name}`) : '*' }}</span>
                <input type="text" v-model="form.name" id="name" class="milky" :class="{ 'animate-shake': shake }">
            </label>

            <label for="email">
                {{ t('contact.form.email') }}
                <span>{{ form.errors.email ? '| ' + t(`${form.errors.email}`) : '*' }}</span>
                <input type="email" v-model="form.email" id="email" class="milky" :class="{ 'animate-shake': shake }">
            </label>

            <label for="message">
                {{ t('contact.form.message') }}
                <span>{{ form.errors.message ? '| ' + t(`${form.errors.message}`) : '*' }}</span>
                <textarea v-model="form.message" id="message" class="milky resize-none" :class="{ 'animate-shake': shake }" rows="8"></textarea>
            </label>
            <div class="relative">
                <div @click="Shaker" class="absolute w-full h-full cursor-not-allowed" :class="{ 'z-20': !inputsFilled  }"></div>
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
    </section>
</template>
