<template>
    <div class="flex h-screen bg-gray-200">
        <Sidebar @current-section="getCurrentSection" />
        <div class="w-full relative ml-15 mr-15">
            <Navbar :currentSection="state.currentSection" />
            <Header />
            <!-- Main Content -->
            <main class="bg-gray-100 dark:bg-gray-900">
                <!-- Replace with your content -->
                <div class="container px-6 py-4 mx-auto">
                    <slot></slot>
                </div>
                <!-- /End replace -->
            </main>
            <Footer />
        </div>
    </div>
</template>

<script setup>
import Sidebar from '@/components/Sidebar.vue'
import Navbar from '@/components/Navbar.vue'
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
import { reactive } from 'vue';

const state = reactive({
    currentSection: 'Dashboard'
});
function getCurrentSection(name) {
    state.currentSection = name;
}
// Here you can define component methods, hooks etc.
</script>
