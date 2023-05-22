<template>
    <PageContainer>
        <div class="flex items-center mb-4">
            <Filter @filter-handler="handleFilter" />
        </div>
        <Table :columns="tableColumns" :fields="tableFields" :items="paginatedItems" :canCreate="true" :canEdit="true"
            :canDelete="true" @create:item="createSection" @update:item="updateSection" @delete:item="deleteSection" />
        <Pagination class="mt-6" :items="filteredItems" @set-paginated-itmes="setPaginatedItmes" />
    </PageContainer>
</template>

<script setup>
import { useSection } from '@/composition/useSection';
import { usePaginate } from '@/composition/usePaginate';
import Pagination from '@/components/Pagination.vue';
import Table from '@/components/Table.vue';
import Filter from '@/components/Filter.vue';
import PageContainer from '@/components/PageContainer.vue';

const { filteredItems, handleFilter, updateSection, deleteSection, createSection } = useSection();
const { paginatedItems, setPaginatedItmes } = usePaginate();

const tableColumns = [
    "Անուն",
];

const tableFields = [
    "name",
];
</script>

<style>
/* Add any additional styles here */
</style>
