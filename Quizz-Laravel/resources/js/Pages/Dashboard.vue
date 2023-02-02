<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <nav>
                    <a href="/">Home</a>
                    <a href="/quizz/create">Répondre à un questionnaire</a>
                    <a href="/quizz">Mes questionnaires</a>
                    <a href="/admin">Admin</a>
                </nav>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Vous êtes connecté(e)</div>
                </div>
            </div>
        </div>
        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
    </AuthenticatedLayout>
</template>
<style>
nav{display: flex;
justify-content: space-evenly;
align-self: flex-start;}
a:hover{
    color: royalblue;
}
.py-12{height: 550px;}
</style>
