<template>
    <PageContainer>
            <div class="flex items-center mb-4">
            <Filter @filter-handler="handleFilter" />
        </div>
        <Table :columns="tableColumns" :fields="tableFields" :items="paginatedItems" :canCreate="true" :canEdit="true" :canDelete="true"
            @update:item="updateCategory" @delete:item="deleteCategory" @create:item="createCategory"/>
        <Pagination class="mt-6" :items="filteredItems" @set-paginated-itmes="setPaginatedItmes" />
    </PageContainer>
</template>

<script setup>
import { useCategory } from '@/composition/useCategory';
import { usePaginate } from '@/composition/usePaginate';
import Pagination from '@/components/Pagination.vue';
import Table from '@/components/Table.vue';
import Filter from '@/components/Filter.vue';
import PageContainer from '@/components/PageContainer.vue';

const { filteredItems, handleFilter, updateCategory, deleteCategory, createCategory } = useCategory();
const { paginatedItems, setPaginatedItmes } = usePaginate();

const tableColumns = [
    "Անուն",
    "Հապավում",
];

const tableFields = [
    "name",
    "abbr",
];
</script>

<style>
/* Add any additional styles here */
</style>
