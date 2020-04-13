import httpService from '../../../services/common/httpService';
import normalizerService from "../../../services/common/normalizerService";

export default {

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

    fetchClientSupport: (context , clientId) => {
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
