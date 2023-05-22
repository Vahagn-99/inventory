import { createStore } from 'vuex';
import auth from './modules/auth';
import profile from './modules/profile';
import inventory from './modules/inventory';
import category from './modules/category';
import user from './modules/user';
import section from './modules/section';

export default createStore({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        auth, // Include the auth module
        profile, // Include the profile module
        inventory, // Include the inventory module
        category, // Include the category module
        section, // Include the section module
        user, // Include the user module
    },
});
