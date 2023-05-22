<template>
    <Dashboard v-if="isAuthorized">
        <router-view></router-view>
    </Dashboard>
    <Guest v-else>
        <router-view></router-view>
    </Guest>
</template>

<script setup>
import Dashboard from '@/layouts/Dashboard.vue';
import Guest from '@/layouts/Guest.vue';
import { computed } from 'vue';
import { useStore } from 'vuex';
const store = useStore();
const isAuthorized = computed(() => {
    const token = store.state.auth.token;
    return !!token;
});

// Here you can define component methods, hooks etc.
</script>
