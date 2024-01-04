<template>
    <div>
        <div class="text-center py-4 margin">
            <p class="titre">Ajouter</p>
        </div>
        <form @submit.prevent="avion" class="space-y-4">
            <form-input text="Compagnie" :erreur="errors.compagnie_id">
                <select v-model="form.compagnie_id" name="" id="" class="input font-thin text-right rounded-none indent-4">
                    <option value="">CAMPAGNIE</option>
                    <option :value="`${value.id}`"
                        v-for="(value, index) in compagnie">
                        {{ value.nom }}</option>
                </select>
            </form-input>
            <form-input icon="fas fa-plane-departure" :erreur="errors.mark">
                <input type="text" v-model="form.mark" class="input font-thin text-center rounded-none indent-4" placeholder="numero d'avion">
            </form-input>
            <form-input text="nbr chaise" :erreur="errors.place">
                <input type="text" v-model="form.place" class="input font-thin text-center rounded-none indent-4" placeholder="nombre de chaise">
            </form-input>
            <form-input text="Chaise VIP" v-if="form.vip">
                <input type="text" v-model="form.vipPlace" class="input font-thin text-center rounded-none indent-4" placeholder="nombre de chaise">
            </form-input>
            <div class="">
                <label for="">
                    <input type="checkbox" v-model="form.vip" name="" id=""> <span class="">VIP MODE</span>
                </label>
            </div>
            <form-input  text="image">
                <input type="file" name="" class="text-right w-full outline outline-2 outline-gray-500" id="" @input="form.image = $event.target.files[0]">
            </form-input>
            <div class="">
            </div>
            <div class="flex justify-end items-center">
                <button class="btn bg-indigo-950">Ajouter <i class="fas fa-plus"></i></button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { reactive, ref, computed } from "vue"
import { router, usePage } from "@inertiajs/vue3";
import MessageVue from '../component/Message.vue'
import FormInput from "../component/FormInput.vue";

const page = usePage();

const form = reactive({
    compagnie: true,
    companie_id: null,
    mark: null,
    place: null,
    image: null,
    vip: null,
    vipPlace: null,
})
const errors = computed(()=>{
return page.props.errors
})
const compagnie = computed(()=>{
   return page.props.compagnie.sort(function(a,b){
    const NomA = a.nom.toUpperCase();
    const NomB = b.nom.toUpperCase();
    if(NomA < NomB)
    {
        return -1;
    }
    if(NomA > NomB)
    {
        return -1;
    }
    return 0;
   })
})
const donne = computed(() => {
    return page.props;
})
const avion = () => {
    router.post(route('agence.liste'), form);
    const errors = page.props.errors;
    if (errors.length > 0) {

    }
    else {
      
            form.companie_id =  null;
            form.mark= null ;
            form.place= null;
            form.image= null;
            form.vip= null;
            form.vipPlace= null;
        
    }
}
</script>