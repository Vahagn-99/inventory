import { reactive } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';

export function useAuth() {
    const store = useStore();
    const router = useRouter();
    const credentials = reactive({
        email: '',
        password: '',
    });

    async function login() {
        try {
            const success = await store.dispatch('auth/login', credentials);
            if (success) {
                router.push({ name: "Inventory" }); // Redirect to home page
            } else {
                throw new Error('Login failed');
            }
        } catch (error) {
            console.error('Error in login action:', error);
            throw error;
        }
    }

    async function logout() {
        try {
            await store.dispatch('auth/logout');
            router.push({ name: "Login" }); // Redirect to login page
        } catch (error) {
            console.error('Error in logout action:', error);
            throw error;
        }
    }

    async function getAuthUser() {
        try {
            const response = await store.dispatch('auth/getAuthUser');
            return response;
        } catch (error) {
            console.error('Error in getAuthUser action:', error);
            throw error;
        }
    }

    return {
        credentials,
        login,
        logout,
        getAuthUser
    };
}
