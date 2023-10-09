<script setup>
import {Head} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    products: {
        type: Object,
        default: {},
    }
})

const products = props.products.data
console.log(products)
</script>

<template>

    <AppLayout>
        <Head title="Продукты"/>

        <template v-if="products.length">
            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Код</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Уровень 1</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Уровень 2</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Уровень 3</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Наименование</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Описание</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Цена</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ЦенаСП</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Количество</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Поля свойств</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Единица измерения</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Картинка</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Выводить на главной</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    <tr v-for="product in products" :key="product.id"
                        class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Код</span>
                            {{ product.article }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Уровень 1</span>

                            <span v-if="product.category.parent_category && product.category.parent_category.parent_category">
                                {{ product.category.parent_category.parent_category.name }}
                            </span>

                            <span v-else-if="product.category.parent_category && !product.category.parent_category.parent_category">
                                {{ product.category.parent_category.name }}
                            </span>

                            <span v-else-if="product.category  && !product.category.parent_category">{{ product.category.name }}</span>

                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Уровень 2</span>

                            <span v-if="product.category.parent_category && product.category.parent_category.parent_category">
                                {{ product.category.parent_category.name }}
                            </span>

                            <span v-else-if="product.category.parent_category && !product.category.parent_category.parent_category">
                                {{ product.category.name }}
                            </span>

                            <span v-else-if="product.category  && !product.category.parent_category">
                                {{ product.category.name }}
                            </span>
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Уровень 3</span>
                            <span v-if="product.category && product.category.parent_category && product.category.parent_category.parent_category">
                                {{ product.category.name }}
                            </span>
                            <span v-else>{{ '' }}</span>
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Наименование</span>
                            {{ product.name }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Описание</span>
                            <span v-html="product.description"></span>
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Цена</span>
                            {{ product.price }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">ЦенаСП</span>
                            {{ product.price_cp }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Количество</span>
                            {{ product.count }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Поля свойств</span>
                            {{ product.specifications }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Единица измерения</span>
                            {{ product.units }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Картинка</span>
                            {{ product.image }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Выводить на главной</span>
                            {{ product.main_page ? 'Да' : 'Нет' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </template>
        <template v-else>
            <div class="bg-white p-10 rounded-md mx-auto max-w-7xl">
                <h1>Товаров нет</h1>
            </div>
        </template>
    </AppLayout>
</template>
