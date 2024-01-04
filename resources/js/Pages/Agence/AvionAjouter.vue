<template>
    <div class="text-sm">
        <div class="grid grid-cols-3">
            <div class="col-span-1">
                <div class="py-8 px-4">
                    <div class="shadow-lg margin rounded-lg">
                        <form-avion></form-avion>
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                <liste-avion ></liste-avion>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref,computed } from "vue"
import { usePage,router } from "@inertiajs/vue3";
import FormAvion from './FormAvion.vue'
import ListeAvion from "./ListeAvion.vue";

const page = usePage();
const donne = computed(()=>{
    return page.props
})
</script>