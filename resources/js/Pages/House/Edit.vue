<template>
    <AppLayout>
        <form @submit.prevent="form.put(route('house.update', props.house))">
            <div class="mt-5 md:mt-0 md:col-span-2 max-w-6xl m-auto">
                <div class="px-4 py-5 bg-white sm:p-6 shadow">
                    <!-- title -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="title" value="title" />
                        <TextInput
                            id="title"
                            type="text"
                            v-model="form.title"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError message="" class="mt-2" />
                    </div>

                    <!-- description -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="description" value="description" />
                        <TextInput
                            id="description"
                            type="text"
                            v-model="form.description"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError message="" class="mt-2" />
                    </div>
                    <!-- address -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="address" value="adresse" />
                        <TextInput
                            id="address"
                            type="text"
                            v-model="form.address"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError message="" class="mt-2" />
                    </div>
                    <div class="flex justify-between">
                        <!-- size -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="size" value="superficie" />
                            <TextInput
                                id="size"
                                type="number"
                                v-model="form.size"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError message="" class="mt-2" />
                        </div>
                        <!-- rooms -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="rooms" value="nombre de chambre" />
                            <TextInput
                                id="rooms"
                                type="number"
                                v-model="form.bedrooms"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError message="" class="mt-2" />
                        </div>
                        <!-- price -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="price" value="prix" />
                            <TextInput
                                id="price"
                                type="number"
                                v-model="form.price"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError message="" class="mt-2" />
                        </div>
                    </div>

                    <!-- img -->
                    <div class="flex overflow-scroll my-2">
                        <img
                            v-for="img in form.images"
                            :src="img.url"
                            alt=""
                            class="basis-1/2"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="img" value="ajouter un photos" />
                        <input id="img" type="file" class="mt-1 block w-full" />
                        <InputError message="" class="mt-2" />
                    </div>

                    <div class="flex justify-between mt-5">
                        <SecondaryButton @click="deleteHouse"
                            >supprimer</SecondaryButton
                        >
                        <div class="flex items-center gap-2">
                            <ActionMessage on="" class="me-3">
                                Saved.
                            </ActionMessage>
                            <PrimaryButton>
                                sauvegarder les modifications
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </AppLayout>
</template>

<script setup lang="ts">
import ActionMessage from "@/Components/ActionMessage.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/vue3";

const props = defineProps(["house"]);
const form = useForm(props.house);

const deleteHouse = () => {
    Inertia.delete(route("house.destroy", props.house.id));
};
</script>
