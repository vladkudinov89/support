import httpService from '../../../services/common/httpService';
import normalizerService from "../../../services/common/normalizerService";

export default {

    fetchUserRole: (context) => {
        return new Promise((resolve, reject) => {
            httpService.get('/role/user')
                .then((response) => {
                    let normalizerRole = Object.assign(response.data.data.is_admin, {});
                    context.commit('SET_ADMIN_ROLE', normalizerRole);
                    resolve(normalizerRole);
                })
                .catch(function (err) {
                    reject(err);
                });
        });
    },

    fetchSupport: (context) => {
        return new Promise((resolve, reject) => {
            httpService.get('/admin/supports')
                .then((response) => {
                    let normalizerSupports = normalizerService.normalize(response.data);
                    context.commit('SET_ADMIN_SUPPORTS', normalizerSupports);
                    resolve(normalizerSupports);
                }).catch(function (err) {
                reject(err);
            });
        });
    },

    fetchClientSupport: (context, clientId) => {
        return new Promise((resolve, reject) => {
            httpService.get('/client/support/' + clientId)
                .then((response) => {
                    let normalizerSupports = normalizerService.normalize(response.data);
                    context.commit('SET_CLIENT_SUPPORTS', normalizerSupports);
                    resolve(normalizerSupports);
                }).catch(function (err) {
                reject(err);
            });
        });
    },
}
