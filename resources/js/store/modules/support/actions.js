import getters from "./getters";

export default {

    fetchSupport: (context) => {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/supports')
                .then((response) => {
                    context.commit('SET_SUPPORTS', response.data);
                    resolve(response.data);
                }).catch(function (err) {
                reject(err);
            });
        });
    },
}
