<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();
</script>
<template>
    <section id="contact">
        <h2>{{ t('contact.title') }}</h2>
        <form action="" method="POST" class="glass">
            <label for="">
                {{ t('contact.form.name') }}
                <input type="text" name="name" id="name" required>
            </label>

            <label for="">
                {{ t('contact.form.email') }}
                <input type="email" name="email" id="email" required>
            </label>

            <label for="">
                {{ t('contact.form.message') }}
                <textarea name="message" id="message" required></textarea>
            </label>

            <button type="submit">{{ t('contact.form.send') }}</button>
        </form>
    </section>
</template>
