<template>
    <AppLayout>
        <form
            @submit.prevent="house.post(route('house.store'), house)"
            enctype="multipart/form-data"
        >
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow">
                    <!-- title -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="title" value="title" />
                        <TextInput
                            id="title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="house.title"
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
                            v-model="house.description"
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
                            v-model="house.address"
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
                                v-model="house.size"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError message="" class="mt-2" />
                        </div>
                        <!-- rooms -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel
                                for="bedrooms"
                                value="nombre de chambre"
                            />
                            <TextInput
                                id="bedrooms"
                                type="number"
                                v-model="house.bedrooms"
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
                                v-model="house.price"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError message="" class="mt-2" />
                        </div>
                    </div>

                    <!-- img -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="img" value="Photos" />
                        <!-- Preview des images -->
                        <div class="col-span-6 sm:col-span-4 mt-4">
                            <div
                                v-if="previews.length"
                                class="flex gap-3 overflow-scroll p-1 py-3"
                            >
                                <div
                                    v-for="(preview, index) in previews"
                                    :key="index"
                                    class="mb-4 relative"
                                >
                                    <button
                                        class="absolute -right-1 -top-1 rounded-full border w-5 h-5 bg-red-500 border-none font-extrabold text-white flex justify-center items-cente text-xs"
                                        @click="cancelImg(index)"
                                    >
                                        x
                                    </button>
                                    <img
                                        :src="preview"
                                        alt="Image Preview"
                                        class="w-32 h-32 object-cover rounded"
                                    />
                                </div>
                            </div>
                        </div>

                        <input
                            id="img"
                            type="file"
                            class="mt-1 block w-full"
                            @change="handleImageChange"
                            multiple
                        />
                        <InputError message="" class="mt-2" />
                    </div>

                    <!-- save btn-->
                    <ActionMessage on="" class="me-3"> Saved. </ActionMessage>

                    <PrimaryButton> Save </PrimaryButton>
                </div>
            </div>
        </form>
    </AppLayout>
</template>

<script setup>
import ActionMessage from "@/Components/ActionMessage.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const house = useForm({
    title: "",
    description: "",
    address: "",
    size: "0",
    bedrooms: "0",
    price: "0",
    images: [],
});

const previews = ref([]);

const handleImageChange = (event) => {
    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        const reader = new FileReader();

        reader.onload = (e) => {
            previews.value.push(e.target.result);
        };

        reader.readAsDataURL(files[i]);
        house.images.push(files[i]);
    }
    //reset input
    event.target.value = "";
};

const cancelImg = (index) => {
    previews.value.splice(index, 1);
    house.images.splice(index, 1);
};
</script>
