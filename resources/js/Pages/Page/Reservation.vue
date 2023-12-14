<template>
    <div>
        <div class="text-center">
            <p class="titre">Réservation du vole à <span class="font-bold">{{ airport }} </span></p>
        </div>
        <div class="py-4 media">
            <div class="col-span-4">
                <div class="text-center">
                    <p class="font-bold text-[18px] ">Listé de companie sur <span class="underline">{{ pays }} </span></p>
                </div>
                <div class="py-1  margin">
                    <div class="margin" v-for="i in 4" :key="i">
                        <p class="btn">AIR MADAGASCAR</p>
                    </div>
                </div>
                <div class="py-5 px-5">
                    <div class="text-center">
                        <p class="titre">Sérvice</p>
                    </div>
                </div>
                <div class="margin">
                    <p class="indent-12">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto vitae cupiditate sit adipisci neque
                        similique corrupti repellendus laudantium dolores placeat earum explicabo, eaque consectetur?
                        Similique numquam magnam vitae. Perferendis, atque.
                    </p>
                </div>
                <div class="margin">
                    <div class="margin">
                        <div class="text-center">
                            <p class="titre">Sponsor</p>
                        </div>
                        <div class="py-4 px-">
                            <p class="indent-12">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, harum aut labore id
                                error explicabo quos quisquam, veritatis vitae odit voluptatum tenetur soluta maiores,
                                molestias optio saepe reprehenderit tempora atque!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-4">
                <div class="mt-10 margin">
                    <p class="indent-12">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor laboriosam vitae voluptas dignissimos
                        temporibus quod ad eum deserunt itaque quas maxime nostrum fugiat voluptatem est molestiae esse
                        iusto, debitis aliquam.
                    </p>
                </div>

            </div>

            <div class="col-span-4">
                <div class="mt-20 margin">
                    <div class="text-center">
                        <p class="titre">Départ</p>
                    </div>
                    <div class="py-4 space-y-3">
                        <div class="shadow-lg py-4 px-4">
                            <div class="flex justify-between">
                                <div class="">
                                    <p class="font-bold">Air MADAGASCAR</p>
                                </div>
                                <div class="">
                                    <p class="font-bold">
                                        Boing 952
                                    </p>
                                </div>
                            </div>
                            <div class="">
                                <p class=" indent-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit
                                    molestias pariatur hic!</p>
                            </div>
                            <div class="">
                                <div class="flex justify-end py-4 items-center space-x-4 font-bold">
                                    <span class="underline">Départ</span>
                                    <span class="">{{ vole[0].city }} </span>
                                </div>
                                <div class="flex justify-start py-4 items-center space-x-4 font-bold">
                                    <span class="underline">Arrivé</span>
                                    <span class="">?? </span>
                                </div>
                                <div class=" items-center py-10">
                                    <div class="w-full" v-if="!donne.auth">
                                        <el-button class="primary" text @click="dialogFormVisible = true">
                                            Veuillez connecté-vous
                                        </el-button>

                                        <el-dialog v-model="dialogFormVisible" title="Entre votre compte" style="border-radius: 20px; filter:drop-shadow(10px 10px 0 rgba(0,0,0,0.5)">
                                            
                                            <div class="w-full px-32 space-y-2" v-if="conexion" >
                                                <form-connexion :errors="errors"></form-connexion>
                                            </div>
                                            <div class="px-32" v-else>
                                                <form-inscrire></form-inscrire>
                                            </div>
                                            <template #footer>
                                                <span class="dialog-footer">
                                                    <el-button @click="dialogFormVisible = false">Cancel</el-button>
                                                    <el-button type="primary" @click="dialogFormVisible = false">
                                                        Confirm
                                                    </el-button>
                                                </span>
                                            </template>
                                            <template #header>
                                                <span class="dialog-footer flex justify-start items-end duration-1000">
                                                    <el-button :type="!conexion?'success':''" class="" @click="conexion = false">Inscrire</el-button>
                                                    <el-button :type="conexion?'success':''" @click="conexion = true">
                                                        Connexion
                                                    </el-button>
                                                </span>
                                            </template>
                                        </el-dialog>
                                    </div>
                                    <div class="" v-else>
                                        <el-button class="primary" text @click="dialogFormVisible = true">
                                            Réservation billet
                                        </el-button>

                                        <el-dialog v-model="dialogFormVisible" title="Réservation du billet d'avion">
                                            <el-form :model="form">
                                                <el-form-item label="Email" :label-width="formLabelWidth">
                                                    <el-input v-model="form.name" :value="donne.user.email" autocomplete="off" />
                                                </el-form-item>
                                                <el-form-item label="Passport" :label-width="formLabelWidth">
                                                    <el-input v-model="form.name"  autocomplete="off" />
                                                </el-form-item>
                                                <el-form-item label="Choix du compagnie" :label-width="formLabelWidth">
                                                    <el-input v-model="form.name"  autocomplete="off" />
                                                </el-form-item>
                                                <el-form-item label="Nom" :label-width="formLabelWidth">
                                                    <el-input v-model="form.name"  autocomplete="off" />
                                                </el-form-item>
                                                <el-form-item label="Prenom" :label-width="formLabelWidth">
                                                    <el-input v-model="form.name"  autocomplete="off" />
                                                </el-form-item>
                                                <el-form-item label="Visa serie" :label-width="formLabelWidth">
                                                    <el-input v-model="form.name"  autocomplete="off" />
                                                </el-form-item>
                                                <el-form-item label="Compte bancaire" :label-width="formLabelWidth">
                                                    <el-input v-model="form.name"  autocomplete="off" />
                                                </el-form-item>
                                                <el-form-item label="Votre pays" :label-width="formLabelWidth">
                                                    <el-select v-model="form.region" placeholder="Please select a zone">
                                                        <el-option :label="`${value.name} dans ${value.region}`" :value="value.name" v-for="(value,index) in Monde" :key="index"/>
                                                    </el-select>
                                                </el-form-item>
                                            </el-form>
                                            <template #footer>
                                                <span class="dialog-footer">
                                                    <el-button @click="dialogFormVisible = false">Cancel</el-button>
                                                    <el-button type="primary" @click="dialogFormVisible = false">
                                                        Confirm
                                                    </el-button>
                                                </span>
                                            </template>
                                        </el-dialog>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { usePage } from "@inertiajs/vue3"
import { computed, ref, reactive } from "vue"
import Airport from "../Donne/airports.json"
import FormConnexion from "../Guest/FormConnexion.vue"
import FormInscrire from "../Guest/FormInscrire.vue"
import Monde from "../Donne/Monde.json"

const dialogTableVisible = ref(false)
const dialogFormVisible = ref(false)
const formLabelWidth = '140px'
const conexion = ref(true)
const form = reactive({
    name: '',
    password: '',
    region: '',
    delivery: false,
    type: [],
    resource: '',
    desc: '',
})


const page = usePage();
const donne = computed(() => {
    return page.props;
})
const props = defineProps(['pays', 'airport', 'errors'])
const vole = computed(() => {
    const value = page.props.airport
    return Airport.filter(item => item.name === value);
})
</script>
<script lang="ts">
import LayoutB from '../Layout/LayoutB.vue';
export default {
    layout: LayoutB
}
</script>