<script setup>
import FormConnexion from "./FormConnexion.vue"

const props = defineProps(['errors']);
</script>
<template>
    <div class="h-screen">
        <div class="h-screen py-20">
            <div class="media">
                <div class="col-span-4"></div>
                <div class="col-span-4" >
                    <div class="py-4 px-4">
                        <div class="px-4 py-4 shadow-lg">
                            <div class="text-center">
                                <p class="titre">Connexion</p>
                            </div>
                            <div class="py-2 px-4">
                                <hr />
                            </div>
                            <div class="py-2 px-4">
                               <form-connexion :errors="errors"></form-connexion>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4"></div>
            </div>
        </div>
    </div>
</template>
<script setup></script>
<script>
import LayoutB from "../Layout/LayoutB.vue";
export default {
    layout: LayoutB,
};
</script>
<style scoped></style>
