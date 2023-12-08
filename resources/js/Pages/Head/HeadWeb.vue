<template>
<el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" :ellipsis="true" @select="handleSelect">
    <el-menu-item index="10">
        <Link :href="route('page.home')">
        <logo-vue></logo-vue>
        </Link>
    </el-menu-item>
    <div class="flex-grow" />
    <el-sub-menu index="1">
        <template #title>
            Agence
        </template>
        <el-sub-menu index="1-1">
            <template #title>
                Agence Interne
            </template>
            <div class="" v-for="(value,index) in interne" :key="index">
                <Link :href="route('page.agence',value.name)">
                        <el-menu-item :index="`1-1-${index}`" >
                        {{ value.city }}
                        </el-menu-item>
                </Link>
            </div>
        </el-sub-menu>
        <div class="" v-for="(value,index) in agence" :key="index">
            <Link :href="route('page.agence',value.valueEng)">
            <el-menu-item :index="`1-${index}`">
                {{ value.value }}
            </el-menu-item>
            </Link>
        </div>
    </el-sub-menu>
    <el-sub-menu index="2">
        <template #title>Voyage</template>
        <div class="" v-for="(value,index) in voyage" :index="index">
            <el-menu-item :index="`2-1-${index}`">
            {{ value.value }}
            </el-menu-item>
        </div>
    </el-sub-menu>
    <el-sub-menu index="13">
        <template #title> Sponsor </template>
        <el-menu-item v-for="(value, index) in sponsor" :key="index" :index="`13-1-${index + 1}`">
            {{ value.value }}
        </el-menu-item>
    </el-sub-menu>
    <el-sub-menu index="4" v-if="donne.auth">
        <template #title>
           {{ donne.user.email }}
        </template>
        <div class="" v-for="(value,index) in dash" :key="index">
            <Link :href="route(value.route,value.api)">
                <el-menu-item :index="`4-${index}`">{{ value.value }} </el-menu-item>
            </Link>

        </div>
    </el-sub-menu>
    <el-sub-menu index="15">
        <template #title>
            <div class="text-blue-400 font-bold">Rejoint nous</div>
        </template>
        <el-menu-item v-for="(value, index) in admin" :key="index" :index="`15-1-${index}`">
            <Link :href="route(value.route)">
            {{ value.value }}
            </Link>
        </el-menu-item>
        <el-sub-menu index="16">
            <template #title>Plus</template>
            <el-menu-item v-for="(value, index) in param" :key="index" :index="`16-1-${index}`">
                {{ value.value }}
            </el-menu-item>
        </el-sub-menu>
    </el-sub-menu>
</el-menu>
</template>

<script lang="ts" setup>
import {
    ref,computed
} from "vue";
import { usePage } from "@inertiajs/vue3"
import LogoVue from "../Logo/Logo.vue";
import Airport from "../Donne/airports.json";

const page = usePage();
const donne = computed(()=>{
    return page.props;
})
const dash = ref([
    {value:"Dashbord",route:"dash",api:""},
    {value:"A propos",route:"dash",api:""}
])
const agence = ref([
    {
        value: "France",
        valueEng:"France",
        route: "page.agence"
    },
    {
        value: "Espagne",
         valueEng:"Spain",
        route: "page.agence"
    },
    {
        value: "Chine",
         valueEng:"China    ",
        route: "page.agence"
    },
]);
const admin = ref([{
        value: "connexion",
        route: "page.connexion"
    },
    {
        value: "inscrire",
        route: "page.inscrire"
    },
]);
const voyage = ref([{
        value: "Liste de vole",
        route: ""
    },
    {
        value: "Réservation",
        route: ""
    },
    {
        value: "Départ",
        route: ""
    },
    {
        value: "Arrivé",
        route: ""
    },
    {
        value: "Calandrie",
        route: ""
    },
])
const interne = computed(()=>{
    return Airport.filter((item)=>item.country === "Madagascar");
    
    
})
const param = ref([{
        value: "Contribution",
        route: ""
    },
    {
        value: "Reste avec nous",
        route: ""
    },
    {
        value: "Notre supposort",
        route: ""
    },
]);
const sponsor = ref([{
        value: "AIR MADAGASCAR",
        route: ""
    },
    {
        value: "HOTEL TANA CENTER",
        route: ""
    },
    {
        value: "HOTEL DE FRANCE",
        route: ""
    },
])
const activeIndex = ref("1");
const handleSelect = (key: string, keyPath: string[]) => {

};
</script>

<style>
.el-menu-demo {
    background: transparent;
}

.flex-grow {
    flex-grow: 1;
}
</style>
