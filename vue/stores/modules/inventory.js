// store/modules/inventory.js
import { fetchInventories, remove,store, importFile, exportFile, update } from '@/services/inventory.js';

const state = {
    inventoryItems: [],
};

const mutations = {
    setInventoryItems(state, items) {
        state.inventoryItems = items;
    },
};

const actions = {
    async importXml({ commit }, file) {
        // Your upload method
        await importFile(file);
        // After upload, get the updated inventory items
        const items = await fetchInventories();
        commit('setInventoryItems', items);
    },

    async update({commit},inventory) {
        const { id } = inventory;
        await update(id, inventory);
    },

    async destroy({ commit }, inventory) {
        const { id } = inventory;
        await remove(id);
        const items = await fetchInventories();
        commit('setInventoryItems', items);
    },

    async create({ commit }, data) {
        // Your update method
        await store(data);
    },

    async exportXml({ commit }, ids) {
        // Your upload method
        await exportFile({ ids });
    },

    async fetchInventoryItems({ commit }, filter) {
        const items = await fetchInventories(filter);
        commit('setInventoryItems', items);
    }
};

const getters = {
    items: state => state.inventoryItems
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
};
