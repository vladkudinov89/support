<template>
    <div>
        <div class="container">
            <div class="row">
                Cabinet Client
                <client-cabinet-component></client-cabinet-component>

            </div>
        </div>
    </div>
</template>

<script>
    import ClientCabinetComponent from "../components/cabinet/client/ClientCabinetComponent";

    export default {
        name: "ClientCabinetPage",
        components: {
            ClientCabinetComponent
        },
    }
</script>
