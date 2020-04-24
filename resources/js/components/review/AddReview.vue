<template>
    <div>
        <div class="col-md-6">
            <div class="well well-sm">

                <div class="row" id="post-review-box">
                    <div class="col-md-12">

                        <textarea class="form-control animated" cols="50" id="new-review" name="comment"
                                  placeholder="Enter your review here..." rows="5"></textarea>

                        <div class="text-right">
                            <a class="btn btn-danger" @click="closeAddReview" id="close-review-box"
                               style="margin-right: 10px;">
                                Cancel
                            </a>
                            <a class="btn btn-success">Add Review</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "AddReview",
        methods: {
            openReviewForm() {

            },
            closeAddReview() {

            }
        }
    }
</script>

<style scoped>

</style>
