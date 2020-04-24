<template>
    <div>
        <div class="col-md-6 mb-3">
            <div class="well well-sm">

                <div class="row" id="post-review-box">
                    <div class="col-md-12">

                        <textarea class="form-control animated" cols="50" id="new-review" name="comment"
                                  placeholder="Enter your review here..." rows="3"
                        v-model="newReview.description"></textarea>

                        <div class="text-right">
                            <a class="btn btn-danger" @click="clearReview" id="close-review-box"
                               style="margin-right: 10px;">
                                Cancel
                            </a>
                            <a @click="addReview" class="btn btn-success">Add Review</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import {  mapGetters } from 'vuex';
    export default {
        name: "AddReview",
        data: function (){
            return{
                newReview: {
                    description: '',
                    user_id: '',
                    support_id : ''
                }
            }
        },
        computed: {
            ...mapGetters('support',['getAuthenticatedUser']),
        },
        methods: {
            openReviewForm() {

            },
            clearReview() {
                this.newReview.description = '';
            },
            addReview(){
                this.newReview.user_id = parseInt(this.getAuthenticatedUser.id);
                this.newReview.support_id = parseInt(this.$route.params.supportId);

                this.$store.dispatch('support/addReviewToSupport' , this.newReview)
                .then((response) => {
                  this.clearReview();
                })

            }
        }
    }
</script>

<style scoped>

</style>
