<template>
    <div class="overflow-x-auto bg-white rounded-lg shadow-md dark:bg-gray-800 pb-10">
        <div class="float-right">
            <button v-if="showCreateButton" type="button" @click="addNewItem"
                class="flex py-3 px-3 items-center gap-3 bg-gray-700 text-white transition-colors duration-200 cursor-pointer text-sm rounded-md border border-white/20 hover:bg-gray-900 mb-1 flex-shrink-0">
                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                    stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Ստեղծել Նոր
            </button>
        </div>
        <table class="table-auto text-sm text-gray-500 dark:text-gray-400 min-w-full">
            <thead class="text-xs uppercase tracking-wide text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="w-4 px-6 py-3 text-left">
                        <input type="checkbox" v-model="needCheckAll"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label class="sr-only"></label>
                    </th>
                    <th v-for="column in columns" :key="column" class="px-6 py-3 text-left">
                        {{ column }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in items" :key="index"
                    class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 px-6 py-4">
                        <input type="checkbox" :id="'checkbox-table-' + item.id" v-model="checkedItems[item.id]"
                            @change="handleCheckbox($event, item.id)"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label :for="'checkbox-table-' + index" class="sr-only">checkbox</label>
                    </td>
                    <TableItem :item="item" :fields="fields" :newItemCreated="newItemCreated" :canEdit="canEdit"
                        :canDelete="canDelete" @create:item="handleCreate" @update:item="handleUpdate"
                        @delete:item="handleDelete">
                    </TableItem>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { defineProps, defineEmits, reactive, ref, watch } from 'vue';
import TableItem from '@/components/TableItem.vue';
import { computed } from '@vue/reactivity';

const props = defineProps({
    columns: Array,
    fields: Array,
    items: Array,
    canEdit: {
        type: Boolean,
        default: false,
    },
    canDelete: {
        type: Boolean,
        default: false,
    },
    canCreate: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['get:checked', 'update:item', 'delete:item', 'create:item']);

const newItem = reactive({});
const newItemCreated = ref(false);
const needCheckAll = ref(false);
const checkedIds = ref([]);
const checkedItems = ref([]);
const showCreateButton = ref(props.canCreate);

watch(needCheckAll, (newState) => {
    if (newState) {
        props.items.forEach((item) => {
            checkedItems.value[item.id] = true
            checkedIds.value.push(item.id);
        })
    } else {
        checkedItems.value = [];
        checkedIds.value = [];
    }
    emit('get:checked', checkedIds.value);
});

function handleCheckbox(event, id) {
    if (event.target.checked) {
        checkedIds.value.push(id)
    } else {
        checkedIds.value = [...checkedIds.value].filter(item => id !== item)
    }
    emit('get:checked', checkedIds.value)
}

function handleCreate(item) {
    emit('create:item', item);
}

watch(ref(props.items.length), (newCount, previusCount) => {
    if (newCount > previusCount > 0) {
        showCreateButton.value = true;
        newItemCreated.value = false;
    }
})

function handleDelete(item) {
    emit('delete:item', item);
}

function handleUpdate(item) {
    emit('update:item', item);
}

function addNewItem() {
    showCreateButton.value = false
    newItemCreated.value = true;
    const item = props.fields.forEach((field) => {
        newItem[field] = null;
    });
    props.items.unshift(newItem)
}

</script>

<style scoped>
table {
    border-collapse: collapse;
}

thead tr {
    border-bottom: 1px solid #d2d6dc;
}

tbody tr:last-of-type {
    border-bottom: 0;
}
</style>
