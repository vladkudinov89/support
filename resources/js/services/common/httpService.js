import axios from 'axios';
import storageService from './storageService';

export class HttpService {
    constructor() {
        this.axios = axios.create({
            baseURL: '/api/v1/'
        });

        this.axios.get('role/token')
            .then((response) => {
                storageService.setToken(response.data.data.token);
            })
            .catch(function (error) {
                console.log(error);
            });

        this.axios.interceptors.request.use(
            config => {
                if (storageService.hasToken()) {
                    config.headers['Accept'] = 'application/json';
                    config.headers['Authorization'] =  'Bearer '+ storageService.getToken();
                }

                return Promise.resolve(config);
            },
            error => {
                return Promise.reject(error);
            }
        );
    }

    get(url, params) {
        return this.axios.get(url, params);
    }

    post(url, data) {
        return this.axios.post(url, data);
    }

    put(url, data) {
        return this.axios.put(url, data);
    }

    delete(url, params) {
        return this.axios.delete(url, params);
    }
}

export default new HttpService();
