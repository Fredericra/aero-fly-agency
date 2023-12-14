<template>
    <div class="text-sm">
        <div class="py-4">
            <div class="flex justify-end items-center">
                <div class="flex justify-center space-x-2">
                    <div class="">
                        <button class="btn">Sélection Tous</button>
                    </div>
                    <div class="">
                        <button class=" bg-orange-500 btn">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 border-b-2 border-white">
            <div class="col-span-1  bg-blue-400 py-2 font-bold text-white">
                <p class="text-center">Index </p>
            </div>
            <div class="col-span-1 bg-yellow-300">
                
            </div>
            <div class="col-span-4 bg-blue-700 py-2 font-bold text-white">
                <p class="text-center">Email </p>
            </div>
            <div class="col-span-5 bg-blue-400 py-2 font-bold text-white">
                <p class="text-center">Commentaire </p>
            </div>
            <div class="col-span-1 bg-purple-400 py-2 font-bold text-white">
                <p class="text-center"> </p>
            </div>
        </div>
        <div class=" overflow-hidden overflow-y-auto" style="height: calc(100vh / 2);" >
        <div class="grid grid-cols-12 border-b-2 border-white" v-for="(value,index) in donne.message" :key="index" >
            <div class="col-span-1  bg-stone-400 py-2 font-bold text-white">
               <div class="flex justify-around items-center">
                    <div class="">
                        <p class="px-3 py-1 bg-blue-500 rounded-full">
                            {{ donne.message.indexOf(value) + 1 }}
                        </p>
                    </div>
               </div>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <div class="">
                <input type="checkbox" class="check">
                </div>
            </div>
            <div class="col-span-4 bg-gray-600 py-2 font-bold text-white">
                <p class="text-left indent-4">
                {{ value.email }}
                 </p>
            </div>
            <div class="col-span-5 bg-slate-400 text-white text-[10px]">
                <p class="indent-8">
                   
                </p>
            </div>
            <div class="col-span-1">
                <div class="flex py-2 justify-center items-center">
                    <button class="btn">Reply</button>
                </div>
            </div>
            <div class="col-span-6 bg-white"></div>
            <div class="col-span-6  shadow-lg" v-if="value.message.length>0">
                <div class="bg-indigo-500 py-2" v-for="(text,cle) in value.message" :key="cle">
                    <div class="border-b-2 border-white">
                        <p class="indent-4 text-white">
                        {{ text.message }}
                        </p>
                    </div>
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