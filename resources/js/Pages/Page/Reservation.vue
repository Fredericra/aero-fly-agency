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
                                <div class="flex justify-end items-center py-10">
                                    <div class="" v-if="!donne.auth">
                                        <el-button class="primary" text @click="dialogFormVisible = true">
                                        Veuillez connecté-vous
                                    </el-button>

                                    <el-dialog v-model="dialogFormVisible" title="Entre votre compte">
                                        <el-form :model="form">
                                            <el-form-item label="Email" :label-width="formLabelWidth">
                                                <el-input v-model="form.name" autocomplete="off" />
                                            </el-form-item>
                                            <el-form-item label="password" :label-width="formLabelWidth">
                                                <el-input v-model="form.password" autocomplete="off" />
                                            </el-form-item>
                                            <el-form-item label="Votre pays" :label-width="formLabelWidth">
                                                <el-select v-model="form.region" placeholder="Please select a zone">
                                                    <el-option :label="`${value.country} dans ${value.city}`" :value="value.country" v-for="(value,index) in Airport" :key="index"/>
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
                                    <div class="" v-else>
                                    <el-button class="primary" text @click="dialogFormVisible = true">
                                        Réservation billet
                                    </el-button>

                                    <el-dialog v-model="dialogFormVisible" title="Shipping address">
                                        <el-form :model="form">
                                            <el-form-item label="Promotion name" :label-width="formLabelWidth">
                                                <el-input v-model="form.name" autocomplete="off" />
                                            </el-form-item>
                                            <el-form-item label="Zones" :label-width="formLabelWidth">
                                                <el-select v-model="form.region" placeholder="Please select a zone">
                                                    <el-option label="Zone No.1" value="shanghai" />
                                                    <el-option label="Zone No.2" value="beijing" />
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

const dialogTableVisible = ref(false)
const dialogFormVisible = ref(false)
const formLabelWidth = '140px'

const form = reactive({
    name: '',
    password:'',
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
const props = defineProps(['pays', 'airport'])
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