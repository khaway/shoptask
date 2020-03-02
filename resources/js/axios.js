import axios from 'axios';

export function createAxios () {
    return axios.create({
        // baseURL: window.laravel.baseUrl
    });
}
