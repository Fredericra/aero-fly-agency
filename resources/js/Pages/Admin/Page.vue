<template>
  <div class="h-screen">
    <div class="px-4 py-4">
      <div class="media">
        <div class="col-span-4"></div>
        <div class="col-span-4"></div>
        <div class="col-span-4">
          <p class="text-[22px] font-bold text-white ">Parametre de Page</p>
        </div>
      </div>
      <el-tabs :tab-position="tabPosition" style="height: 200px" class="demo-tabs">
        <el-tab-pane label="Menu"></el-tab-pane>
        <el-tab-pane label="Service">Role</el-tab-pane>
        <el-tab-pane label="Footer"></el-tab-pane>
        <el-tab-pane label="Header"></el-tab-pane>
      </el-tabs>
    </div>
  </div>
</template>
<script lang="ts" setup>
import { ref } from 'vue'

const tabPosition = ref('right')
</script>

<script lang="ts">
import LayoutA from '../Layout/LayoutA.vue';
export default {
  layout: LayoutA
}
</script>

<style>
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
  