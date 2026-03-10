<script setup>
import { useI18n } from "vue-i18n";
import { useForm } from '@inertiajs/vue3';
import { checkmark, spinner } from '@/components/svgs';
import { ref } from 'vue';

const { t } = useI18n();
const success = ref(false);
const form = useForm({
    name: '',
    email: '',
    message: ''
});

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
        <form @submit.prevent="submit" class="glass max-w-xl mx-auto">
            <label for="name">
                {{ t('contact.form.name') }}
                <span>{{ form.errors.name ?? '*' }}</span>
                <input type="text" v-model="form.name" id="name" class="milky">
            </label>

            <label for="email">
                {{ t('contact.form.email') }}
                <span>{{ form.errors.email ?? '*' }}</span>
                <input type="email" v-model="form.email" id="email" class="milky">
            </label>

            <label for="message">
                {{ t('contact.form.message') }}
                <span>{{ form.errors.message ?? '*' }}</span>
                <textarea v-model="form.message" id="message" class="milky resize-none" rows="8"></textarea>
            </label>

            <button type="submit" class="w-full" :class="success ? 'btn' : 'btn-secondary'">
                <span v-if="success">
                    {{ t('contact.form.success') }}
                    <checkmark class="inline-block ml-2" />
                </span>
                <span v-if="!success && !form.processing" wire:loading.remove>
                    {{ t('contact.form.send') }}
                </span>
                <spinner v-if="form.processing" class="mx-auto" />
            </button>
        </form>
    </section>
</template>
