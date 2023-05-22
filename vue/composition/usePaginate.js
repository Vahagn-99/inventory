import {  ref } from "vue";

export function usePaginate() {
    const paginatedItems = ref([]);

    function setPaginatedItmes(items) {
        paginatedItems.value = items
    }
    
    return {
        paginatedItems,
        setPaginatedItmes
    }
}