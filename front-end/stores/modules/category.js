// store/modules/inventory.js
import { fetch, update, remove, store } from '@/services/category.js';

const state = {
    categoryItems: [],
};

const mutations = {
    setCategoryItems(state, items) {
        state.categoryItems = items;
    },
};

const actions = {
    async update({ commit }, category) {
        const { id } = category;
        await update(id, category);
    },

    async destroy({ commit }, category) {
        const { id } = category;
        await remove(id);
        const items = await fetch();
        commit('setCategoryItems', items);
    },

    async create({ commit }, data) {
        // Your update method
        await store(data);
        const items = await fetch();
        commit('setCategoryItems', items);
    },

    async fetchCategoryItems({ commit }, filter) {
        const items = await fetch(filter);
        commit('setCategoryItems', items);
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
};
