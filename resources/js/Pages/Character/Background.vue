<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import {onMounted, ref} from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {useEditor, EditorContent} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const editor = useEditor({
    content: background,
    extensions: [
        StarterKit,
    ],
})

onMounted(()=>{
    background.value = props.background
})

const props = defineProps({
    character: Object,
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
    axios.patch(`/character/${props.character.id}/background`, {
        background: background.value,
    }).then(() => {
        displayModal.value = false;
    }).catch(error => console.log(error));
}
</script>

<template>
    <div class="mx-auto mt-4">
        <div class="card px-2">
            <div class="flex justify-between">
                <h1 class="card-header">Background</h1>
                <primary-button
                    v-if="props.background"
                    @click="openModal"
                    :closeable="true"
                    @close="closeModal"
                >
                    Mettre à jour
                </primary-button>
            </div>
            <div class="attribute">
                <div class="flex w-full p-2 justify-between">
                    <div v-if="background">
                        <p v-html="background"></p>
                    </div>
                    <div v-else>
                        <primary-button
                            @click="openModal"
                            :closeable="true"
                            @close="closeModal"
                        >
                            Créer un background
                        </primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Modal
        class="w-full"
        :show="displayModal"
        :closeable="true"
        @close="closeModal"
    >
        <div class="flex flex-col items-center p-4">
            <textarea class="w-full" v-model="background">
            </textarea>
<!--            <editor-content class="w-full px-2 rounded-lg border-2 border-slate-400" :editor="editor" />-->

            <secondary-button
                class="mt-4"
                @click="updateBackground"
            >
                Confirmer
            </secondary-button>
        </div>
    </Modal>
</template>
