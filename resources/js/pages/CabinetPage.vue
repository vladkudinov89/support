<template>
    <div>
        <div class="container">
            <div class="row">
                Cabinet all

                <router-link
                    class="btn btn-success"
                    :to="{ name: 'AdminCabinetPage'}"
                >Admin Cabinet
                </router-link>

                <router-link
                    class="btn btn-success"
                    :to="{ name: 'ClientCabinetPage'}"
                >Client Cabinet
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "CabinetPage",
    }
</script>
