<template>
    <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" :ellipsis="false" @select="handleSelect">
        <el-menu-item index="0">
            <logo-vue></logo-vue>
        </el-menu-item>
        <div class="flex-grow" />
        <el-sub-menu index="1">
            <template #title>
                Agence
            </template>
            <el-menu-item v-for="(value,index) in agence" :key="index" :index="`1-${index+1}`">
                {{ value.value }}
            </el-menu-item>
        </el-sub-menu>
        <el-sub-menu index="4">
            <template #title>
                Voyage
            </template>
            <el-menu-item v-for="(value,index) in agence" :key="index" :index="`1-${index+1}`">
                {{ value.value }}
            </el-menu-item>
        </el-sub-menu>
        <el-menu-item index="2">A propos</el-menu-item>
        <el-sub-menu index="3">
            <template #title>
                <div class="text-blue-400 font-bold">Inscrire | connexion</div>
            </template>
            <el-menu-item  v-for="(value,index) in admin" :key="index" :index="`3-${index}`">
                {{ value.value }}
            </el-menu-item>
            <el-sub-menu index="2-4">
                <template #title>Plus</template>
                <el-menu-item v-for="(value,index) in param" :key="index" :index="`2-4-${index}`">
                    {{ value.value }}
                </el-menu-item>
            </el-sub-menu>
        </el-sub-menu>
    </el-menu>
</template>
  
<script lang="ts" setup>
import { ref } from 'vue'
import LogoVue from '../Logo/Logo.vue'
const agence = ref([
   {value:"Madagasikara",route:""},
   {value:"France",route:''},
   {value:"Espagne",route:''},
   {value:"Chine",route:''},
])
const admin = ref([
    {value:"connexion",route:""},
    {value:"inscrire",route:""},
])
const param = ref([
    {value:"Notre supposort",route:''},
    {value:"Notre supposort",route:''},
    {value:"Notre supposort",route:''},
])
const activeIndex = ref('1')
const handleSelect = (key: string, keyPath: string[]) => {
    console.log(key,keyPath)
}
</script>
  
<style>
.flex-grow {
    flex-grow: 1;
}
</style>
  