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
                            Bienvenue sur <span class="link">{{ liste[0].country }} éoroport de <span class="link">{{ liste[0].city }} de </span > {{ liste[0].name }}, Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti alias soluta porro fugit optio nulla harum molestias quisquam a, totam libero, suscipit possimus. Dicta blanditiis quas, asperiores et molestias alias. </span>
                        </p>
                    </div>
                    <div class="py-4 margin">
                        <div class="text-center">
                            <p class="titre">Sérvice</p>
                        </div>
                        <div class="py-2">
                            <p class="indent-12 text-sm">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet distinctio temporibus sequi, ducimus nemo at minima, laudantium eaque, iusto labore praesentium facere molestias. Voluptate reprehenderit asperiores consectetur eaque illum! Provident!
                            </p>
                        </div>
                    </div>
                    <div class="py-10 flex justify-center items-center">
                        <div class="space-x-4">
                            <Link class="btn" :href="route('page.reservation',{pays:liste[0].country,airport:liste[0].name })">
                                Réservation du billet
                            </Link>
                            <button class="bg-purple-400 btn">Probéme de réservation</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-4"></div>
            <div class="col-span-4">
                <div class="mt-20">
                    <div class="text-center py-5">
                        <p class="text-[18px] font-bold text-blue-800 "> 
                            Tous les volé
                        </p>
                    </div>
                    <div class="px-10 space-y-6 py-10">
                        <div class="shadow-lg" v-for="(value,index) in tous" :key="index">
                            <div class="px-4  font-bold py-4">
                                <p class="text-[16px]">{{ value.value }} </p>
                            </div>
                            <div class="h-[120px] overflow-hidden overflow-y-scroll "></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref } from "vue"

const tous = ref([
    {value:"ajourd'huid",route:''},
    {value:"Démain",route:''},
    {value:"Réservation",route:''},
    {value:"Urgence vole",route:''},
])
const props = defineProps(['liste',"menu"])
</script>