<template>
    <div>

        <div v-show="isAdminInReview" class="card card-inner">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 order-md-10">
<!--                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>-->
                        <p class="text-secondary text-center">{{ date }}</p>
                    </div>
                    <div class="col-md-10 order-md-2">
                        <p><a>
                            <strong>{{review.user_name}}</strong></a></p>
                        <p v-if="!isEditing" >
                            ADMIN. {{ review.description}}
                        </p>
                        <textarea v-if="isEditing" v-model="currentReview.description" class="form-control" rows="3"></textarea>
                        <div class="d-flex justify-content-start">
                            <a v-show="isAdmin" v-if="!isEditing" @click="editReview" class="btn btn-info">Edit</a>
                            <a
                                v-if="isEditing"
                                class="btn btn-success" @click="updateReview(review.id)"
                            >Update
                            </a>
                            <a
                                v-if="isEditing"
                                class="btn btn-danger" @click="cancelEditReview()"
                            >Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div v-show="!isAdminInReview" class="row">
            <div class="col-md-2">
<!--                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>-->
                <p class="text-secondary text-center">{{ date }}</p>
            </div>
            <div class="col-md-10">
                <p>
                    <a class="float-left">
                        <strong>{{review.user_name}}</strong>
                    </a>

                </p>
                <div class="clearfix"></div>
                <p v-if="!isEditing" >
                    User.
                    {{ review.description}}
                    .</p>
                <textarea v-if="isEditing" v-model="currentReview.description" class="form-control" rows="3"></textarea>
                <div class="d-flex justify-content-end">
                    <a v-if="!isEditing" @click="editReview" class="btn btn-info">Edit</a>
                    <a
                        v-if="isEditing"
                        class="btn btn-success" @click="updateReview(review.id)"
                    >Update
                    </a>
                    <a
                        v-if="isEditing"
                        class="btn btn-danger" @click="cancelEditReview()"
                    >Cancel
                    </a>
                </div>
            </div>

        </div>

    </div>

</template>

<script>
    import moment from "moment";
    import {mapActions , mapGetters} from "vuex";

    export default {
        name: "ReviewItem",
        props: ['review'],
        data: function () {
            return {
                isEditing : false,
                user_role: this.review.user_role,
                currentReview: {
                    id: this.review.id,
                    description: this.review.description,
                    support_id : this.review.support_id
                }
            }
        },
        methods: {
            ...mapActions('support', {
                updateReviewSupport: 'updateReviewSupport'
            }),
            updateReview(){
                this.updateReviewSupport({
                    id: this.currentReview.id,
                    description : this.currentReview.description
                })
                    .then((result) => {
                        this.cancelEditReview();
                    })
                    .catch(function (response) {
                        console.log(response);
                        alert("Could not update review!");
                    });
            },
            editReview(){
                this.isEditing = true;
            },
            cancelEditReview(){
                this.isEditing = false;
            }
        },
        computed: {
            ...mapGetters('support' , {
                getAuthenticatedUser : 'getAuthenticatedUser'
            }),
            isAdmin(){
                if (this.getAuthenticatedUser.role === 'admin') {
                    return true;
                } else {
                    return false;
                }
            },
            isAdminInReview() {
                if (this.user_role === 'admin') {
                    return true;
                } else {
                    return false;
                }
            },
            date() {
                return moment(String(this.review.created_at)).fromNow();
            }

        }
    }
</script>

<style scoped>

</style>
