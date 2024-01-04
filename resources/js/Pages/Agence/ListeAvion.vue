<template>
    <div class="text-[10px]">
        <div class="flex justify-end items-center">
            <div class="space-x-4">
                <button class="btn px-4">import <i class="fab fa-mixcloud"></i></button>
                <button class="btn bg-orange-600 px-4">import <i class="fas fa-file-excel"></i></button>
                <button class="btn px-4 bg-teal-600">Export <i class="fas fa-file-excel"></i></button>
                <button class="btn px-4 bg-amber-500">Export <i class="fab fa-mixcloud"></i></button>
            </div>
        </div>
        <div class="media mt-10">
            <div class="col-span-1 bg-teal-500 py-2 flex justify-center items-center font-bold text-white">
                Index
            </div>
            <div class="col-span-2 bg-teal-600 py-2 flex justify-center items-center font-bold text-white">
                Model
            </div>
            <div class="col-span-4 bg-teal-500 py-2 flex justify-center items-center font-bold text-white">
                Compagnie
            </div>
            <div class="col-span-1 bg-teal-800 py-2 flex justify-center items-center font-bold text-white">
                VIP
            </div>
            <div class="col-span-1 bg-teal-600 py-2 flex justify-center items-center font-bold text-white">
                VIP L
            </div>
            <div class="col-span-1 bg-teal-500 py-2 flex justify-center items-center font-bold text-white">
                Normale
            </div>
            <div class="col-span-2 bg-teal-500 py-2 flex justify-center items-center font-bold text-white">
                
            </div>
        </div>
        <div class="overflow-hidden overflow-y-scroll h-[400px] y">
            <div class="media border-b-2 border-white" v-for="(value,index) in donne.avion" :key="index">
                <div class="col-span-1 bg-stone-500 py-2 flex justify-center items-center font-bold text-white">
                    {{ donne.avion.indexOf(value) }}
                </div>
                <div class="col-span-2 bg-stone-400 py-2 flex justify-start items-center font-bold text-white">
                    <div class="text-left px-2">
                    {{ value.mark }}
                    </div>
                </div>
                <div class="col-span-4 bg-teal-500 py-2 flex justify-start items-center font-bold text-white">
                    <ul>
                        <li class="indent-4">{{ value.compagnie.nom }} </li>
                        <li class="text-center text-indigo-800">{{ value.compagnie.pays }} </li>
                    </ul>
                </div>
                <div class="col-span-1 bg-teal-800 py-2 flex justify-center items-center font-bold text-white">
                    <i class="fas fa-check text-green-500" v-if="value.vip"> </i>
                    <i class="fas fa-times text-red-500" v-else></i>
                </div>
                <div class="col-span-1 bg-teal-600 py-2 flex justify-center items-center font-bold text-white">
                    <p class="" v-if="value.vip">
                        {{  value.vip.placeVIP  }}
                    </p>
                    <p class="" v-else>
                        0
                    </p>
                </div>
                <div class="col-span-1 bg-teal-500 py-2 flex justify-center items-center font-bold text-white">
                    <p class="" v-if="value.vip">
                        {{  value.vip.placeVIP - value.place < 0 ? Math.abs(value.vip.placeVIP - value.place) :value.vip.placeVIP - value.place  }}
                    </p>
                    <p class="" v-else>
                        {{ value.place }}
                    </p>
                </div>
                <div class="col-span-2 bg-teal-800 py-2 flex justify-center items-center font-bold text-white">
                    <div class="flex justify-center items-center flex-wrap space-x-1">
                        <button class="btn bg-blue-400 space-x-1">Ajouter</button><button class="btn bg-red-700 space-x-0">Efface</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { usePage, router } from '@inertiajs/vue3';
import { computed,ref } from "vue"
const parama = ref(true)
const page = usePage();
const donne = computed(() => {
    return page.props
})
</script>
