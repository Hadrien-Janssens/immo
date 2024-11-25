<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({ houses: Array });
</script>

<template>
    <AppLayout>
        <Head title="Welcome" />

        <h1 class="font-bold text-3xl">Liste des maisons</h1>
        <ul class="flex flex-col gap-3 justify-center">
            <li
                v-for="house in houses"
                :key="house.id"
                class="border basis-96 p-5 rounded-md"
            >
                <Link :href="route('house.edit', { house })">
                    <img :src="house.images[0].url" :alt="house.title" />
                    <p class="font-bold">{{ house.title }}</p>
                    <p class="text-sm">{{ house.description }}</p>
                    <div class="shadow">
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
                </Link>
            </li>
        </ul>
    </AppLayout>
</template>
