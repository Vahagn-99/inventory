import { computed, onBeforeMount, onMounted, reactive, ref } from 'vue';
import { useStore } from 'vuex';

export function useProfile() {
    const store = useStore();
    const isUpdated = ref(false);
    const profile = reactive({
        name: '',
        email: '',
        password: ''
    });

    const getProfile = computed(() => {
        return store.state.profile.profile
    });

    const formErrors = reactive({
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
    });

    function updateProfile() {
        try {
            store.dispatch('profile/update', profile).then((res) => isUpdated.value = true);
        } catch (error) {
            // console.error('Error in update action:', error);
        }
    }

    async function fetchProfile() {
        try {
            await store.dispatch('profile/get')
                .then(user => {
                    profile.name = user.name;
                    profile.email = user.email;
                    profile.password = user.password;
                });
        } catch (error) {
            console.error('Error in get action:', error);
        }
    }
    onBeforeMount(async () => await store.dispatch('profile/get'))
    return {
        profile,
        formErrors,
        fetchProfile,
        updateProfile,
        isUpdated,
        getProfile
    };
}
