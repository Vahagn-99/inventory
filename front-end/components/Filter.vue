<template>
    <div class="relative flex-grow">
        <input v-model="filter" @input="handleInput" placeholder="Որոնել ․․․"
            class="w-full px-4 py-2 pr-10 text-gray-700 bg-gray-200 rounded-lg focus:outline-none focus:bg-white focus:border-blue-500 text-sm" />
        <span class="absolute top-0 right-0 mt-3 mr-3">
            <svg class="h-5 w-5 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </span>
    </div>
</template>

<script setup>
import { ref, defineEmits } from "vue";

const filter = ref("");
const  emit  = defineEmits(["filter-handler"]);

function handleInput() {
    emit("filter-handler", filter.value);
}
</script>

<style>
/* Add any additional styles here */
</style>
