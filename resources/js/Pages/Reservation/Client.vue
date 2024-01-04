<template>
    <div class="h-screen">
    <div class="py-4 text-center">
        <p class="titre">Parametre d'admistrateur</p>
    </div>
        <div class="px-4 py-4">
            <div class="media">
                <div class="col-span-4"></div>
                <div class="col-span-4"></div>
                <div class="col-span-4">
                    <p class="text-[22px] font-bold text-white "></p>
                </div>
            </div>
            <el-tabs :tab-position="tabPosition" style="height: calc(100vh - 50px)" class="demo-tabs">
                <el-tab-pane label="Liste de client">
                </el-tab-pane>
                <el-tab-pane label="Marketing">
                </el-tab-pane>
                <el-tab-pane label="Plus parametre">Task</el-tab-pane>
            </el-tabs>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref,reactive } from 'vue'
import { router } from "@inertiajs/vue3"
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