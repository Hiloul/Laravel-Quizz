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
                    <a href="/quizz/create">Questionnaire</a>
                    <a href="/quizz">Mon contenu</a>
                    <a href="/admin">Admin</a>
                </nav>
            </h2>
        </template>

        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>
                
            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Connexion</Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Inscription</Link>
            </template>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100"> 
                        <a href="/questions">Créer des questions</a>
                        <br>
                        <a href="/options">Répondre aux questions</a></div>
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
