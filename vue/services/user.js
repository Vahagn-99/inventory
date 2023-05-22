import { post,put, get, destroy } from './api';

export async function fetch(filter) {
    // Here, you should call your API to get the  data.
    const response = await get('/api/users', filter);
    return response.data;
};

export async function update(id, data) {
    const response = await put('/api/users/' + id, data);
    return response;
}

export async function remove(id, data) {
    const response = await destroy('/api/users/' + id, data);
    return response;
}

export async function store(data) {
    const response = await post('/api/users', data);
    return response;
}



