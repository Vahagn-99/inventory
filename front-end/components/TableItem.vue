<template>
    <td v-for="(field, index) in fields" :key="index" class="px-6 py-2 relative">
        <div v-if="canEdit" class="relative">
            <div class="w-full px-2 py-1">
                <input v-model="item[field]" class="w-full bg-transparent focus:outline-none" @focus="handleInputFocus"
                    @blur="handleUpdate">
            </div>
        </div>
        <div v-else>
            {{ item[field] }}
        </div>
    </td>
    <td v-if="canDelete">
        <div class="">
            <button type="button" @click="handleDelete"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent hover:bg-gray-500 rounded-lg hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Ջնջել
            </button>
        </div>
    </td>
</template>

<script setup>
import { defineProps, ref } from 'vue';

const props = defineProps({
    item: Object,
    fields: Array,
    canEdit: {
        type: Boolean,
        default: false
    },
    canDelete: {
        type: Boolean,
        default: false
    },
    newItemCreated: {
        type: Boolean,
        default: false
    }
});

const emit = defineEmits(["update:item", "delete:item", "create:item"]);

const isInputFocused = ref(false);

function handleInputFocus() {
    isInputFocused.value = true;
}

function handleUpdate() {
    if (props.newItemCreated) {
        emit('create:item', props.item)
    }
    else {
        emit('update:item', props.item)
    }
    isInputFocused.value = false;
}

function handleDelete() {
    emit('delete:item', props.item)
    isInputFocused.value = false;
}
</script>

<style scoped>
input:focus {
    outline: none;
}
</style>
