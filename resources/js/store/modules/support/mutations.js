function getSupportById(supports , supportId){
    return supports.find( support => {
        return support.id === parseInt(supportId);
    });
}

export default {

    SET_CURRENT_CLIENT: (state , user) => {
      state.user = user;
    },

    SET_ADMIN_ROLE: (state , role) => {
        state.isAdmin = role;
    },

    SET_ADMIN_SUPPORTS: (state, supports) => {
        state.supportsAdmin = supports;
    },

    SET_CLIENT_SUPPORTS: (state, supports) => {
        state.supportsClient = supports;
    },

    UPDATE_SUPPORT_BY_ADMIN: (state , data) => {
        let support = getSupportById(state.supportsAdmin , data.id);
        support.title = data.title;
        support.message = data.message;
        support.status = data.status;
        support.viewed = data.viewed;
    },

}
