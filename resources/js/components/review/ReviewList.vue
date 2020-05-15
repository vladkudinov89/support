<template>
    <div>

        <h2 class="text-center">Reviews</h2>

        <add-review></add-review>
        <div class="card">
            <div class="card-body">

                <review-item
                    v-for="(review , index) in reviewsCurrentSupport"
                    :key="review.id"
                    :review.sync="review"
                ></review-item>

            </div>
        </div>

    </div>
</template>

<script>
    import {mapState} from "vuex";
    import AddReview from "./AddReview";
    import ReviewItem from "./ReviewItem";
    import webSocketService from "../../services/common/webSocketService";

    export default {
        name: "ReviewList",
        components: {ReviewItem, AddReview},
        data: function () {
            return {}
        },
        computed: {
            ...mapState('support', {
                reviewsCurrentSupport: 'reviewsCurrentSupport',
                user: 'user'
            }),
        },
        created() {
            this.initialLoad();

            const Echo = webSocketService.initLaravelEcho();

              Echo.private('reviews').listen('.review.added', (payload) => {
                this.$store.commit('support/ADD_REVIEW_TO_CURRENT_SUPPORT', payload);
            });             
        },
        methods: {
            initialLoad() {
                const rev = {
                    clientId: '',
                    supportId: ''
                };

                rev.clientId = this.$route.params.userId;
                rev.supportId = this.$route.params.supportId;

                this.$store.dispatch('support/fetchSupportReviews', rev);
            },
        }
    }
</script>

<style scoped>

</style>
