import { register, login, logout, getAuthUser } from '@/services/auth';
const TOKEN_KEY = window.TOKEN_KEY = 'access_token';
export default {
    namespaced: true,
    state: {
        user: null,
        token: localStorage.getItem(TOKEN_KEY)
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        setToken(state, token) {
            state.token = token;
            localStorage.setItem(TOKEN_KEY, token); // Save token to localStorage
        },
        clearToken(state) {
            state.token = null;
            localStorage.removeItem(TOKEN_KEY); // Remove token from localStorage
        },
    },
    actions: {
        async login({ commit }, credentials) {
            try {
                const response = await login(credentials);
                const { token, user } = response;
                commit('setToken', token);
                commit('setUser', user);
                return true
            } catch (error) {
                // Handle login error
                return false;
            }
        },
        async getAuthUser({ commit }) {
            const response = await getAuthUser();
            commit('setUser', response);
            return response;
        },
        logout({ commit }) {
            logout();
            commit('setUser', null);
            commit('clearToken'); // Call clearToken mutation to remove token
        },
    },
    getters: {
        user: state => state.user,
        token: state => state.token
    },
};

