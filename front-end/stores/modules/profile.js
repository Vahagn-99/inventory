import { updateProfile, getProfile } from '@/services/profile';

export default {
    namespaced: true,
    state: {
        profile: null
    },
    mutations: {
        setProfile(state, profile) {
            state.profile = profile;
        }
    },
    actions: {
        async update({ commit }, data) {
            const response = await updateProfile(data);
            commit('setProfile', response.data)
        },
        async get({ commit }) {
            const response = await getProfile();
            commit('setProfile', response.data)
            return response.data;
        },
    },
    getters: {
        getProfile: (state) => state.profle
    }
};
