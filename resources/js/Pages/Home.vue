<script setup lang="ts">
import HomeBody from './Page/HomeBody.vue'
</script>
<template>
    <div>
        <el-carousel :interval="1000">
            <el-carousel-item v-for="i in 3">
                <h3 class="small justify-center" text="2xl">{{ i }}</h3>
        </el-carousel-item>
        </el-carousel>
        <div class="py-4 px-4">
            <home-body></home-body>
        </div>
    </div>
</template>
<script lang="ts">
import LayoutBVue from './Layout/LayoutB.vue';
export default {
    layout:LayoutBVue
}
</script>
<style scoped>
.demonstration {
  color: var(--el-text-color-secondary);
}

.el-carousel__item h3 {
  color: #475669;
  opacity: 0.75;
  line-height: 150px;
  margin: 0;
  text-align: center;
}

.el-carousel__item:nth-child(2n) {
  background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n + 1) {
  background-color: #d3dce6;
}
</style>