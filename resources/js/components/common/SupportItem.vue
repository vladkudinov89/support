    <template>

        <tr>
            <td >{{support.support_title}}</td>

            <td >{{support.support_message}}</td>

            <td >{{support.support_status_active}}</td>

            <td >{{support.support_status_view}}</td>

            <td>{{support.support_status_review}}</td>

            <td>{{support.support_user_name}}</td>

            <div v-if="isAdmin">
                <td>
                    <router-link
                        @click.native="changeStatusViewSupport(support.id)"
                        class="btn btn-success"
                        :to="{ name: 'AdminCabinetViewSingleSupportPage', params: {userId: support.support_user_id , supportId: support.id   }}"
                    >Detail
                    </router-link>
                </td>
            </div>

            <div v-if="!isAdmin">
                <td>
                    <router-link
                        class="btn btn-success"
                        :to="{ name: 'ClientCabinetSingleSupportPage', params: { id: support.support_user_id , supportId: support.id }}"
                    >Detail
                    </router-link>
                </td>
            </div>

        </tr>

    </template>

    <script>
        export default {
            name: "SupportItem",
            props: ['support', 'isAdmin'],
            methods: {
                changeStatusViewSupport(id){
                    this.$store.dispatch('support/changeStatusViewSupport' , id);
                }
            }
        }
    </script>

    <style scoped>

    </style>
