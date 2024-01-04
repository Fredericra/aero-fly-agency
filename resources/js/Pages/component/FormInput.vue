<template>
    <div >
        <div class="relative overflow-hidden rounded-sm h-[32px] font-thin">
            <div class="absolute h-full px-4 top-0 left-0 py-1 font-light text-white rounded-s-sm bg-gray-400" >
                    <p class="text-white relative text-center" v-if="icon">
                        <i :class="`${icon}`"></i>
                    </p>
                <p class="text-sm font-light relative text-white" v-else>{{ text }}</p>
            </div>
            <slot :pass="show"/>
            <div class="absolute h-full px-4 top-0 right-0 py-1 font-light text-white rounded-s-sm bg-gray-400" v-if="password" :class="bg">
                    <p class="text-white relative text-center">
                        <button @click.prevent="ShowAll" :class="show?'fa-eye':'fa-eye-slash'" class="fas text-sm "></button>
                    </p>
            </div>
        </div>
        <div class="text-sm  shadow-lg text-red-400 duration-400" v-if="erreur && erreur.length>0" :class="erreur && erreur.length>0?'h-8':'h-0'">
            <p class="text-[10px]">
                {{ erreur }}
            </p>
        </div>
    </div>
</template>
<script setup>
import { ref } from "vue"

const show  = ref(false);
const props = defineProps(['text', 'bg','erreur','icon','class','password'])
const ShowAll = ()=>{
    show.value =! show.value;
}
</script>

