<template>
    <PageContainer>
        <div class="flex items-center mb-4">
            <Filter @filter-handler="handleFilter" />
            <input class="ml-4 px-3 bg-black text-white rounded-lg focus:outline-none hover:bg-gray-800 text-sm"
                @change="importFile" id="#file-import" type="file" />
            <button v-if="hasExport" type="button" @click="exportFile"
                class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mx-2">
                <svg class="w-4 h-4 mr-2 -ml-1" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="file-export" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M437.333,224H272v-85.333c0-11.782-9.551-21.333-21.333-21.333h-85.333C144.149,117.333,134.598,126.884,134.598,138.667V224H74.667C33.614,224,0,257.614,0,298.667v128C0,478.386,33.614,512,74.667,512h362.667C478.386,512,512,478.386,512,437.333v-128C512,257.614,478.386,224,437.333,224z M234.667,384H106.667v-85.333h128V384z M405.333,384h-128v-85.333h128V384z M405.333,277.333h-128V192h-21.333v85.333H106.667V192H85.333v85.333H74.667V277.333h21.333V224c0-5.891,4.776-10.667,10.667-10.667h85.333c5.891,0,10.667,4.776,10.667,10.667v53.333h21.333V277.333z">
                    </path>
                </svg>
                export
            </button>
        </div>
        <Table :canCreate="true" :canEdit="true" :canDelete="true" @create:item="createInventory"
            @update:item="updateInventory" @delete:item="deleteInventory" :columns="tableColumns" :fields="tableFields"
            :items="paginatedItems" @get:checked="addExportableItems" />
        <Pagination class="mt-6" :items="filteredItems" @set-paginated-itmes="setPaginatedItmes" />
    </PageContainer>
</template>

<script setup>
import { useInventory } from '@/composition/useInventory';
import { usePaginate } from '@/composition/usePaginate';
import Pagination from '@/components/Pagination.vue';
import Table from '@/components/Table.vue';
import Filter from '@/components/Filter.vue';
import PageContainer from '@/components/PageContainer.vue';

const {
    importFile
    , exportFile
    , hasExport
    , addExportableItems
    , filteredItems
    , handleFilter
    , updateInventory
    , deleteInventory
    , createInventory
} = useInventory();
const { paginatedItems, setPaginatedItmes } = usePaginate();


const tableColumns = [
    "Բնութագիրը",
    "Հապավում",
    "Կատեգորյիաի ID",
    "Գլխամասի ID",
    "Շահագործմ․ հանձնման ամսաթիվը",
    "հաշվառման  hերթական համարը",
    "հաշվապ․ կոդ",
    "Արժեքը",
    "Պատասխանատու",
];

const tableFields = [
    "name",
    "alias",
    "category_id",
    "section_id",
    "inventory_date",
    "register_number",
    "accounting_number",
    "price",
    "responsible_user_signature",
];
</script>

<style>
/* Add any additional styles here */
</style>
