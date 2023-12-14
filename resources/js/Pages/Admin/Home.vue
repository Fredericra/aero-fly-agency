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
                            Dashbord | Bienvenue 
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-span-4"></div>
            <div class="col-span-4">
                
            </div>
        </div>
        <div class="media margin">
            <div class="col-span-4"></div>
            <div class="col-span-4">
                <div class="flex justify-center items-center h-screen">
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
