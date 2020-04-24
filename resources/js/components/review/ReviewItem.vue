<template>
    <div>

        <div v-show="isAdmin" class="card card-inner">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 order-md-10">
                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                        <p class="text-secondary text-center">{{ date }}</p>
                    </div>
                    <div class="col-md-10 order-md-2">
                        <p><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman
                            Akash</strong></a></p>
                        <p>
                            ADMIN. {{ review.description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div v-show="!isAdmin" class="row">
            <div class="col-md-2">
                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                <p class="text-secondary text-center">{{ date }}</p>
            </div>
            <div class="col-md-10">
                <p>
                    <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html">
                        <strong>Maniruzzaman Akash</strong>
                    </a>

                </p>
                <div class="clearfix"></div>
                <p>
                    User.
                    {{ review.description}}
                    .</p>
            </div>
        </div>

    </div>

</template>

<script>
    import moment from "moment";

    export default {
        name: "ReviewItem",
        props: ['review'],
        data: function () {
            return {
                user_role: this.review.user_role
            }
        },
        methods: {},
        computed: {
            isAdmin() {
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
