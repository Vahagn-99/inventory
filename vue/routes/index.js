import { createRouter, createWebHistory } from 'vue-router';
import Profile from '@/views/Profile.vue';
import Login from '@/views/auth/Login.vue';
import Inventory from '@/views/Inventory.vue';
import User from '@/views/User.vue';
import Section from '@/views/Section.vue';
import Category from '@/views/Category.vue';
import ForgotPassword from '@/views/auth/ForgotPassword.vue';

const routes = [
    {
        path: '/',
        name: 'Inventory',
        component: Inventory,
        meta: {
            requiresAuth: true
        }, // Protected route
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile,
        meta: {
            requiresAuth: true
        }, // Protected route
    },
    {
        path: '/users',
        name: 'User',
        component: User,
        meta: {
            requiresAuth: true
        }, // Protected route
    },
    {
        path: '/sections',
        name: 'Section',
        component: Section,
        meta: {
            requiresAuth: true
        }, // Protected route
    },
    {
        path: '/categories',
        name: 'Category',
        component: Category,
        meta: {
            requiresAuth: true
        }, // Protected route
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/forgot-password',
        name: 'ForgotPassword',
        component: ForgotPassword,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const requiresAuth = to.meta.requiresAuth;
    const isLoginPage = to.path === '/login';
    const isForgotPasswordPage = to.path === '/forgot-password';
    const isAuthenticated = !!localStorage.getItem(window.TOKEN_KEY); // Check token directly from localStorage
    if (requiresAuth && !isAuthenticated) {
        next('/login');
    } else if ((isLoginPage || isForgotPasswordPage) && isAuthenticated) {
        next('/');
    } else {
        next();
    }
});

export default router;
