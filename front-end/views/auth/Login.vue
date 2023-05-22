<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    <img class="mx-auto h-145 w-auto" src="../../../public/images/logo.jpg" alt="Your Logo">
                </h2>
            </div>
            <form method="post" @submit.prevent="login" class="mt-8 space-y-6">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="py-4">
                        <label for="email-address" class="sr-only">Էլ․ հասցե</label>
                        <input v-model="credentials.email" id="email-address" name="email" type="email" autocomplete="email"
                            required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-gray-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Գաղտնաբառ</label>
                        <input v-model="credentials.password" id="password" name="password" type="password"
                            autocomplete="current-password" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-gray-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password">
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="text-sm">
                        <router-link :to="{ name: 'ForgotPassword' }"
                            class="font-medium text-gray-600 hover:text-gray-700">
                            Մոռացել եք Գաղտնաբառ՞ը
                        </router-link>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Մուտք գործել
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useAuth } from '@/composition/useAuth';

const { credentials, login } = useAuth();

// Optionally, you can add lifecycle hooks or other logic here
</script>
