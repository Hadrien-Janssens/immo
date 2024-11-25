<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({ house: Object });
const form = useForm(props.house);
</script>

<template>
    <AppLayout>
        <Head title="Welcome" />
        <h1>Modifier la maison</h1>
        <form @submit.prevent="form.put(route('house.update', props.house))">
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="photos" value="photos" />
                <img :src="house.images[0].url" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="title" value="title" />
                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.errors.title" class="mt-2" />
            </div>
            <div>
                <InputLabel for="description" value="description" />

                <textarea
                    rows="5"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                    id="description"
                    >{{ form.description }}</textarea
                >
            </div>
            <PrimaryButton class="mt-4">Modifier</PrimaryButton>
        </form>
    </AppLayout>
</template>
