import { post, get, put, destroy, addHeader, removeHeader, getHeaders } from './api';

export async function fetchInventories(filter) {
    // Here, you should call your API to get the inventory data.
    const response = await get('/api/inventories', filter);
    return response.data;
};

export async function importFile(file) {
    const formData = new FormData();
    formData.append('file', file); // "file" should match the key that the server expects
    const response = await post('/api/inventories/import', formData);
    return response;
}

export async function update(id, inventory) {
    const response = await put('/api/inventories/' + id, inventory);
    return response.data;
}

export async function remove(id) {
    const response = await destroy('/api/inventories/' + id);
    return response.data;
}

export async function store(data) {
    const response = await post('/api/inventories', data);
    return response;
}

export async function exportFile(ids) {
    console.log(ids);
    addHeader('Content-Type', 'application/json');
    const response = await fetch('/api/inventories/export', {
        method: 'POST',
        headers: {
            ...getHeaders(),
        },
        body: JSON.stringify(ids),
    });
    removeHeader('Content-Type', 'application/json');

    // Assuming the response contains the file data
    const blob = await response.blob();
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', 'inventories.xlsx');
    link.style.display = 'none';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
}





