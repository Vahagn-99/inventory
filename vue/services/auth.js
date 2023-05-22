import { get, post, removeToken } from './api';

export async function register(data) {
    const response = await post('/api/register', data);
    return response.data;
}

export async function login(data) {
    const response = await post('/api/login', data);
    return response.data;
}

export function logout() {
    removeToken();
}

export async function getAuthUser() {
    const response = await get('/api/user');
    return response.data;
}
