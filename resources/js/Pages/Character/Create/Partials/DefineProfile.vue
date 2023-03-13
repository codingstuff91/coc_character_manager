<script setup>
import { useCharacterCreationStore } from "@/Stores/character-creation-store";
import { watch } from "vue";
import InfoMessage from "@/Components/InfoMessage.vue";
const store = useCharacterCreationStore();
const profiles = store.profiles;
const profile = store.profile;
let characterWays = store.characterWays;

watch(() => profile.id, async () => {
    await store.getCharacterWays(profile.id);
    await store.setProfile(profile.id);
});
</script>

<template>
    <div>
        <h2 class="text-xl font-bold">Choix du profil métier</h2>
        <info-message>
            <p>Dépend de la famille de personnage choisi à l'étape 1 (Action, Aventure ou Réflexion)</p>
        </info-message>
        <div>
            <div class="w-2/4 mx-auto mt-4">
                <select v-model="profile.id" class="rounded-lg w-full">
                    <option v-for="profile in profiles"
                            :key="profile.name"
                            :value="profile.id">
                        {{ profile.name }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>
