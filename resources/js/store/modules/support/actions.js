import httpService from '../../../services/common/httpService';
import normalizerService from "../../../services/common/normalizerService";

export default {

    fetchUser: (context) => {
        return new Promise((resolve, reject) => {
            httpService.get('/user/account')
                .then((response) => {
                    let normalizerUser = Object.assign(response.data.data, {});
                    context.commit('SET_CURRENT_CLIENT', normalizerUser);
                    resolve(normalizerUser);
                })
                .catch(function (err) {
                    reject(err);
                });
        });
    },

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
                    context.commit('SET_ADMIN_SUPPORTS', response.data.data);
                    resolve(response.data.data);
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
                    // context.commit('SET_CLIENT_SUPPORTS', normalizerSupports);
                    context.commit('SET_CLIENT_SUPPORTS', response.data.data);
                    resolve(response.data.data);
                }).catch((err) => {
                   alert('It is not your cabinet.');
                reject(err);
            });
        });
    },

    fetchClientSingleSupport: (context, support) => {
        return new Promise((resolve, reject) => {
            httpService.get('/client/support/' + support.clientId + '/' + support.supportId)
                .then((response) => {
                    let normalizerSupport = normalizerService.normalizeSingleArray(response.data.data);
                    context.commit('SET_CLIENT_SINGLE_SUPPORT', normalizerSupport);
                    resolve(normalizerSupport);
                }).catch((err) => {
                reject(err);
            });
        });
    },

    AddClientSupport: (context , data) => {
        return new Promise((resolve , reject) => {
            httpService.post(`/client/support` , data)
                .then((response) => {
                    context.commit('ADD_SUPPORT_BY_CLIENT' , response.data.data);
                    resolve(response.data.data);
                }).catch(function (err) {
                reject(err);
            });
        });
    },

    updateSupportByAdmin: (context, data) => {
        return new Promise((resolve , reject) => {
           httpService.put(`/admin/supports/${data.id}` , data)
               .then((response) => {
                   context.commit('UPDATE_SUPPORT_BY_ADMIN' , response.data.data);
                   resolve(response.data.data);
               }).catch(function (err) {
               reject(err);
           });
        });
    },

    updateSupportByClient: (context, data) => {
    return new Promise((resolve , reject) => {
        httpService.put(`/client/supports/${data.id}` , data)
            .then((response) => {
                context.commit('UPDATE_SUPPORT_BY_CLIENT' , response.data.data);
                resolve(response.data.data);
            }).catch(function (err) {
            reject(err);
        });
    });
},

    deleteSupportByAdmin: (context, id) => {
        return new Promise((resolve, reject) => {
            httpService.delete('/admin/supports/' + id)
                .then((response) => {
                    context.commit('DELETE_SUPPORT_BY_ADMIN', id);
                        resolve(response.data.data);
                }).catch((error) => {
                reject(error);
            });
        });
    },

    deleteSupportByClient: (context, id) => {
        return new Promise((resolve, reject) => {
            httpService.delete('/client/supports/' + id)
                .then((response) => {
                    context.commit('DELETE_SUPPORT_BY_CLIENT', id);
                    return response.data.data;
                }).catch((error) => {
                reject(error);
            });
        });
    },

    addReviewToSupport: (context , data) => {
        return new Promise((resolve , reject) => {
            httpService.post(`/review/${data.user_id}/${data.support_id}` , data)
                .then((response) => {
                    context.commit('ADD_REVIEW_TO_CURRENT_SUPPORT' , response.data.data);
                    resolve(response.data.data);
                }).catch(function (err) {
                reject(err);
            });
        });
    },

    updateReviewSupport:  (context , data) => {
    return new Promise((resolve, reject) => {
        httpService.put(`/review/${data.id}` , data)
            .then((response) => {
                context.commit('UPDATE_REVIEW_SUPPORT', response.data.data);
                resolve(response.data.data);
            }).catch((error) => {
            reject(error);
        });
    });
},

    deleteReviewSupport: (context, id) => {
        return new Promise((resolve, reject) => {
            httpService.delete('/review/' + id)
                .then((response) => {
                    context.commit('DELETE_REVIEW', id);
                    return response.data.data;
                }).catch((error) => {
                reject(error);
            });
        });
    },

    fetchSupportReviews : (context , data) => {
        return new Promise((resolve, reject) => {
            httpService.get(`/review/${data.supportId}`)
                .then((response) => {
                    context.commit('SET_REVIEW_BY_CURRENT_SUPPORT', response.data.data);
                    return response.data.data;
                }).catch((error) => {
                reject(error);
            });
        });
    },

    changeStatusViewSupport: (context , id) => {
        return new Promise((resolve, reject) => {
            httpService.put(`/admin/supports/viewed/${id}`)
                .then((response) => {
                    context.commit('UPDATE_VIEW_STATUS_SUPPORT', response.data.data);
                    resolve(response.data.data);
                }).catch((error) => {
                reject(error);
            });
        });
    },
    closeSupportByClient: (context , id) => {
        return new Promise((resolve, reject) => {
            httpService.put(`/client/supports/close/${id}`)
                .then((response) => {
                    context.commit('UPDATE_ACTIVE_STATUS_SUPPORT_BY_CLIENT', response.data.data);
                    resolve(response.data.data);
                }).catch((error) => {
                reject(error);
            });
        });
    },
}
