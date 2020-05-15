function getSupportById(supports, supportId) {
    let result;

    Object.keys(supports).forEach(function (key) {
        if (supports[key]['id'] === parseInt(supportId)) {
            result = supports[key];
        }
    });

    return result;
}

function getReviewById(reviews, reviewId) {
    return reviews.find(review => {
        return review.id === parseInt(reviewId);
    });
}

function convertToArray(supports) {
    let result = [];

    Object.keys(supports).forEach(function (key) {

        result.push(supports[key]);

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

    SET_CLIENT_SINGLE_SUPPORT: (state, support) => {
        state.supportClient = support;
    },

    SET_REVIEW_BY_CURRENT_SUPPORT: (state, data) => {
        state.reviewsCurrentSupport = data;
    },

    ADD_SUPPORT_BY_CLIENT: (state, support) => {
        state.supportsClient.push(support);
    },

    ADD_REVIEW_TO_CURRENT_SUPPORT: (state, review) => {
         let addReview = getReviewById(state.reviewsCurrentSupport, review.id);
         if(state.reviewsCurrentSupport.includes(addReview) !== true){
                 state.reviewsCurrentSupport.push(review);
         }
    },

    UPDATE_REVIEW_SUPPORT: (state, data) => {
        let review = getReviewById(state.reviewsCurrentSupport, data.id);
        review.description = data.description;
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

        state.supportClient = support;
    },

    UPDATE_VIEW_STATUS_SUPPORT: (state, data) => {
        let support = getSupportById(state.supportsClient, data.id);
        support.support_status_view = 'viewed';
        support.is_admin_viewed_support = 1;
        state.supportClient = support;
    },

    UPDATE_ACTIVE_STATUS_SUPPORT_BY_CLIENT: (state, data) => {
        let support = getSupportById(state.supportsClient, data.id);
        support.support_status_active = 'closed';
        state.supportClient = support;
    },

    DELETE_SUPPORT_BY_ADMIN: (state, id) => {
        const index = state.supportsAdmin.findIndex(support => support.id === id);
        state.supportsAdmin.splice(index, 1);
    },

    DELETE_SUPPORT_BY_CLIENT: (state, id) => {
        const index = state.supportsClient.findIndex(support => support.id === id);
        state.supportsClient.splice(index, 1);
    },

    DELETE_REVIEW: (state, id) => {
        const index = state.reviewsCurrentSupport.findIndex(review => review.id === id);
        state.reviewsCurrentSupport.splice(index, 1);
    },

}
