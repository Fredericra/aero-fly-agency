<template>
    <div>
        <div class="py-12 text-center justify-center items-center">
            <div class="">
                <p class="titre">Aéroport International</p>
            </div>
        </div>
        <div class="media">
            <div class="col-span-4">
                <div class="mt-10">
                    <div class="text-center">
                        <p class="titre">
                            {{ liste[0].name }}
                        </p>
                    </div>
                    <div class="margin">
                        <p class="indent-12 font-bold text-sm">
                            Bienvenue sur <span class="link">{{ liste[0].country }} éoroport de <span class="link">{{
                                liste[0].city }} de </span> {{ liste[0].name }}, Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Corrupti alias soluta porro fugit optio nulla harum molestias quisquam a,
                                totam libero, suscipit possimus. Dicta blanditiis quas, asperiores et molestias alias.
                            </span>
                        </p>
                    </div>
                    <div class="py-4 margin">
                        <div class="text-center">
                            <p class="titre">Sérvice</p>
                        </div>
                        <div class="py-2">
                            <p class="indent-12 text-sm">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet distinctio temporibus
                                sequi, ducimus nemo at minima, laudantium eaque, iusto labore praesentium facere molestias.
                                Voluptate reprehenderit asperiores consectetur eaque illum! Provident!
                            </p>
                        </div>
                    </div>
                    <div class="py-10 flex justify-center items-center">
                       
                    </div>
                </div>
            </div>
            <div class="col-span-8 margin">
                <div class="grid grid-cols-12">
                    <div class="col-span-1 bg-blue-500 "></div>
                    <div class="col-span-2 bg-blue-300 py-2 flex justify-center items-center text-white">
                        <p class=" font-thin">Départ</p>
                    </div>
                    <div class="col-span-2 bg-blue-400 py-2 flex justify-center items-center text-white">
                        <p class=" font-thin">Arrive</p>
                    </div>
                    <div class="col-span-2 bg-blue-300 py-2 flex justify-center items-center text-white">
                        <p class=" font-thin">Frais billet</p>
                    </div>
                    <div class="col-span-2 bg-indigo-500 py-2 flex justify-center items-center text-white">
                        <p class=" font-thin">Compagnie</p>
                    </div>
                    <div class="col-span-2 bg-blue-500 flex justify-center items-center py-2 text-white font-thin">
                        <p class="font-thin">Disponible</p>
                    </div>
                    <div class="col-span-1 bg-blue-600 py-2"></div>
                </div>
                <div class=" h-[425px] overflow-hidden overflow-y-auto y" v-if="vole.length > 0">
                    <div class="grid grid-cols-12 text-sm border-y-2 border-white" v-for="value in vole" :key="value.id">
                        <div class="col-span-1 bg-blue-500 flex justify-center items-center ">
                            <p class="font-bold">{{ vole.indexOf(value) + 1 }}</p>
                        </div>
                        <div class="col-span-2  bg-blue-300 py-2 flex justify-center items-center text-white">
                            <ul class="space-y-2">
                                <li class="space-x-2">
                                    <span class="">Pays</span>
                                    <span class="text-indigo-500 underline">{{
                                        AirPort.find(item => item.name === value.depart).country }}</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="">Airport</span>
                                    <span class="text-indigo-500 underline">{{ value.depart }}</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="">Date</span>
                                    <span class="text-indigo-500 underline">{{ value.vole.DateDepart }}</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="">Heure</span>
                                    <span class="text-indigo-500 underline">{{ value.vole.TimeDepart }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-2 bg-blue-400 py-2 flex justify-center items-center text-white">
                            <ul class="space-y-2 pl-2">
                                <li class="space-x-2">
                                    <span class="">Pays</span>
                                    <span class="text-indigo-500 underline">{{
                                        AirPort.find(item => item.name === value.arriver).country }}</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="">Airport</span>
                                    <span class="text-indigo-500 underline">{{ value.arriver }}</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="">Date</span>
                                    <span class="text-indigo-500 underline">{{ value.vole.DateArrive }}</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="">Heure</span>
                                    <span class="text-indigo-500 underline">{{ value.vole.TimeArrive }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-2 bg-blue-300 py-2 flex justify-center items-start text-white">
                            <ul class="li">
                                <li class="space-x-4 py-4">
                                    <span class="">VIP</span>
                                    <span class="text-indigo-800">{{ value.BVip }} $</span>
                                </li>
                                <li class="space-x-4 py-4 ">
                                    <span class="">Class</span>
                                    <span class="text-indigo-800">{{ value.BN }} $</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-2 bg-indigo-500 py-2 flex justify-center items-center text-white">
                            <ul class="space-y-2 pl-2">
                                <li class="space-x-2">
                                    <span class="">Pays</span>
                                    <span class=" underline">{{ value.compagnie.pays }}</span>
                                </li>
                                <li class="space-x-2">
                                    <a :href="value.compagnie.web" class="">
                                        <span class="text-blue underline">{{ value.compagnie.nom }}</span>
                                    </a>
                                </li>
                                <li class="space-x-2">
                                    <span class=" underline">{{ value.avion.mark }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-2 bg-blue-500 py-2"></div>
                        <div class="col-span-1 bg-blue-700 py-2 flex justify-center items-center">
                            <Link class="font-thin" :href="route('page.vole',value.id)">
                                <button class="btn text-[9px] hover:text-white">Voir plus</button>
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="" v-else>
                    <div class="h-[320px] text-center items-center text-white font-thin bg-gray-400">
                        <p class="">Aucun vole disponile sur {{ liste[0].name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { router, usePage } from '@inertiajs/vue3'
import { ref, computed } from "vue"
import AirPort from "../Donne/airports.json"

const props = defineProps(['liste', "menu"])
const page = usePage();

const vole = computed(() => {
    const Port = page.props.liste
    return page.props.vole.filter((item) => {
        return props.liste[0].name === item.depart && item.vole !== null;
    })
})

</script>