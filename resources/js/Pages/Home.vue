<script lang="ts" setup>
import {
    computed
} from "vue"
import {
    usePage
} from "@inertiajs/vue3";
import HomeBody from './Page/HomeBody.vue'

const page = usePage();
const images = computed(() => {
    return page.props.carouselle;
})
</script>
<template>
<div>
    <el-carousel :interval="1000" v-if="images.length>0">
        <el-carousel-item v-for="(value,index) in images" :key="index">
            <div class="">
                <div class="media">
                    <div class="col-span-12 px-2 h-full relative">
                        <img :src="value.image" alt="" class="h-[400px] w-full object-cover">
                        <div class="absolute bottom-1/2 left-3/4">
                            <div class="text-center">
                                <p class="text-[20px]  titre" >{{ value.text }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </el-carousel-item>
    </el-carousel>
    <el-carousel :interval="1000" v-else>
        <el-carousel-item v-for="i in 3">
            <h3 class="small justify-center" text="2xl">{{ i }} Commande dans admin | compte admin@gmail.com | agenceaerien@gmail.com </h3>
        </el-carousel-item>
    </el-carousel>
    <div class="py-4 px-4 relative">
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

.el-carousel__item:nth-child(2n+2) {
    background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n + 1) {
    background-color: #d3dce6;
}
</style>
