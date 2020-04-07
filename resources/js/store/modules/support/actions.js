import getters from "./getters";
import httpService from '../../../services/common/httpService';

export default {

    fetchSupport: (context) => {
        return new Promise((resolve, reject) => {
            httpService.get('/admin/supports')
                .then((response) => {
                    context.commit('SET_SUPPORTS', response.data);
                    resolve(response.data);
                }).catch(function (err) {
                reject(err);
            });
        });
    },
}
