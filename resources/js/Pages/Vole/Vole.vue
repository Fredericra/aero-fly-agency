<template>
    <div class="h-screen">
        <div class="py-4 text-center">
            <p class="titre">Agence | AERO</p>
        </div>
        <div class="px-4 py-4">
            <el-tabs :tab-position="tabPosition" style="height: calc(100vh - 50px)" class="demo-tabs">
                <el-tab-pane label="Vole d'attente">
                    <liste-vole></liste-vole>
                </el-tab-pane>
                <el-tab-pane label="Liste de Avion">
                    <liste-avion></liste-avion>
                </el-tab-pane>
                <el-tab-pane label="Ajouter vole">
                    <add-fly></add-fly>
                </el-tab-pane>
                <el-tab-pane label="Ajouter Avion">
                    <avion-ajouter></avion-ajouter>
                </el-tab-pane>
                <el-tab-pane label="Vole reporté">
                    
                </el-tab-pane>
                <el-tab-pane label="Liste de vole">
                    <actif-vole></actif-vole>
                </el-tab-pane>
                <el-tab-pane label="Parametre"></el-tab-pane>
            </el-tabs>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref,reactive } from 'vue'
import { router } from "@inertiajs/vue3"
import AddAgence from "../Agence/AddAgence.vue"
import ListeVue from "../Agence/Liste.vue"
import AvionAjouter from '../Agence/AvionAjouter.vue'
import ListeAvion from '../Agence/ListeAvion.vue'
import AddFly from './AddFly.vue'
import ListeVole from "./ListeVole.vue"
import ActifVole from "./ActifVole.vue"


const tabPosition = ref('right')
</script>
<script lang="ts">
import LayoutA from '../Layout/LayoutA.vue';
export default {
    layout: LayoutA
}
</script>

<style scoped>
.bien:hover .okay{
    transform: translateY(-10px);
    transform-origin:top ;
    border-top-right-radius:20px ;
    border-top-left-radius:20px ;
}
.okay{
    transform-origin: bottom;
    bottom: 0;
    transform: translateY(150px);
}
.demo-tabs>.el-tabs__content {
    padding: 32px;
    color: #6b778c;
    font-size: 32px;
    font-weight: 600;
}

.el-tabs--right .el-tabs__content,
.el-tabs--left .el-tabs__content {
    height: 100%;
}
</style>