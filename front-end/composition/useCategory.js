// composition/useInventory.js
import { onMounted, computed, reactive } from 'vue';
import { useStore } from 'vuex';

export function useCategory() {
    const store = useStore();

    const filteredItems = computed(() => {
        return store.state.category.categoryItems;
    });

    function handleFilter(filter) {
        if (filter == '') {
            store.dispatch('category/fetchCategoryItems');
        } else {
            store.dispatch('category/fetchCategoryItems', { filter });
        }
    }

    async function updateCategory(category) {
        try {
            await store.dispatch('category/update', category);
        } catch (error) {
            console.error('Error in login action:', error);
        }
    }

    async function deleteCategory(category) {
        try {
            await store.dispatch('category/destroy', category);
        } catch (error) {
            console.error('Error in login action:', error);
        }
    }

    async function createCategory(data) {
        try {
            await store.dispatch('category/create', data);
        } catch (error) {
            console.error('Error in login action:', error);
        }
    }

    onMounted(() => {
        // Fetch the inventory items when the component is mounted
        store.dispatch('category/fetchCategoryItems');
    });

    return {
         filteredItems
        , handleFilter
        , updateCategory
        , deleteCategory
        , createCategory
    };
}
