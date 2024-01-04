<template>
<div class="margin">
    <form @submit.prevent="ajouter">
        <div class="grid grid-cols-2 margin shadow-lg rounded-lg">
            <div class="col-span-1 space-y-3">
                <div class="text-center">
                    <p class="">Agence</p>
                </div>
                <div class="">
                    <el-select v-model="form.compagnie_id"  placeholder="COMPAGNIE">
                        <el-option v-for="item in donne.compagnie" :key="item.id" :label="item.nom" :value="item.id" />
                    </el-select>
                </div>
                <message-vue :message="donne.errors.compagnie_id"></message-vue>
                <div class="">
                    <el-select v-model="form.avion_id" value-key="id" placeholder="COMPAGNIE">
                        <el-option v-for="item in form.compagnie_id !== null ? donne.avion.filter((item) => item.campagnie_id === form.compagnie_id) : null" :key="item.id" :label="item.mark" :value="item.id" />
                    </el-select>
                </div>
                <message-vue :message="donne.errors.avion"></message-vue>
                <div class="">
                    <el-input v-model="form.billetVip" placeholder="PRIX BILLET" class="input-with-select">
                        <template #prepend>
                            VIP
                        </template>

                    </el-input>
                </div>
                <message-vue :message="donne.errors.billetVip"></message-vue>
                <div class="">
                    <el-input v-model="form.billetN" placeholder="PRIX BILLET" class="input-with-select">
                        <template #prepend>
                            CLIENT
                        </template>

                    </el-input>
                </div>
                <message-vue :message="donne.errors.billetN"></message-vue>

                <div>

                    <el-select v-model="form.Depart" value-key="id" placeholder="Départ du vole" class="input-with-select">
                        <template #prepend>
                            fdfdf
                        </template>
                        <el-option v-for="value in Port.sort(function (a, b) {
                                var name = a.name.toUpperCase();
                                var nameA = b.name.toUpperCase();
                                if (name < nameA) {
                                    return -1;
                                }
                                if (name > nameA) {
                                    return 1;
                                }
                                return 0;
                            })" :key="value.id" :label="` ${value.name} in ${value.country}`" :value="value.name" />
                    </el-select>
                    <message-vue :message="donne.errors.Depart"></message-vue>
                </div>
                <div class="">
                    <el-select v-model="form.arrive" value-key="id" placeholder="Arriver du vole">
                        <el-option v-for="value in Port.sort(function (a, b) {
                                var name = a.name.toUpperCase();
                                var nameA = b.name.toUpperCase();
                                if (name < nameA) {
                                    return -1;
                                }
                                if (name > nameA) {
                                    return 1;
                                }
                                return 0;
                            })" :key="value.id" :label="` ${value.name} in ${value.country}`" :value="value.name" />
                    </el-select>
                </div>
                <message-vue :message="donne.errors.arrive"></message-vue>
            </div>
            <div class="col-span-1 space-y-3">
                <div class="text-center">
                    <p class="class">Date</p>
                </div>

                <div class="flex justify-end items-center py-4">
                    <button class="btn px-4">Ajouter</button>
                </div>
            </div>
        </div>
    </form>
</div>
</template>

<script lang="ts" setup>
import Swal from 'sweetalert2'
import {router,usePage} from '@inertiajs/vue3'
import { ref,reactive,computed } from "vue"
import MessageVue from "../component/Message.vue"
import Port from '../Donne/airports.json'

const page = usePage();
const donne = computed(() => {
    return page.props
});

const form = reactive({
    billet: true,
    compagnie_id: null,
    avion_id: null,
    billetVip: null,
    billetN: null,
    Depart: null,
    arrive: null

})
const ajouter = () => {
    router.post(route('vole.ajouter'),form)
}
</script>
