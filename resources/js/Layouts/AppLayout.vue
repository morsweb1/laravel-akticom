<script setup>
import Header from "@/Components/Header.vue";
import Alert from "@/Components/AlertSuccess.vue";

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">

            <Header />

            <Alert />

            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
