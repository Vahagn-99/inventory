<template>
    <div :style="{ backgroundColor: '#202123' }"
        class="flex flex-col h-full text-white w-64 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
        <div class="flex items-center justify-between mb-6">
            <img class="h-auto min-w-xs transition-all duration-300 rounded-lg  ml-4"
                src="../../public/images/logo.jpg" alt="image description" width="150" height="150" />
            <div>
                <i class="fb-bell text-lg hover:text-gray-400 transition-colors duration-200"></i>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-grow mb-4">
            <router-link v-for="item in items" :key="item.name" :to="item.url" @click="setCurrentSection(item.name)"
                class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white flex items-center space-x-3">
                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                    stroke-linejoin="round" class="h-4 w-4 mr-2" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                {{ item.name }}
            </router-link>
        </nav>

        <!-- User and Logout icon -->
        <div class="pt-2 border-t border-gray-600">
            <div class="flex items-center justify-between cursor-pointer" @click="logout">
                <div class="flex items-center">
                    <!-- <AvatarGenerator v-if="getProfile" :name="getProfile.name" :size="100" /> -->
                    <VueInitialsImg :name="getProfile?.name" :size="100" />
                </div>
                Դուրս գալ
                <i class="icon-logout"></i> <!-- replace with actual Flowbite logout icon class -->
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, defineEmits } from 'vue';
import { useProfile } from '@/composition/useProfile';
import { useAuth } from '@/composition/useAuth';
import VueInitialsImg from 'vue-initials-img';

const { getProfile } = useProfile();
const { logout } = useAuth();
const items = ref([
    {
        name: 'Գույք',
        url: { name: 'Inventory' },
        icon: 'fb-cube', // replace with actual Flowbite icon class
        superAdmin: false
    },
    {
        name: 'Պրոֆիլ',
        url: { name: 'Profile' },
        icon: 'fb-user', // replace with actual Flowbite icon class
        superAdmin: false
    },
    {
        name: 'Օգտատերեր',
        url: { name: 'User' },
        icon: 'fb-user', // replace with actual Flowbite icon class
        superAdmin: true
    },
    {
        name: 'Գլխամասեր',
        url: { name: 'Section' },
        icon: 'fb-settings', // replace with actual Flowbite icon class
        superAdmin: false
    },
    {
        name: 'Կատեգորիաներ',
        url: { name: 'Category' },
        icon: 'fb-category', // replace with actual Flowbite icon class
        superAdmin: false
    },
]);

const emits = defineEmits(['current-section']);

function setCurrentSection(item) {
    emits('current-section', item);
}
</script>
