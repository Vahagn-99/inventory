// composition/useInventory.js
import { onMounted, computed, reactive } from 'vue';
import { useStore } from 'vuex';

export function useSection() {
    const store = useStore();
    
    const filteredItems = computed(() => {
        return store.state.section.sectionItems;
    });

    function handleFilter(filter) {
        if (filter == '') {
            store.dispatch('section/fetchSectionItems');
        } else {
            store.dispatch('section/fetchSectionItems', { filter });
        }
    }

    async function updateSection(section) {
        try {
            await store.dispatch('section/update', section);
        } catch (error) {
            console.error('Error in login action:', error);
        }
    }

    async function deleteSection(section) {
        try {
            await store.dispatch('section/destroy', section);
        } catch (error) {
            console.error('Error in login action:', error);
        }
    }

    async function createSection(section) {
        try {
            await store.dispatch('section/create', section);
        } catch (error) {
            console.error('Error in login action:', error);
        }
    } 

    onMounted(() => {
        // Fetch the inventory items when the component is mounted
        store.dispatch('section/fetchSectionItems');
    });

    return {
         filteredItems
        , handleFilter
        , updateSection
        , deleteSection
        , createSection
    };
}
