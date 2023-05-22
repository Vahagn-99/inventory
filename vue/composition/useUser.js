// composition/useInventory.js
import { onMounted, computed, reactive } from 'vue';
import { useStore } from 'vuex';

export function useUser() {

    const store = useStore();

    const currentUser = reactive({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    })

    const filteredItems = computed(() => {
        return store.state.user.userItems;
    });

    function handleFilter(filter) {
        if (filter == '') {
            store.dispatch('user/fetchUserItems');
        } else {
            store.dispatch('user/fetchUserItems', { filter });
        }
    }

    async function updateUser(user) {
        try {
            await store.dispatch('user/update', user);
        } catch (error) {
            console.error('Error in login action:', error);
        }
    }

    async function createUser(user) {
        currentUser.name = user.name;
        currentUser.email = user.email;
        if (currentUser.email && currentUser.name) {
            currentUser.password = "password"
            currentUser.password_confirmation = "password"
            try {
                await store.dispatch('user/create', currentUser);
            } catch (error) {
                console.error('Error in login action:', error);
            }
        }
    }

    async function deleteUser(user) {
        try {
            await store.dispatch('user/destroy', user);
        } catch (error) {
            console.error('Error in login action:', error);
        }
    }

    onMounted(() => {
        // Fetch the inventory items when the component is mounted
        store.dispatch('user/fetchUserItems');
    });

    return {
        filteredItems
        , handleFilter
        , updateUser
        , createUser
        , deleteUser
    };
}
