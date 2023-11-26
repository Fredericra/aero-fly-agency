<script setup>
import { ref } from "vue"
 import LogoVue from '../Logo/Logo.vue'
const menu = ref([
    {title:"Nos suponsort",sub:[
        {value:"AirMadagascar",route:"",icon:""},
        {value:"AirMauritius",route:"",icon:""},
        {value:"HotelTana",route:"",icon:""},
        {value:"AirFrance",route:"",icon:""},
    ]},
    {title:"Confidentiel",sub:[
        {value:"Mon compte",route:"",icon:""},
        {value:"Mon servie",route:"",icon:""},
        {value:"Sécurite",route:"",icon:""},
        {value:"",route:"",icon:""},
    ]},
    {title:"Contact Nous",sub:[
        {value:"agenceaerien@gmail.com",route:"",icon:"fas fa-envelope"},
        {value:"+261 33 *** ***",route:"",icon:"fas fa-phone"},
        {value:"Madagascar,Antananarivo",route:"",icon:"fas fa-location-dot"},
        {value:"+261 22 *** **",route:"",icon:"fab fa-whatsapp"},
    ]},
])
</script>
<template>
    <div class="mt-10">
        <div class="bg-indigo-200 py-8">
            <div class="media">
                <div class="col-span-8">
                    <div class="py-10">
                        <div class="media">
                            <div class="col-span-4" v-for="(value,index) in menu">
                                <div class="px-2 py-2">
                                    <div class="text-center">
                                        <p class="text-indigo-900 font-bold">
                                            {{ value.title }}
                                        </p>
                                    </div>
                                    <div class="px-4 py-4 text-sm">
                                        <div class="space-y-4">
                                            <div class="" v-for="(values,key) in value.sub" :key="key">
                                                <div class="grid grid-cols-12 items-center space-x-2 font-bold text-indigo-600 hover:text-white duration-1000">
                                                    <div class="col-span-10 hover:indent-8 duration-1000">
                                                        <Link>
                                                            {{ values.value }}
                                                        </Link>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <i :class="values.icon" ></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="relative w-24">
                        <logo-vue></logo-vue>
                    </div>
                    <div class="">
                        <p class="text-center text-[12px] py-4 text-white font-bold">s'inscrire sur notre newsletter </p>
                    </div>
                    <div class="px-20">
                        <form @submit.prevent class="space-y-4">
                            <div class="relative">
                                <input placeholder="votre pseudo" type="text" class="input indent-10">
                                <i class="fas fa-user-circle text-indigo-900 absolute top-2 left-2 fa-lg"></i>
                            </div>
                            <div class="relative">
                                <input placeholder="votre email" type="text" class="input indent-10">
                                <i class="fas fa-envelope text-indigo-900 absolute top-2 left-2 fa-lg"></i>
                            </div>
                            <div class="relative">
                                <textarea name="" placeholder="votre message" class="input h-20" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="">
                                <button class="btn">s'inscrire <i class="fas fa-envelope"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>