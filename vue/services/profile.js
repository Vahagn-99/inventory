// services/auth.js
import { put, get } from './api';

export async function updateProfile(data) {
    const response = await put('/api/profile', data);
    return response;
}

export async function getProfile() {
    const response = await get('/api/profile');
    return response;
}