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

}
