<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <nav class="bg-white border-b border-gray-100">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <ul class="flex">
                    <li class="mx-4 flex items-center justify-center">
                        <Link :class="{ active: route().current('home') }" class="nav__link" :href="route('home')">
                            Главная
                        </Link>
                    </li>
                    <li class="mx-4 flex items-center justify-center">
                        <Link :class="{ active: route().current('products') }" class="nav__link" :href="route('products')">
                            Товары
                        </Link>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</template>


<style lang="scss" scoped>
 .active {
     @apply text-indigo-500;
 }
</style>
