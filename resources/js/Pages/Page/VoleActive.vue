<template>
    <div class="relative">
        <div class="py-2 text-center">
            <p class="font-bold text-[22px] titre">{{ vole.compagnie.nom }} - {{ vole.avion.mark }} </p>
            <p class="">
                <a href="" class="link">
                    {{ vole.compagnie.web }}
                </a>
            </p>
        </div>
        <div class="media">
            <div class="col-span-4 margin">
                <div class="grid grid-cols-3">
                    <div class="col-span-1 py-4 bg-fuchsia-400">

                    </div>
                    <div class="col-span-2 py-4 bg-blue-600"></div>
                </div>
                <div class="grid grid-cols-3 border-y-2 border-white">
                    <div class="col-span-1 font-thin text-center text-white py-2 bg-fuchsia-400">
                        <p class="">Départ</p>
                    </div>
                    <div class="col-span-2 bg-blue-600 margin text-white">
                        <ul class="">
                            <li class="">
                                {{ AirPort.find(item => item.name === vole.depart).country }}
                            </li>
                            <li class="">
                                {{ vole.depart }}
                            </li>
                            <li class="">
                                {{ vole.vole.DateDepart }} - {{ vole.vole.TimeDepart }}
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="grid grid-cols-3 border-y-2 border-white">
                    <div class="col-span-1 font-thin text-center text-white py-2 bg-fuchsia-400">
                        <p class="">Arrive</p>
                    </div>
                    <div class="col-span-2 bg-blue-600 margin text-white">
                        <ul class="">
                            <li class="">
                                {{ AirPort.find(item => item.name === vole.arriver).country }}
                            </li>
                            <li class="">
                                {{ vole.arriver }}
                            </li>
                            <li class="">
                                {{ vole.vole.DateArrive }} - {{ vole.vole.TimeArrive }}
                            </li>


                        </ul>
                    </div>

                </div>
                <div class="grid grid-cols-4 border-y-2 border-white">
                    <div class="col-span-1 font-thin text-center text-white py-2 bg-fuchsia-400">
                        <p class="">Disponible</p>
                    </div>
                    <div class="col-span-3 bg-blue-600 text-white">
                        <div class="grid grid-cols-2 h-full">
                            <div class="col-span-3">
                                <div class="flex justify-center items-center">
                                    <div class="">
                                        <p class="text-white">{{ vole.avion.place }} Total </p>
                                        <p class="text-white">{{ vole.avion.place }} Disponible </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 text-center bg-gray-500" v-if="vole.nombre && vole.nombre.id">
                                <p class="">VIP</p>
                                <p class="text-white"> {{ vole.nombre.VIP }} </p>

                            </div>
                            <div class=" text-center bg-gray-800"
                                :class="vole.nombre && vole.nombre.id ? 'col-span-1' : 'col-span-2'">
                                <p class="">CLASS</p>
                                <p class="" v-if="vole.nombre && vole.nombre.id">
                                    {{ vole.avion.place - vole.nombre.VIP }}
                                </p>
                                <p class="" v-else>{{ vole.avion.place }}</p>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="grid grid-cols-4 border-y-2 border-white">
                    <div class="col-span-1 font-thin text-center text-white py-2 bg-fuchsia-400">
                        <p class="">Prix Billet</p>
                    </div>
                    <div class="col-span-3 bg-blue-600 text-white">
                        <div class="grid grid-cols-2 h-full">
                            <div class="col-span-1 text-center bg-gray-500" v-if="vole.nombre && vole.nombre.id">
                                <p class="">VIP</p>
                                <p class="text-white">{{ EchangeVip + " " + form.Money }} </p>
                                <form-input :text="`${EchangeVip} ${form.Money}`">
                                    <select v-model="form.Money" name="" id=""
                                        class="input rounded-none text-right indent-4 text-sm font-thin">
                                        <option :value="value.value" v-for="(value, index) in Money" :key="index">{{
                                            value.value }}</option>
                                    </select>
                                </form-input>
                            </div>
                            <div class="col-span-1 text-center bg-gray-800"
                                :class="vole.nombre && vole.nombre.id ? 'col-span-1' : 'col-span-2'">
                                <p class="">CLASS</p>
                                <p class="text-white">{{ EchangeClass + " " + form.Money1 }} </p>
                                <form-input :text="`${EchangeClass} ${form.Money1}`">
                                    <select v-model="form.Money1" name="" id=""
                                        class="input rounded-none text-right indent-4 text-sm font-thin">
                                        <option :value="value.value" v-for="(value, index) in Money" :key="index">{{
                                            value.value }}</option>
                                    </select>
                                </form-input>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="py-4 flex justify-end items-center">
                    <button class="rounded-md btn relative" @click="show = !show">Reservation</button>
                </div>
            </div>
            <div class="col-span-4">
            </div>
            <div class="col-span-4 margin space-y-4">

                <div class="flex justify-center items-center relative">
                    <img :src="vole.avion.image" alt="" class="w-full h-full rounded-md shadow-lg shadow-indigo-900">
                    <p class="absolute top-0 titre">{{ vole.compagnie.nom }} </p>
                </div>
                <div class="flex justify-center items-center relative">
                    <img :src="vole.avion.image" alt="" class="w-full h-full rounded-md shadow-lg shadow-indigo-900">
                    <p class="absolute top-0 titre">{{ vole.avion.mark }} </p>
                </div>
            </div>
        </div>
        <div class="absolute top-0 left-0 h-screen w-screen bg-white duration-500" :class="show?' scale-y-100':' scale-y-0'" style="transform-origin: top ;" >
            <div class="flex justify-end items-center px-4 py-4 text-indigo-950 link">
                <button class="fas fa-times fa-2x px-4" @click.prevent="show=false"></button>
            </div>
                <Tableux-reservation :data="vole"></Tableux-reservation>
        </div>
    </div>
</template>
<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, reactive, watch, ref } from "vue"
import AirPort from "../Donne/airports.json"
import FormInput from '../component/FormInput.vue';
import TableuxReservation from './TableuxReservation.vue';


const page = usePage();
const show = ref(false);
const vole = computed(() => {
    const Place = page.props.Place;
    const All = page.props.VoleActive.map((ObjetA) => {
        const value = Place.find((item) => {
            return item.avion_id === ObjetA.avion_id
        })
        const PortDepart = AirPort.find((item)=>{
            return item.name === ObjetA.depart;
        })
        const PortArriver = AirPort.find((item)=>{
            return item.name === ObjetA.arriver;
        })
        return { ...ObjetA, nombre: { ...value },PlaceDepart:{...PortDepart},PlaceArrive:{...PortArriver} }
    });

    return All[0];
})
const Echange = ref(0)
const form = reactive({
    Money: "Dollar",
    Money1: "Dollar"
})

const EchangeVip = computed(() => {
    const EchangeV = page.props.VoleActive;
    if (form.Money && form.Money !== "Dollar") {
        if (form.Money === "Euro") {
            return EchangeV[0].BVip * 4;
        }
        else if (form.Money === "Ariary") {
            return EchangeV[0].BVip * 5000
        }
    }

    else {

        return EchangeV[0].BVip
    }

})
const EchangeClass = computed(() => {
    const EchangeV = page.props.VoleActive;
    if (form.Money1 && form.Money1 !== "Dollar") {
        if (form.Money1 === "Euro") {
            return EchangeV[0].BN * 4;
        }
        else if (form.Money1 === "Ariary") {
            return EchangeV[0].BN * 5000
        }
    }

    else {

        return EchangeV[0].BN
    }

})
const Money = ref([
    { value: "Dollar", logo: "$" },
    { value: "Euro", logo: "Euro" },
    { value: "Ariary", logo: "Ar" },
])

</script>


<script>
import LayoutB from '../Layout/LayoutB.vue';
export default {
    layout: LayoutB
}
</script>
