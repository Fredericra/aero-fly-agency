<template>
    <div>
        <div class="media text-[10px]">
            <div class="col-span-4">
                <div class="margin">
                    <div class="flex justify-center items-center">
                        <div class="flex flew-wrap space-x-3">
                            <button class=" h-8 btn bg-red-400">import Excel <i class="fas fa-file-excel"></i></button>
                            <button class=" h-8 btn bg-blue-600">import Json <i class="fab fa-jsfiddle"></i></button>
                        </div>
                    </div>
                    <div class="py-4 text-center">
                        <p class="font-bold text-indigo-500">OU</p>
                    </div>
                    <div class="py-4">
                        <div class="margin shadow-lg rounded-lg">
                            <form @submit.prevent="ajouter" class="space-y-3">
                                <div class="relative">
                                    <input type="text" class="input indent-4 rounded-none" v-model="form.nom"
                                        placeholder="nom compagnie">
                                    <i class="fas fa-user-alt absolute top-2/4 left-2"></i>
                                </div>
                                <div class="text-sm">
                                    <message-vue :message="donne.errors.nom"></message-vue>
                                </div>
                                <div class="relative">
                                    <input type="text" class="input indent-4 rounded-none" v-model="form.web"
                                        placeholder="web site">
                                    <i class="fas fa-link absolute top-2/4 left-2"></i>
                                </div>
                                <div class="text-sm">
                                    <message-vue :message="donne.errors.web"></message-vue>
                                </div>
                                <div class="relative">
                                    <select name="" v-model="form.pays" id="" class="input text-center rounded-none">
                                        <option value="" class="px-4">Pays du compagnie</option>
                                        <option :value="value.name" class="" v-for="(value, index) in Monde">{{ value.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="text-sm">
                                    <message-vue :message="donne.errors.pays"></message-vue>
                                </div>
                                <div class="">
                                    <input type="file" class="text-sm h-9" @input="form.image = $event.target.files[0]" />
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                </div>
                                <div class="text-sm">
                                    <message-vue :message="donne.errors.image"></message-vue>
                                </div>
                                <div class="flex justify-end items-center">
                                    <button class="btn bg-cyan-500">ajouter <i class="fas fa-plus"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-8 margin">
                <div class="text-center">
                </div>
                <div class="margin" v-if="donne.compagnie.length>0">
                        <listing-vue></listing-vue>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
export default {

}
</script>
<script lang="ts" setup>
import { reactive, computed } from "vue"
import { router, usePage } from "@inertiajs/vue3";
import Monde from "../Donne/Monde.json"
import MessageVue from "../component/Message.vue";
import ListingVue from "./Listing.vue"

const page = usePage()
const donne = computed(() => {
    return page.props;
})
const form = reactive({
    type: 1,
    nom: null,
    web: null,
    pays: null,
    image: null,
})
const ajouter = () => {
    const errors = page.props.errors;
    router.post(route('agence.liste'), form);
    if(errors.length>0)
    {
        console.log("errors")
    }
    else{
        form.nom = null;
        form.web = null;
        form.pays = null;
        form.image = "";
    }
   
}
</script>