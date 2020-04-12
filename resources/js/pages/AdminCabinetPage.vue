<template>
    <div>
        <div class="container">
            <div class="row">
                Cabinet Admin
                <admin-cabinet-component></admin-cabinet-component>

            </div>
        </div>
    </div>
</template>

<script>
    import AdminCabinetComponent from "../components/cabinet/admin/AdminCabinetComponent";

    export default {
        name: "AdminCabinetPage",
        components: {
            AdminCabinetComponent
        },
    }
</script>
