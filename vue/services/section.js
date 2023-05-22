import { post, get, destroy, put } from './api';

export async function fetch(filter) {
    // Here, you should call your API to get the  data.
    const response = await get('/api/sections', filter);
    return response.data;
};

export async function update(id, data) {
    const response = await put('/api/sections/' + id, data);
    return response;
}

export async function remove(id) {
    const response = await destroy('/api/sections/' + id);
    return response;
}

export async function store(data) {
    const response = await post('/api/sections', data);
    return response;
}



