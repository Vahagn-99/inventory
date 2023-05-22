<template>
    <div class="max-w-8xl mx-auto mt-8">
        <div class="bg-white shadow-md rounded-lg px-8 py-6">
            <PageContainer>
                <div class="flex items-center mb-4">
                    <Filter @filter-handler="handleFilter" />
                </div>
                <Table :columns="tableColumns" :fields="tableFields" :items="paginatedItems" :canCreate="true" :canEdit="true" :canDelete="true"
                @update:item="updateUser" @delete:item="deleteUser" @create:item="createUser" />
                <Pagination class="mt-6" :items="filteredItems" @set-paginated-itmes="setPaginatedItmes" />
            </PageContainer>
        </div>
    </div>
</template>

<script setup>
import { usePaginate } from '@/composition/usePaginate';
import Pagination from '@/components/Pagination.vue';
import Table from '@/components/Table.vue';
import Filter from '@/components/Filter.vue';
import { useUser } from '@/composition/useUser';
import PageContainer from '@/components/PageContainer.vue';

const { filteredItems, handleFilter, updateUser, deleteUser, createUser } = useUser();
const { paginatedItems, setPaginatedItmes } = usePaginate();

const tableColumns = [
    "Անուն",
    "Էլ․ հասցե",
    "Պաշտոն",
];

const tableFields = [
    "name",
    "email",
    "role",
];
</script>

<style>
/* Add any additional styles here */
</style>
