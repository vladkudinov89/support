<template>

    <tr>
        <td v-if="!isEditing">{{support.support_title}}</td>
        <td v-if="isEditing"><input v-model="currentSupport.title" type="text"></td>

        <td v-if="!isEditing">{{support.support_message}}</td>
        <td v-if="isEditing">
            <textarea v-model="currentSupport.message" class="form-control"></textarea>
        </td>

        <td v-if="!isEditing">{{support.support_status_active}}</td>
        <td v-if="isEditing">
            <select class="custom-select" v-model="currentSupport.status">
                <option v-for="(selStatus , index) in selectStatus"
                        :key="index" v-bind:value="selStatus.nameParam">
                    {{selStatus.nameParam}}
                </option>
            </select>
        </td>

        <td v-if="!isEditing">{{support.support_status_view}}</td>
        <td v-if="isEditing">
            <select class="custom-select" v-model="currentSupport.viewed">
                <option v-for="(selView , index) in selectView"
                        :key="index" v-bind:value="selView.nameParam">
                    {{selView.nameParam}}
                </option>
            </select>
        </td>

        <td>{{support.support_user_name}}</td>

        <div v-if="isAdmin">
            <td>
                <router-link
                    class="btn btn-success"
                    :to="{ name: 'ClientCabinetPage', params: { id: support.support_user_id }}"
                >Detail
                </router-link>
            </td>
        </div>

        <a
            v-if="!isEditing"
            class="btn btn-warning" @click="editSupport()"
        >Edit
        </a>

        <div v-if="isAdmin">
            <a class="btn btn-primary" v-if="isEditing" @click="updateSupportByAdmin(support.id)">Update</a>
        </div>

        <a class="btn btn-primary" v-if="isEditing" @click="updateSupportByClient(support.id)">Update</a>
    </tr>

</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';

    export default {
        name: "SupportItem",
        props: ['support', 'isAdmin'],
        data: function () {
            return {
                isEditing: false,
                selectStatus: [
                    {
                        nameParam: 'active',
                    },
                    {
                        nameParam: 'closed',
                    }
                ],
                selectView: [
                    {
                        nameParam: 'viewed',
                    },
                    {
                        nameParam: 'unviewed',
                    }
                ],
                currentSupport: {
                    id: this.support.id,
                    title: this.support.support_title,
                    message: this.support.support_message,
                    status: this.support.support_status_active,
                    viewed: this.support.support_status_view
                }
            }
        },
        methods: {
            ...mapActions('support', {
                    updateSupport: 'updateSupportByAdmin',
                    updateSupportClient: 'updateSupportByClient'
                }
            ),
            editSupport() {
                this.isEditing = true;
            },
            update(updateWay , id){
                updateWay({
                    id: id,
                    title: this.currentSupport.title,
                    message: this.currentSupport.message,
                    status_activities: this.currentSupport.status,
                    status_view: this.currentSupport.viewed
                })
                    .then((result) => {
                        this.isEditing = false;
                    })
                    .catch(function (response) {
                        alert("Could not update support!");
                    });
            },
            updateSupportByAdmin(id) {
                this.updateSupport({
                    id: id,
                    title: this.currentSupport.title,
                    message: this.currentSupport.message,
                    status_activities: this.currentSupport.status,
                    status_view: this.currentSupport.viewed
                })
                    .then((result) => {
                        this.isEditing = false;
                    })
                    .catch(function (response) {
                        alert("Could not update support!");
                    })
            },
            updateSupportByClient(id){
               this.update(this.updateSupportClient , id);
            }
        }
    }
</script>

<style scoped>

</style>
