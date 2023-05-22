import { computed, onMounted, ref } from "vue";
import { useStore } from "vuex";

export function useInventory() {
    const store = useStore();
    const file = ref(null);
    const items = ref([]);
    const hasExport = computed(() => !!exportables.value.length);
    const exportables = ref([]);
    const filteredItems = computed(() => {
        return store.state.inventory.inventoryItems
    });

    function handleFilter(filter) {
        if (filter == '') {
            store.dispatch("inventory/fetchInventoryItems");
        } else {
            store.dispatch("inventory/fetchInventoryItems", { filter });
        }
    }

    function updateInventory(inventory) {
        store.dispatch('inventory/update', inventory);
    }

    function deleteInventory(inventory) {
        store.dispatch('inventory/destroy', inventory);
    }

    async function createInventory(data) {
        try {
            await store.dispatch('inventory/create', data);
        } catch (error) {
            console.error('Error in login action:', error);
        }
    }

    function importFile(event) {
        file.value = event.target.files[0];
        store.dispatch("inventory/importXml", file.value);
    }

    function exportFile() {
        store.dispatch("inventory/exportXml", exportables.value);
    }

    function addExportableItems(ids = []) {
        exportables.value = [];
        ids.forEach(id => {
            exportables.value.push(id)
        });
        console.log(exportables.value);
    }

    onMounted(async () => {
        // Fetch the inventory items when the component is mounted
        await store.dispatch("inventory/fetchInventoryItems");
    });

    return {
        importFile
        , exportFile
        , hasExport
        , addExportableItems
        , exportables
        , filteredItems
        , handleFilter
        , items
        , updateInventory
        , deleteInventory
        , createInventory
    };
}
