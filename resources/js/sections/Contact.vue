<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();
</script>
<template>
    <section id="contact">
        <h2>{{ t('contact.title') }}</h2>
        <form action="" method="POST" class="glass max-w-xl mx-auto">
            <label for="">
                {{ t('contact.form.name') }}
                <input type="text" name="name" id="name" class="milky" required>
            </label>

            <label for="">
                {{ t('contact.form.email') }}
                <input type="email" name="email" id="email" class="milky" required>
            </label>

            <label for="">
                {{ t('contact.form.message') }}
                <textarea name="message" id="message" class="milky" required></textarea>
            </label>

            <button type="submit" class="btn w-full">{{ t('contact.form.send') }}</button>
        </form>
    </section>
</template>
