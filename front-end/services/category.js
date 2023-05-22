import { post,put, get, destroy } from './api';

export async function fetch(filter) {
    // Here, you should call your API to get the  data.
    const response = await get('/api/categories', filter);
    return response.data;
};

export async function update(id, data) {
    const response = await put('/api/categories/' + id, data);
    console.log(response);
    return response;
}

export async function remove(id) {
    const response = await destroy('/api/categories/' + id);
    console.log(response);
    return response;
}

export async function store(data) {
    const response = await post('/api/categories', data);
    return response;
}



