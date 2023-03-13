<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import { onMounted, reactive } from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    attribute: Object,
});

const form = useForm({
    name: props.attribute.name,
    description: props.attribute.description,
});

function submitForm () {
    router.put(`/admin/attributes/${props.attribute.id}`, form);
}
</script>


<template>
    <Head title="Attributs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edition attribut</h2>
        </template>

        <div class="p-6 mx-auto">
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <InputLabel value="Nom"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.name"
                />

                <InputLabel class="mt-4" value="Description"/>
                <textarea
                    class="rounded-lg px-4 py-2 border border-gray-100"
                    v-model="form.description"
                >
                </textarea>

                <SecondaryButton type="submit" class="mt-4 px-4 py-2 bg-green-300 text-center">
                    Confirmer
                </SecondaryButton>
            </form>
        </div>

    </AuthenticatedLayout>
</template>

