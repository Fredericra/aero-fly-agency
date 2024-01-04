<template>
    <div class="text-[10px]">
        <div class="py-4">
            <div class="flex justify-end items-center">
                <div class="flex justify-center space-x-2">
                    <div class="">
                        <button class="btn">Sélection Tous</button>
                    </div>
                    <div class="">
                        <button class=" bg-orange-500 btn">Export <i class="fas fa-file-excel px-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 border-b-2 border-white">
            <div class="col-span-1  bg-blue-400 py-2 font-bold text-white">
                <p class="text-center">Index </p>
            </div>
            <div class="col-span-4 bg-blue-600 py-2 font-bold text-white">
                <p class="text-center">Nom de Compagnie </p>
            </div>
            <div class="col-span-4 bg-blue-700 py-2 font-bold text-white">
                <p class="text-center">Site web </p>
            </div>
            <div class="col-span-3 bg-blue-400 py-2 font-bold text-white">
                <p class="text-center">Logo </p>
            </div>
            <div class="col-span-3 bg-purple-400 py-2 font-bold text-white">
                <p class="text-center"> </p>
            </div>
        </div>
        <div class=" overflow-hidden overflow-y-auto y" style="height: calc(100vh / 2);" >
        <div class="grid grid-cols-12 border-b-2 border-white" v-for="(value,index) in donne.compagnie" :key="index" >
            <div class="col-span-1  bg-stone-400 py-2 font-bold text-white">
               <div class="flex justify-around items-center">
                    <div class="">
                        <p class="px-3 py-1 bg-blue-500 rounded-full">
                            {{ donne.compagnie.indexOf(value) + 1 }}
                        </p>
                    </div>
               </div>
            </div>
            <div class="col-span-4 bg-orange-600 py-2 font-bold text-white">
                <p class="text-center">
                {{ value.nom }}
                 </p>
            </div>
            <div class="col-span-4 bg-gray-600 py-2 font-bold text-white">
                <p class="text-left indent-4 underline cursor-pointer">
                {{ value.web }}
                 </p>
            </div>
            <div class="col-span-3 bg-blue-400 py-2 font-bold text-white">
                <a :href="value.image">
                    <img :src="value.image" alt="" class="h-[42px] object-contain rounded-full w-full">
                </a>
            </div>
            <div class="col-span-6"></div>
            <div class="col-span-6">
                <div class="text-center py-2 bg-blue-600 text-white">
                    <p class="flex justify-start px-4 space-x-4 font-bold items-center">
                        <span class="Pasys"> Pays : </span><span class="">{{ value.pays }} </span>
                    </p>
                </div>
            </div>
           
        </div>
        </div>
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/vue3"
import { computed } from "vue"

const page = usePage()
const donne = computed(()=>{
    return page.props
})
</script>