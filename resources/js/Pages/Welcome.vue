<script setup>
import {ref} from "vue";
import {Head, useForm} from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    file: null
});

const labelFile = ref('')

const previewImage = (e) => {
    form.file = e.target.files[0]
    labelFile.value = e.target.files[0].name
}

const submit = () => {
    form.post(route('products.store_from_csv'));
};
</script>

<template>
    <AppLayout>
        <Head title="Добавить продукты"/>

        <div class="page__content">

            <form
                class="page__form"
                @submit.prevent="submit"
                method="post"
                enctype="multipart/form-data">

                <h1 class="my-4 text-2xl">Загрузить товары из csv файла</h1>
                <div>
                    <InputLabel for="file" value="Добавить файл .csv"/>

                    <div class="mb-6">
                        <div class="relative border-2 rounded-md px-4 py-3 bg-white flex items-center justify-between hover:border-blue-500 transition duration-150 ease-in-out">
                            <input
                                type="file"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                ref="file"
                                @change="previewImage"
                            >
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="ml-2 text-sm text-gray-600">{{ labelFile || 'Выберите файл' }}</span>
                            </div>
                        </div>
                    </div>

                    <InputError class="mt-2" :message="form.errors.file"/>
                </div>
                <div>
                    <PrimaryButton
                        :disabled="form.processing"
                        type="submit">
                        Сохранить
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<style lang="scss">
.page {

    @apply min-h-screen bg-center bg-gray-100;

    &__content {
        @apply relative sm:flex sm:justify-center sm:items-center;
    }

    &__form {
        @apply mt-20 w-full max-w-3xl p-8 bg-white;
    }
}
</style>
