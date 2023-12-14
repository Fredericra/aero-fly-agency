<script setup>
import { ref,computed } from "vue";
import { usePage } from "@inertiajs/vue3"


const page = usePage();
const images = computed(()=>{
    return page.props.carouselle;
})
const servie = ref([
    {
        title: "Résevation en ligne",
        text:
            "Votre réservation billet, Hotél en ligne nous prends sérvice dans notre sponsor agence aérien et hôtelerie",
    },
    {
        title: "Vérification de billet",
        text:
            "Votre réservation billet, Hotél en ligne nous prends sérvice dans notre sponsor agence aérien et hôtelerie",
    },
    {
        title: "Inspéction",
        text:
            "Votre réservation billet, Hotél en ligne nous prends sérvice dans notre sponsor agence aérien et hôtelerie",
    },
    {
        title: "Validation de votre volé",
        text:
            "Votre réservation billet, Hotél en ligne nous prends sérvice dans notre sponsor agence aérien et hôtelerie",
    },
    {
        title: "Résevation en ligne",
        text:
            "Votre réservation billet, Hotél en ligne nous prends sérvice dans notre sponsor agence aérien et hôtelerie",
    },
]);
</script>
<template>
    <div class="py-8">
        <div class="text-center relative">
            <p class="text-[22px] font-bold bg-clip-text text-transparent bg-gradient-to-tr to-indigo-800 from-orange-200">
                Nos sérvie
            </p>
            <div class="">
                <div class="w-32 h-2 bg-indigo-600"></div>
            </div>
            <div class="rotate-[45deg] absolute top-0 left-0">
                <div class="w-32 h-2 bg-orange-600"></div>
                <div class="w-2 h-32 bg-blue-600"></div>
            </div>
        </div>
        <div class="media">
            <div class="col-span-5">
            <div class="flex justify-center items-center opacity-40" v-if="images.length>3">
                <img :src="images[2].image" alt="" class=" backdrop-brightness-75 rounded-full">
            
            </div>
            </div>
            <div class="col-span-7">
                <div class="py-4 px-5 space-y-6">
                    <div class="shadow-lg rounded-md hover:shadow-indigo-950 duration-1000" v-for="(value, index) in servie"
                        :key="index">
                        <div class="relative overflow-hidden duration-1000 card">
                            <div class="text-right font-bold px-5 py-4">
                                <p class="text-[18px] text-indigo-600">{{ value.title }}</p>
                            </div>
                            <div class="py-4 px-5">
                                <p class="indent-12 text-indigo-700 font-thin">
                                    {{ value.text }}
                                </p>
                            </div>
                            <div class="bg-gray-400 py-6 rounded-b-md">
                                <div class="text-right">
                                    <p class="text-white">
                                    </p>
                                </div>
                            </div>
                            <div class="bg-blue-400 value">
                                <div class="text-right font-bold px-5 py-4">
                                <p class="text-[18px] text-indigo-600">{{ value.title }}</p>
                            </div>
                            <div class="py-4 px-5">
                                <p class="indent-12 text-white font-bold">
                                    {{ value.text }}
                                </p>
                            </div>
                            <div class="bg-gray-400 py-6 rounded-b-md">
                                <div class="text-right">
                                    <p class="text-white">
                                    </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style scoped>
.card .value{
    position: absolute;
    bottom: 0;
    transform-origin: top;
    transition: 2s;
    height: 100%;
}
.card:hover .value{
   transform: translateY(400px);
}

</style>
