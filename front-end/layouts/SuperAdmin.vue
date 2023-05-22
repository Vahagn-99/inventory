<template>
    <div v-if="userRole === 'super-admin'">
        <!-- Content visible only to Super Admin -->
        <slot></slot>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { useStore } from 'vuex';

const store = useStore();
// assuming you have a getter named 'user' in your Vuex store
const userRole = computed(() => {
    const user = store.getters['auth/user'];
    return user?.role;
}
);
</script>
