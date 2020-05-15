import Echo from 'laravel-echo';
import storageService from "./storageService";

window.io = require('socket.io-client');

const initLaravelEcho  = () => {
 return new Echo({
        broadcaster: 'socket.io',
        host: window.location.hostname + ':80',
        auth: {
            headers: {
                Authorization: 'Bearer ' + storageService.getToken()
            }
        }
    });
}

export default {
    initLaravelEcho
}
