<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-b from-gray-900 via-gray-900/95 to-gray-800 text-gray-100 p-6">
        <div class="max-w-6xl w-full">
            <!-- Hero -->
            <div class="text-center mb-10">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-gray-200 drop-shadow-lg">
                    Chroniques Oubliées<br />Contemporain
                </h1>
                <p class="my-4 text-lg sm:text-xl text-gray-300 font-medium font-bold">Gestion de feuilles de personnages</p>
            </div>

            <div class="flex justify-center gap-8 my-4">
                <Link
                    href="/login"
                    class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gray-400 hover:bg-gray-700 text-white font-semibold shadow-md"
                >
                    Connexion
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden>
                        <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </Link>
                <Link
                    href="/quick"
                    class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-indigo-400 hover:bg-indigo-700 text-white font-semibold shadow-md"
                >
                    Consultation
                </Link>
            </div>


            <!-- Feature grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
                <!-- Left column: description + CTA -->
                <div class="md:col-span-2 bg-gray-800/60 backdrop-blur-md rounded-2xl p-6 border border-gray-700 shadow-lg flex flex-col justify-between">
                    <div>
                        <div class="flex items-start gap-2">
                            <div class="p-3 rounded-lg bg-gray-600 text-gray-200">
                                <!-- book icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 20h9" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 4H7a2 2 0 00-2 2v12" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h14v7H7V8z" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-xl font-semibold">Gestion des personnages pour les joueurs</h2>
                                <p class="mt-2 text-gray-300 text-sm leading-relaxed">
                                    Consulter rapidement ses personnages de jeu de rôle sur tablette ou smartphone.
                                </p>
                            </div>
                        </div>
                        <h2 class="my-4 text-xl font-bold text-gray-300 leading-relaxed">
                            Attributs du personnage
                        </h2>
                        <img src="/img/screenshots/attributs.png" alt="attributs" class="mt-2 w-full rounded-md border border-gray-700 shadow-sm" />
                        <img src="/img/screenshots/attributs2.png" alt="attributs" class="mt-2 w-full rounded-md border border-gray-700 shadow-sm" />

                        <h2 class="my-4 text-xl font-bold text-gray-300 leading-relaxed">
                            Jauges PV et PC
                        </h2>
                        <img src="/img/screenshots/jauges.png" alt="attributs" class="mt-2 w-full rounded-md border border-gray-700 shadow-sm" />

                        <h2 class="my-4 text-xl font-bold text-gray-300 leading-relaxed">
                            Affichage des capacités
                        </h2>
                        <img src="/img/screenshots/voies.png" alt="attributs" class="mt-2 w-full rounded-md border border-gray-700 shadow-sm" />
                    </div>
                </div>

                <!-- Right column: quick consult card -->
                <aside class="bg-gradient-to-br from-gray-900/70 to-gray-800/60 rounded-2xl p-6 border border-gray-700 shadow-lg flex flex-col justify-between">
                    <div>
                        <div class="flex items-start gap-3">
                            <div class="p-3 rounded-lg bg-indigo-600/10 text-indigo-300">
                                <!-- camera / quick view icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A2 2 0 0122 9.618V15a2 2 0 01-2 2H4a2 2 0 01-2-2V9.618a2 2 0 01.447-1.894L7 4l1.5 1.5L12 7l3.5-1.5L17 4l3.553 3.724A2 2 0 0122 9.618V15" />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold">Consultation simplifiée pour le MJ</h3>
                                <p class="mt-2 text-gray-300 text-sm leading-relaxed">
                                    Accès rapide à tous les personnages d'une chronique
                                </p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</template>

