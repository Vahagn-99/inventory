// store/modules/inventory.js
import { fetch, update, remove,store } from '@/services/section.js';

const state = {
    sectionItems: [],
};

const mutations = {
    setSectionItems(state, items) {
        state.sectionItems = items;
    },
};

const actions = {
    async update({ commit }, section) {
        const { id } = section;
        await update(id, section);
    },
    async destroy({ commit }, section) {
        const { id } = section;
        await remove(id);
        const items = await fetch();
        commit('setSectionItems', items);
    },

    async create({ commit }, data) {
        // Your update method
        await store(data);
    },

    async fetchSectionItems({ commit }, filter) {
        const items = await fetch(filter);
        commit('setSectionItems', items);
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
};
