<template>
    <div class="">
        <div class="" v-if="vole.length<=1">
            <Region :liste="vole" />
        </div>
        <div class="" v-else>
            <Nation :liste="vole"/>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref,computed } from "vue"
import { usePage } from "@inertiajs/vue3";
import Airport from "../Donne/airports.json"
import Nation from "../Page/Nation.vue";
import Region from "../Page/Region.vue"


const page = usePage();
const donne = computed(()=>{
    return page.props;
})
const vole = computed(()=>{
    const agency = page.props.agence;
    return Airport.filter(item=>item.name===agency || item.country===agency || item.city===agency)
})
</script>
<script lang="ts">
import LayoutB from '../Layout/LayoutB.vue';
export default {
    layout:LayoutB
}
</script>
<style scoped>
.titre1{
    position: absolute;
    font-size: 22px;
    font-weight: 900;

}
.titre1::after{
    content: "";
    position: absolute;
    width: 100%;
    left: 0;
    bottom: -12px;
    height: 100%;
    border-bottom: 5px solid blue;
}
</style>