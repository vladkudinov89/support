<template>
    <div>
        <a class="btn btn-info" @click="back()">{{ this.text}}</a>
    </div>
</template>

<script>
    export default {
        name: "Back",
        data: function () {
return{
    text: 'Back'
}
        },
        methods: {
            back(){
                this.$router.go(-1);
            }
        }
    }
</script>

<style scoped>

</style>
