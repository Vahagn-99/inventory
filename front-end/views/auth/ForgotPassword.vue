<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="/logo.png" alt="Your Logo">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Recover your password
                </h2>
            </div>
            <form class="mt-8 space-y-6">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address">
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="text-sm">
                        <router-link :to="{ name: 'Login' }"
                            class="font-medium text-indigo-600 hover:text-indigo-500">
                            Login
                        </router-link>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Recover password
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
// Here you can define component methods, hooks etc.
</script>
