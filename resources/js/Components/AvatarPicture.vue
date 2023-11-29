<template>
    <img
        v-if="avatar"
        :src="`/avatars/${avatar}`"
        class="rounded-xl border-2 border-gray-700 hover:border-2 hover:opacity-50 w-48 h-48"
    >
    <SecondaryButton
        class="mt-2 text-center"
        @click="openModal"
        v-show="isEditable"
    >
        Mettre à jour
    </SecondaryButton>

    <Modal
        :show="displayModal"
        :closeable="true"
        @close="closeModal"
    >
        <div class="flex flex-col items-center">
            <h1 class="pt-4 text-center text-xl font-bold">Choisissez un nouvel avatar</h1>

            <input
                type="file"
                ref="fileInput"
                @change="handleFileChange"
                class="my-4"
                accept="image/*"
            />

            <button
                @click="uploadFile"
                class="mt-4 bg-green-300 px-4 py-2 rounded-lg mb-4"
            >
                Uploader
            </button>
        </div>
    </Modal>
</template>

<script setup>
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps({
    isEditable: Boolean,
    avatar: String,
});

let displayModal = ref(false);
const file = ref(null);

const openModal = () => {
    displayModal.value = !displayModal.value;
}

const uploadFile = async () => {
    if (!file.value) {
        console.error("Aucun fichier sélectionné");
        return;
    }

    try {
        const formData = new FormData();
        formData.append("avatar", file.value);

        const response = await axios.post("/character/1/avatar/upload", formData);
    } catch (error) {
        console.error("Erreur lors du téléchargement du fichier:", error);
    } finally {
        window.location.reload();
    }
};

const handleFileChange = (event) => {
    file.value = event.target.files[0];
};

const closeModal = () => {
    displayModal.value = false
}
</script>
