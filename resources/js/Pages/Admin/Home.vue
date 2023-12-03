<script lang="ts" setup>
import { usePage } from "@inertiajs/vue3"
import { computed } from "vue"
import LogoVue from "../Logo/Logo.vue";

const page = usePage();
const user = computed(()=>{
    return page.props.user;
})
</script>
<template>
    <div class="h-screen py-4">
        <div class="media">
            <div class="col-span-4 margin">
                <div class="flex justify-center items-center">
                    <div class="text-center">
                        <p class="text-[32px] font-bold text-white">
                            Dashbord
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-span-4"></div>
            <div class="col-span-4">
                <div class=" shadow-lg rounded-md drop-shadow-lg margin">
                            <div class="text-center">
                                <p class="titre">
                                    {{ user.email }}
                                </p>
                                <ul>
                                    <li v-for="i in 4" :key="i">
                                        <div class="flex justify-between items-center">
                                            <div class="font-bold underline text-right text-white">Billet de resevation</div>
                                            <div class="">
                                            {{ i }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                </div>
            </div>
        </div>
        <div class="media margin">
            <div class="col-span-4"></div>
            <div class="col-span-4">
                <div class="flex justify-center items-center">
                <logo-vue class="h-[400px]"></logo-vue>
                </div>
            </div>
            <div class="col-span-4">
               
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import LayoutA from '../Layout/LayoutA.vue';
export default {
    layout:LayoutA
}
</script>
