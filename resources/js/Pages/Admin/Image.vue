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
            <el-tabs :tab-position="tabPosition" style="height: calc(100vh - 50px)" class="demo-tabs">
                <el-tab-pane label="Titre de page">
                    <div class="">

                    </div>
                </el-tab-pane>
                <el-tab-pane label="Carouselle">
                    <div class="media">
                        <div class="col-span-4 shadow-lg shadow-indigo-950 hover:shadow-purple-950 duration-1000">
                            <div class=" margin">
                                <dig class="">
                                    <div class="text-center">
                                        <p class="text-white text-[22px]">Ajouter Image Carouselle</p>
                                    </div>
                                    <form action="" class="space-y-4 margin" @submit.prevent="ajouter">
                                        <div class="relative text-sm">
                                            <input type="text" class="indent-4 input" v-model="form.text" placeholder="description">
                                            <i class="fas fa-edit fa-sm absolute top-1/4 left-3"></i>
                                        </div>
                                        <div class="text-sm">
                                        <message-vue :message="errors.text"></message-vue>
                                        </div>
                                        <div class="relative">
                                        <textarea v-model="form.description" id="" class="indent-4 rounded-sm h-20 text-sm input" placeholder="description image"></textarea>
                                        </div>
                                        <div class="">
                                            <input type="file" class="text-sm h-9" @input="form.image = $event.target.files[0]" />
                                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                                {{ form.progress.percentage }}%
                                            </progress>
                                        </div>
                                        <div class="text-sm">
                                        <message-vue :message="errors.image"></message-vue>
                                        </div>
                                        <div class="text-sm">
                                        <button class="btn">Ajouter</button>
                                        </div>
                                    </form>
                                </dig>
                            </div>
                        </div>
                        <div class="col-span-4">
                        </div>
                        <div class="col-span-4"></div>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="Value">Role</el-tab-pane>
                <el-tab-pane label="Autre menu">Task</el-tab-pane>
            </el-tabs>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref,reactive } from 'vue'
import { router } from "@inertiajs/vue3"
import MessageVue from "../component/Message.vue"

const props = defineProps(['errors'])
const form = reactive({
    image:null,
    text:null,
    description:null
})
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