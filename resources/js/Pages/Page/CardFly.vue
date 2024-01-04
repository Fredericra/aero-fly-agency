<template>
    <div>
        <div class="flex justify-end items-start py-4">
            <div class="">
                <form-input icon="fas fa-search">
                    <input v-model="form.search" type="text" class="input text-center font-thin text-sm w-[255px] rounded-none">
                </form-input>
            </div>
        </div>
        <div class="grid grid-cols-12 text-white font-thin text-[12px]">
            <div class="col-span-1 py-2 bg-orange-500"></div>
            <div class="col-span-2 py-2 bg-orange-400 flex justify-center items-center text-center">
                <p class="">Compagnie</p>
            </div>
            <div class="col-span-6 py-2 bg-gray-400 flex justify-center items-center text-center">
                <p class="">Vole</p>
            </div>
          
            <div class="col-span-2 py-2 bg-orange-800 flex justify-center items-center text-center">
                <p class=""></p>
            </div>
            <div class="col-span-1 py-2 bg-orange-500"></div>
        </div>
        <div class=" overflow-hidden overflow-y-auto h-[600px] y" v-if="liste.length>0">
            <div class="grid grid-cols-12 text-white font-thin text-[12px] border-y-2 border-white" v-for="value in Flying" :key="value.id">
                <div class="col-span-1 py-2 bg-orange-800 flex justify-center items-center">
                    <p class="">
                        {{ Flying.indexOf(value) + 1 }}
                    </p>
                </div>
                <div class="col-span-2 py-2 bg-orange-700 flex justify-center items-center text-center">
                    <p class="">
                        {{ value.compagnie.nom }}
                    </p>
                   
                </div>
                <div class="col-span-6 py-2 bg-gray-800 flex justify-center items-center text-center">
                    <ul class="margin space-y-4">
                        <li class="flex justify-start items-center space-x-3">
                            <span class="">
                                {{ Port.find(item=>item.name===value.depart).country }}
                            </span>
                            <span class="fas fa-arrow-right"></span>
                            <span class="">
                                {{ Port.find(item=>item.name===value.arriver).country }}
                                
                            </span>
                        </li>
                        <li class=" items-center space-x-3">
                            <span class="">
                            {{ value.depart }}
                            </span>
                            <span class="fas fa-arrow-right"></span>
                            <span class="">
                            {{ value.arriver }}
                            </span>
                        </li>
                        <li class="flex justify-end items-end space-x-3">
                            <span class="">
                            {{ value.vole.DateDepart }}
                            </span>
                            <span class="fas fa-arrow-right"></span>
                            <span class="">
                                {{ value.vole.DateArrive }}
                            
                            </span>
                        </li>
                    </ul>
                </div>
               
                <div class="col-span-3 py-2 bg-orange-800 flex justify-center items-center text-center">
                    <p class="">
                        <Link class="btn" :href="route('page.vole',value.id)">Reservation</Link>
                    </p>
                </div>
            </div>
        </div>
        <div class=" h-[300px] bg-gray-500 flex justify-center items-center" v-else>
            <p class="font-thin text-white"> Aucun donne veuillez contact sur boite message en bas</p>
        </div>
    </div>
</template>
<script>
export default {

}
</script>
<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed,watch,reactive } from "vue"
import FormInput from '../component/FormInput.vue';
import Port from "../Donne/airports.json"

const form = reactive({
    search:null
})
const page = usePage();
const props = defineProps(['liste'])
const Flying = computed(()=>{
    if(form.search && form.search.length>0)
    {
        
        const All =  props.liste.filter((item)=>{
            const NameDecollage =item.decollage.name.toUpperCase();
            const CountryDecollage = item.decollage.country.toUpperCase();
            const NameAtterisage =item.atterisage.name.toUpperCase();
            const CountryAtterisage = item.atterisage.country.toUpperCase();
            const Compagnie = item.compagnie.nom.toUpperCase();
            const Search =RegExp(form.search.toUpperCase()) 
           return Search.test(NameDecollage) || Search.test(CountryDecollage) || Search.test(NameAtterisage) || Search.test(CountryAtterisage) || Search.test(Compagnie) || Search.test(item.vole.DateArrive) || Search.test(item.vole.DateDepart)
           
        })
        return All;
    }
    else{

        return props.liste;
    }
})
watch(()=>{
})


</script>