import httpService from '../../../services/common/httpService';
import normalizerService from "../../../services/common/normalizerService";

export default {

    fetchSupport: (context) => {
        return new Promise((resolve, reject) => {
            httpService.get('/admin/supports')
                .then((response) => {
                    let normalizerSupports = normalizerService.normalize(response.data);
                    context.commit('SET_SUPPORTS', normalizerSupports);
                    resolve(normalizerSupports);
                }).catch(function (err) {
                reject(err);
            });
        });
    },
}
