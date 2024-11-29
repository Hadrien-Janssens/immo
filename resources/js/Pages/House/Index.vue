<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({ houses: Array });
</script>

<template>
    <AppLayout>
        <Head title="Welcome" />
        <div class="flex justify-between p-1">
            <h1 class="font-bold text-3xl">Liste des maisons</h1>
            <Link :href="route('house.create')">
                <SecondaryButton>Ajouter</SecondaryButton>
            </Link>
        </div>
        <ul class="flex flex-col gap-3 justify-center">
            <li
                v-for="house in houses"
                :key="house.id"
                class="border p-5 rounded-md my-2 max-w-6xl m-auto"
            >
                <Link
                    :href="route('house.edit', { house })"
                    class="flex flex-col md:flex-row gap-3 md:justify-center"
                >
                    <figure class="basis-1/2">
                        <img
                            :src="house.images[0]?.url"
                            :alt="house.title"
                            class="w-full h-full object-cover rounded-md"
                        />
                    </figure>
                    <div
                        class="flex flex-col justify-between gap-3 p-1 basis-1/2"
                    >
                        <div>
                            <p class="font-bold mb-4">{{ house.title }}</p>
                            <p class="text-sm line-clamp-3">
                                {{ house.description }}
                            </p>
                        </div>
                        <div
                            class="shadow md:p-3 grow flex flex-col justify-around"
                        >
                            <p>
                                <span class="text-gray-600">Chambres</span> :
                                {{ house.bedrooms }}
                            </p>
                            <p>
                                <span class="text-gray-600">Superficie</span> :
                                {{ house.size }} m²
                            </p>
                            <p>
                                <span class="text-gray-600">Prix</span> :
                                {{ house.price }} €
                            </p>
                            <p>
                                <span class="text-gray-600">Adresse</span> :
                                {{ house.address }}
                            </p>
                        </div>
                    </div>
                </Link>
            </li>
        </ul>
    </AppLayout>
</template>
