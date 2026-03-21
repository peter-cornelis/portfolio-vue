import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";

export function useContact() {
    const page = usePage();
    const contact = ref(page.props.contact);

    return {
        contact,
        name: contact.value.name,
        phone: contact.value.phone,
        email: contact.value.email,
        github: contact.value.github,
        linkedIn: contact.value.linkedIn,
    };
}
