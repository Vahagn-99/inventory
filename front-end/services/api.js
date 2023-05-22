import axios from "axios";

let additionalHeaders = {};

export function addHeader(key, value) {
    additionalHeaders[key] = value;
}

export function removeHeader(key) {
    delete additionalHeaders[key];
}

export function getHeaders() {
    const headers = { ...additionalHeaders };
    const accessToken = localStorage.getItem(window.TOKEN_KEY) || null;
    if (accessToken) {
        headers["Authorization"] = `Bearer ${accessToken}`;
    }
    return headers;
}

export async function post(url, data) {
    const response = await axios.post(url, data, { headers: getHeaders() });
    return response.data;
}

export async function put(url, data) {
    const response = await axios.put(url, data, { headers: getHeaders() });
    return response.data;
}

export async function destroy(url) {
    const response = await axios.delete(url, { headers: getHeaders() });
    return response.data;
}

export async function get(url, params) {
    const response = await axios.get(url, {
        params,
        headers: getHeaders(),
    });
    return response.data;
}

export function setToken(token) {
    localStorage.setItem(window.TOKEN_KEY, token);
}

export function getToken() {
    return localStorage.getItem(window.TOKEN_KEY);
}

export function removeToken() {
    localStorage.removeItem(window.TOKEN_KEY);
    // remove the authorization header
    removeHeader("Authorization");
}
