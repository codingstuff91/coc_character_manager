<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import {ref} from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
    background: Object,
})

let displayModal = ref(false);
let background = ref('');

const openModal = () => {
    displayModal.value = !displayModal.value;
}

const closeModal = () => {
    displayModal.value = false
}

const updateBackground = () => {
    console.log('submit background')
    displayModal.value = false;
}
</script>

<template>
    <div class="mx-auto mt-4">
        <div class="card">
            <h1 class="card-header">Background</h1>
            <div class="attribute">
                <div class="flex w-full p-2 justify-between">
                    <div v-if="! background">
                        <primary-button
                            @click="openModal"
                            :closeable="true"
                            @close="closeModal"
                        >
                            Créer un background
                        </primary-button>
                    </div>
                    <div>
                        <p v-html="background?.description"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Modal
        :show="displayModal"
        :closeable="true"
        @close="closeModal"
    >
        <div class="flex flex-col items-center p-4">
            <h1 class="pt-4 text-center text-xl font-bold">Créez un background</h1>

            <quill-editor v-model:value="state.content"></quill-editor>

            <secondary-button
                @click="updateBackground"
            >
                Confirmer
            </secondary-button>
        </div>
    </Modal>
</template>
