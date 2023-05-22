<template>
    <div class="flex items-center justify-between">
        <div>
            <label for="pageSize" class="sr-only">Ցուցադրել</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input type="number" id="pageSize" v-model.number="pageSize"
                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 sm:text-sm border-gray-300 rounded-md"
                    placeholder="10" @input="handlePageSizeInput" />
            </div>
        </div>
        <div class="flex justify-center items-center">
            <a href="#" @click="prevPage" :disabled="page === 1"
                class="inline-flex items-center px-4 py-2 mr-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                Նախորդը
            </a>
            <div class="px-4 py-2">
                <input type="number" v-model.number="page" @input="handlePageInput" min="1" :max="totalPages"
                    class="px-2 py-1 border border-gray-300 rounded focus:outline-none"
                    style="width: 3rem; text-align: center;" />
                <span class="text-gray-600 mx-2">/</span>
                <span class="text-gray-600">{{ totalPages }}</span>
            </div>
            <a href="#" @click="nextPage" :disabled="page === totalPages"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Հաջորդը
                <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, watchEffect } from 'vue';

const props = defineProps({
    items: Array,
});

const emit = defineEmits(['set-paginated-itmes']);

const items = computed(() => props.items);
const page = ref(1);
const pageSize = ref(8);
const totalPages = computed(() => Math.ceil(items.value.length / pageSize.value));

const paginatedItems = computed(() => {
    const startIndex = (page.value - 1) * pageSize.value;
    const endIndex = startIndex + pageSize.value;
    return items.value.slice(startIndex, endIndex);
});

watchEffect(() => {
    emit('set-paginated-itmes', paginatedItems.value);
});

const nextPage = () => {
    if (page.value < totalPages.value) {
        page.value++;
    }
};

const prevPage = () => {
    if (page.value > 1) {
        page.value--;
    }
};

const handlePageInput = () => {
    if (page.value < 1) page.value = 1;
    if (page.value > totalPages.value) page.value = totalPages.value;
};

const handlePageSizeInput = () => {
    if (pageSize.value < 1) pageSize.value = 1;
    // Adjust page to respect the new page size
    if (page.value > totalPages.value) page.value = totalPages.value;
};

</script>

<style scoped>
button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

button:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.6);
}

svg {
    vertical-align: middle;
}
</style>
