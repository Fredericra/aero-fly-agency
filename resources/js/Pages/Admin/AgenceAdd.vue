<template>
    <div class="h-screen">
        <div class="px-4 py-4">
            <div class="media">
                <div class="col-span-4"></div>
                <div class="col-span-4"></div>
                <div class="col-span-4">
                    <p class="text-[22px] font-bold text-white "></p>
                </div>
            </div>
            <el-tabs :tab-position="tabPosition" style="height: calc(100vh - 50px)" class="demo-tabs">
                <el-tab-pane label="Ajouter Novelle Compagnie">
                    <div class="media">
                        <div class="col-span-4 shadow-lg shadow-indigo-950 hover:shadow-purple-950 duration-1000">
                            <div class=" margin">
                                <dig class="">
                                    <div class="text-center">
                                        <p class="text-white text-[22px]">Ajouter nouvelle compagnie</p>
                                    </div>
                                </dig>
                                <add-compagnie :errors="errors"></add-compagnie>
                            </div>
                        </div>
                        <div class="col-span-8">
                        
                        </div>
                        <div class="col-span-4"></div>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="Vole compagnie">Role</el-tab-pane>
                <el-tab-pane label="Autre menu">Task</el-tab-pane>
                <el-tab-pane label="Titre de page">
                    <div class="">

                    </div>
                </el-tab-pane>
            </el-tabs>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref,reactive } from 'vue'
import { router } from "@inertiajs/vue3"
import AddCompagnie from '../Web/AddCompagnie.vue';

const props = defineProps(['errors'])
const ajouter = ()=>{
    router.post(route('admin.image.carouselle'),form);
   console.log(ajouter)
} 
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