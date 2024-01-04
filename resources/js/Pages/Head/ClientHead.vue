<template>
    <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" :ellipsis="true" @select="handleSelect">
        <el-menu-item index="0">
            <Link :href="route('page.home')">
            <logo-vue></logo-vue>
            </Link>
        </el-menu-item>
        <div class="flex-grow" />
        <el-sub-menu index="1">
            <template #title> MonFly </template>
            <el-menu-item v-for="(value, index) in agence" :key="index" :index="`1-${index + 1}`">
                {{ value.value }}
            </el-menu-item>
        </el-sub-menu>
        <el-sub-menu index="4">
            <template #title> MonProfile </template>
            <el-menu-item v-for="(value, index) in agence" :key="index" :index="`1-${index + 1}`">
                {{ value.value }}
            </el-menu-item>
        </el-sub-menu>
        <el-menu-item index="2">A propos</el-menu-item>
        <el-sub-menu index="3">
            <template #title>
                <div class="text-blue-400 font-bold">Parametre</div>
            </template>
            <div class="" v-for="(value, index) in admin" :key="index">
                <Link :href="route(value.route, ShareData.user)">
                <el-menu-item :index="`3-${index}`">
                    {{ value.value }}
                </el-menu-item>
                </Link>
            </div>
            <el-sub-menu index="2-4">
                <template #title>Plus</template>
                <el-menu-item v-for="(value, index) in param" :key="index" :index="`2-4-${index}`">
                    {{ value.value }}
                </el-menu-item>
            </el-sub-menu>
        </el-sub-menu>
    </el-menu>
</template>

<script lang="ts" setup>
import { usePage } from "@inertiajs/vue3";
import { computed,ref,reactive } from "@vue/reactivity";
import LogoVue from "../Logo/Logo.vue";

const page = usePage();
const ShareData = computed(()=>{
    return page.props;
})
const user = computed(()=>{
    return page.props.user;
})

const admin = ref([
    { value: "Sortie", route: "admin.sortie", api: ShareData.user ? ShareData : null },
    { value: "parametre", route: "parametre.profile", api: ShareData.user ? ShareData : null },
    
]);
const param = ref([
    { value: "Contribution", route: "" },
    { value: "Reste avec nous", route: "" },
    { value: "Notre supposort", route: "" },
]);
const sponsor = ref([
    { value: "AIR MADAGASCAR", route: "" },
    { value: "HOTEL TANA CENTER", route: "" },
    { value: "HOTEL DE FRANCE", route: "" },
])
const activeIndex = ref("1");
const handleSelect = (key: string, keyPath: string[]) => {
};
</script>

<style>
.el-menu-demo{
    background: transparent;
}
.flex-grow {
    flex-grow: 1;
}

.flex-grow {
    flex-wrap: wrap;
}
</style>