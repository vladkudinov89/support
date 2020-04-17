function getSupportById(supports, supportId) {
    let result;

    Object.keys(supports).forEach(function (key) {
        if (supports[key]['id'] === parseInt(supportId)) {
            result = supports[key];
        }
    });

    return result;
}

export default {

    SET_CURRENT_CLIENT: (state, user) => {
        state.user = user;
    },

    SET_ADMIN_ROLE: (state, role) => {
        state.isAdmin = role;
    },

    SET_ADMIN_SUPPORTS: (state, supports) => {
        state.supportsAdmin = supports;
    },

    SET_CLIENT_SUPPORTS: (state, supports) => {
        state.supportsClient = supports;
    },

    UPDATE_SUPPORT_BY_ADMIN: (state, data) => {
        let support = getSupportById(state.supportsAdmin, data.id);
        support.support_title = data.title;
        support.support_message = data.message;
        support.support_status_active = data.status_activities;
        support.support_status_view = data.status_view;
    },

    UPDATE_SUPPORT_BY_CLIENT: (state, data) => {
        let support = getSupportById(state.supportsClient, data.id);
        support.support_title = data.title;
        support.support_message = data.message;
        support.support_status_active = data.status_activities;
        support.support_status_view = data.status_view;
    },

}
