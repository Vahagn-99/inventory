// store/modules/inventory.js
import { fetch, update, remove, store } from '@/services/user.js';

const state = {
    userItems: [],
};

const mutations = {
    setUserItems(state, items) {
        state.userItems = items;
    },
};

const actions = {
    async update({ commit }, user) {
        const { id } = user
        await update(id, user);
    },

    async destroy({ commit }, user) {
        const { id } = user
        const items = await fetch();
        commit('setUserItems', items);
        await remove(id);

    },

    async create({ commit }, data) {
        // Your update method
        await store(data);
        const items = await fetch();
        commit('setUserItems', items);
    },

    async fetchUserItems({ commit }, filter) {
        const items = await fetch(filter);
        commit('setUserItems', items);
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
};
