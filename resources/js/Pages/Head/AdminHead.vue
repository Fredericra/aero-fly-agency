<template>
    <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" :ellipsis="true" @select="handleSelect">
        <el-menu-item index="0">
            <Link :href="route('page.home')">
            <logo-vue></logo-vue>
            </Link>
        </el-menu-item>
        <div class="flex-grow" />
        <el-sub-menu index="6">
            <template #title> reservation </template>
            <div class="" v-for="(value, index) in reservation" :key="index">
                <Link class="link" :href="route(value.route)">
                    <el-menu-item  :index="`6-${index + 1}`">
                        {{ value.value }}
                    </el-menu-item>
                </Link>
            </div>
        </el-sub-menu>
        <el-sub-menu index="1">
            <template #title> Agence </template>
            <div class="" v-for="(value, index) in agence" :key="index">
                <Link class="link" :href="route(value.route)">
                        <el-menu-item  :index="`1-${index + 1}`">
                            {{ value.value }}
                        </el-menu-item>
                </Link>
            </div>
        </el-sub-menu>
        <el-sub-menu index="4">
            <template #title> Apparence </template>
            <el-menu-item v-for="(value, index) in donne" :key="index" :index="`2-2-${index + 1}`">
                <Link :href="route(value.route)">
                {{ value.value }}
                </Link>
            </el-menu-item>
        </el-sub-menu>
        <el-sub-menu index="5">
            <template #title> Inbox </template>
            <div class=""  v-for="(value, index) in inbox" :key="index">
                <Link :href="route(value.route)" class="link">
                <el-menu-item  :index="`5-${index + 1}`">
                    {{ value.value }}
                </el-menu-item>
        
                </Link>
            </div>
        </el-sub-menu>
        <el-menu-item index="2">
        {{ ShareData.user.email }}
        </el-menu-item>
        <el-sub-menu index="3">
            <template #title>
                <div class="text-blue-400 font-bold">Parametre</div>
            </template>
            <div class="" v-for="(value, index) in admin" :key="index">
                <Link :href="route(value.route, value.api)">
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
import { computed, ref, reactive } from "@vue/reactivity";
import LogoVue from "../Logo/Logo.vue";


const page = usePage();
const ShareData = computed(() => {
    return page.props;
})
const reservation = ref([
    { value: "Billet d'avion", route: "dash.billet" },
    { value: "Hotel", route: "dash.hotel" },
    { value: "Client", route: "dash.client" },
    { value: "Autre action", route: "dash.other" },

])
const agence = ref([
    { value: "Liste", route: "agence.liste" },
    { value: "Ajouter", route: "agence.ajouter" },
    { value: "Démande", route: "agence.demande" },
    { value: "Plus", route: "agence.plus" },
]);
const donne = ref([
    { value: "Page", route: 'admin.page' },
    { value: "image", route: 'admin.image' },
])
const admin = ref([
    { value: "Sortie", route: "admin.sortie", api: ShareData },
    { value: "parametre", route: "parametre.admin", api: ""},
    { value: "Admin", route: "parametre.profil", api:"" },
]);
const param = ref([
    { value: "Collaboration", route: "" },
    { value: "Autre sponsor", route: "" },
    { value: "Notre supposort", route: "" },
]);
const inbox = ref([
    { value: "Message", route: "mail.mail" },
    { value: "Campagne", route: "mail.campagne" },
    { value: "Parametre", route: "mail.setting" },
    { value: "Ajouter", route: "mail.ajoute" },
    { value: "Compte", route: "mail.compte" },
])
const activeIndex = ref("1");
const handleSelect = (key: string, keyPath: string[]) => {
    console.log("hello");
};
</script>

<style>
.el-menu-demo {
    background: transparent;
}

.flex-grow {
    flex-grow: 1;
}

.flex-grow {
    flex-wrap: wrap;
}
</style>