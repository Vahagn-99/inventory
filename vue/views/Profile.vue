<template>
    <PageContainer>
        <form @submit.prevent="updateProfile" class="space-y-6">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Անուն</label>
                    <input v-model="profile.name" :class="{ 'border-red-500': formErrors.name }" id="name" type="text"
                        placeholder="Enter your name" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p v-if="formErrors.name" class="text-red-500 text-xs mt-1">{{ formErrors.name }}</p>
                </div>
                <!-- Add more input fields in the similar manner -->

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Էլ․
                        հասցե</label>
                    <input v-model="profile.email" :class="{ 'border-red-500': formErrors.email }" id="email" type="email"
                        placeholder="Enter your email" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p v-if="formErrors.email" class="text-red-500 text-xs mt-1">{{ formErrors.email }}</p>
                </div>
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Գաղտնաբառ</label>
                    <input v-model="profile.password" :class="{ 'border-red-500': formErrors.password }" id="password"
                        type="password" placeholder="Enter your password" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p v-if="formErrors.password" class="text-red-500 text-xs mt-1">{{ formErrors.password }}</p>
                </div>
                <div class="mb-6">
                    <label for="password_confirmation"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Գաղտնաբառի հաստատում</label>
                    <input v-model="profile.password_confirmation"
                        :class="{ 'border-red-500': formErrors.password_confirmation }" id="password_confirmation"
                        type="password" placeholder="Confirm your password" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p v-if="formErrors.password_confirmation" class="text-red-500 text-xs mt-1">{{
                        formErrors.password_confirmation }}</p>
                </div>
                <div>
                    <button
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
                        type="submit">
                        {{ isUpdated ? "Թարմացվել է" : "Թարմացնել" }}
                    </button>
                </div>
            </div>
        </form>
    </PageContainer>
</template>


<script setup>
import { useProfile } from '@/composition/useProfile';
import { onMounted } from 'vue';
import PageContainer from '@/components/PageContainer.vue';

const { profile, formErrors, updateProfile, fetchProfile, isUpdated } = useProfile();

onMounted(() => fetchProfile());

onMounted(() => isUpdated);
</script>

<style>
.flowbite-input {
    transition: border-color 0.3s ease, box-shadow 0.2s ease, color 0.2s ease;
}

.flowbite-input:focus {
    border-color: #6366F1;
    box-shadow: 0 0 0 1px #6366F1;
}

.flowbite-btn {
    transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.2s ease, color 0.2s ease;
}

.flowbite-btn:hover {
    filter: brightness(90%);
}

.flowbite-btn:focus {
    border-color: #6366F1;
    box-shadow: 0 0 0 1px #6366F1;
}
</style>
