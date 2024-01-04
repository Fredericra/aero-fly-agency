<template>
    <div class="text-[10px]">
        <div class="flex justify-end items-center">
            <div class="space-x-4">
                <button class="btn px-4">import <i class="fab fa-mixcloud"></i></button>
                <button class="btn bg-orange-600 px-4">import <i class="fas fa-file-excel"></i></button>
                <button class="btn px-4 bg-teal-600">Export <i class="fas fa-file-excel"></i></button>
                <button class="btn px-4 bg-amber-500">Export <i class="fab fa-mixcloud"></i></button>
            </div>
        </div>
        <div class="media mt-10">
            <div class="col-span-1 bg-teal-500 py-2 flex justify-center items-center font-bold text-white">
                Index
            </div>
            <div class="col-span-1 bg-teal-600 py-2 flex justify-center items-center font-bold text-white">
                Compagnie
            </div>
            <div class="col-span-1 bg-teal-500 py-2 flex justify-center items-center font-bold text-white">
                Avion
            </div>
            <div class="col-span-2 bg-blue-500 py-2 flex justify-center items-center font-bold text-white">
                Type de vole
            </div>
            <div class="col-span-1 bg-teal-800 py-2 flex justify-center items-center font-bold text-white">
                Billet VIP
            </div>
            <div class="col-span-1 bg-teal-600 py-2 flex justify-center items-center font-bold text-white">
                Billet Normal
            </div>
            <div class="col-span-1 bg-stone-600 py-2 flex justify-center items-center font-bold text-white">
                Actuelle
            </div>
            <div class="col-span-1 bg-teal-500 py-2 flex justify-center items-center font-bold text-white">
                Départ
            </div>
            <div class="col-span-1 bg-indigo-500 py-2 flex justify-center items-center font-bold text-white">
                Arrive
            </div>
            <div class="col-span-1 bg-teal-600 py-2 flex justify-center items-center font-bold text-white">
                Activation
            </div>
            <div class="col-span-1 bg-teal-500 py-2 flex justify-center items-center font-bold text-white">

            </div>
        </div>
        <div class="overflow-hidden overflow-y-scroll h-[400px] y" v-if="AllFly.length > 0">
            <div class="media border-b-2 border-white" v-for="(value, index) in AllFly" :key="index">
                <div class="col-span-1 bg-stone-500 py-2 flex justify-center items-center font-bold text-white">
                    {{ AllFly.indexOf(value) + 1 }}
                </div>
                <div class="col-span-1 bg-stone-400 py-2 flex justify-start items-center font-bold text-white">
                    <div class="text-left px-2">
                        {{ value.compagnie.nom }}
                    </div>
                </div>
                <div class="col-span-1 bg-gray-400 py-2 flex justify-start items-center font-bold text-white">
                    <div class="text-left px-2">
                        {{ value.avion.mark }}
                    </div>
                </div>
                <div class="col-span-2 bg-teal-500 py-2 flex justify-start items-center font-bold text-white">

                    <ul>
                        <li class="">
                            <div class="text-center text-indigo-950">
                                <div class="text-center" v-if="Air(value.depart)['country'] === Air(value.arriver)['country']">
                                    <p class="">Vole Régional</p>
                                </div>
                                <div class="" v-else>
                                    <p class="">Vole National</p>
                                </div>
                            </div>
                        </li>
                        <li class="text-center text-indigo-800 indent-4">{{ value.compagnie.pays }} </li>
                        <li class="text-center text-indigo-800 indent-4">{{ value.compagnie.nom }} </li>
                    </ul>
                </div>
                <div class="col-span-1 bg-teal-800 py-2 flex justify-center items-center font-bold text-white">
                    <div class="text-left px-2">
                        {{ value.BVip }} $
                    </div>
                </div>
                <div class="col-span-1 bg-teal-400 py-2 flex justify-center items-center font-bold text-white">
                    <div class="text-left px-2">
                        {{ value.BN }} $
                    </div>
                </div>
                <div class="col-span-1 bg-teal-600 py-2 flex justify-center items-center font-bold text-white">
                    <p class="" v-if="value.vole === null">
                        <i class="fas fa-times text-red-400 fa-2x"></i>
                    </p>
                    <p class="" v-else>
                        <i class="fas fa-check text-green-400 fa-2x"></i>
                    </p>
                </div>
                <div class="col-span-1 h-full bg-teal-500 py-2 flex justify-center items-center font-bold text-white">
                    <ul>
                        <li class="indent-4">
                            <span class=""> {{ Air(value.depart)['country'] }}</span>
                        </li>
                        <li class="indent-4">
                            <span class="text-blue-900"> {{ Air(value.depart)['city'] }}</span>
                        </li>
                        <li class="indent-4 text-indigo-950">
                            <span class=""> {{ Air(value.depart)['name'] }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-span-1 bg-teal-600 py-2 flex justify-center items-center font-bold text-white">
                    <ul>
                        <li class="indent-4">
                            <span class=""> {{ Air(value.arriver)['country'] }}</span>
                        </li>
                        <li class="indent-4">
                            <span class="text-blue-900"> {{ Air(value.arriver)['city'] }}</span>
                        </li>
                        <li class="indent-4 text-indigo-950">
                            <span class=""> {{ Air(value.arriver)['name'] }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-span-1 relative bg-teal-800 py-2 flex justify-center items-center font-bold text-white">
                    <div class="flex justify-center items-center flex-wrap space-x-1">
                        <button class="btn bg-blue-400 space-x-1" @click="affiche(index)" v-if="value.vole === null">Active
                            le
                            vole</button>
                        <button class="btn bg-red-700 space-x-0" @click="affiche(index)" v-else>Voir le vole</button>
                    </div>
                    <div class="margin p-2 mt-2 mb-2 space-y-2 absolute top-0 z-[4000] bg-white shadow-lg -left-[350px] w-[320px]"
                        v-if="show1 && index === indexObjet && value.vole === null">
                        <div class="margin text-indigo-400">
                            <div class="flex justify-start items-center">
                                <button class="fas fa-times fa-2x" @click="annuler()"></button>
                            </div>
                            <div class="flex justify-end items-center py-2 text-indigo-950">
                                <div class="flex space-x-4">
                                    <span class="text-indigo-950">
                                        {{ Air(value.depart)['country'] }}
                                    </span>
                                    <span class="">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="">
                                        {{ Air(value.arriver)['country'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-end items-center py-2 text-indigo-950">
                                <div class="flex space-x-4">
                                    <span class="text-indigo-950">
                                        {{ Air(value.depart)['city'] }}
                                    </span>
                                    <span class="">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="">
                                        {{ Air(value.arriver)['city'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-end items-center py-2 text-indigo-950">
                                <div class="flex space-x-4">
                                    <span class="text-indigo-950">
                                        <span class="underline">Aéroport</span> {{ Air(value.depart)['name'] }}
                                    </span>
                                    <span class="">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="">
                                        <span class="underline">Aéroport</span> {{ Air(value.arriver)['name'] }}
                                    </span>
                                </div>
                            </div>
                            <form @submit.prevent="vole(value.id)" class="space-y-4">
                                <form-input text="date de depart" class="text-left" :erreur="errors.DateDepart">
                                    <input v-model="dateVole.DateDepart" type="date" class="input text-center rounded-none">
                                </form-input>
                                <form-input text="Heure de depart" :erreur="errors.TimeDepart">
                                    <input v-model="dateVole.TimeDepart" type="time" class="input text-center rounded-none">
                                </form-input>
                                <form-input text="date d'arriver" :erreur="errors.DateArrive">
                                    <input v-model="dateVole.DateArrive" type="date" class="input text-center rounded-none">
                                </form-input>
                                <form-input text="Heure d'arriver" :erreur="errors.TimeArrive">
                                    <input v-model="dateVole.TimeArrive" type="time" class="input text-center rounded-none">
                                </form-input>
                                <div class="flex justify-end items-start">
                                    <button class="btn bg-gray-600">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- vole active -->
                    <div class=" space-y-2 absolute top-0 z-[4000] bg-white shadow-lg -left-[350px] w-[320px]"
                        v-if="show1 && index === indexObjet && value.vole !== null">
                        <div class="margin">
                            <div class=" text-indigo-400">
                                <div class="flex justify-start items-center">
                                    <button class="fas fa-times fa-2x" @click="annuler()"></button>
                                </div>
                                <div class="text-center">
                                    <p class="underline">Trager du vole</p>
                                </div>
                                <div class="flex justify-end items-center py-2 text-indigo-950">
                                    <div class="flex space-x-4">
                                        <span class="text-indigo-950">
                                            {{ Air(value.depart)['country'] }}
                                        </span>
                                        <span class="">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="">
                                            {{ Air(value.arriver)['country'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex justify-end items-center py-2 text-indigo-950">
                                    <div class="flex space-x-4">
                                        <span class="text-indigo-950">
                                            {{ Air(value.depart)['city'] }}
                                        </span>
                                        <span class="">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="">
                                            {{ Air(value.arriver)['city'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex justify-end items-center py-2 text-indigo-950">
                                    <div class="flex space-x-4">
                                        <span class="text-indigo-950">
                                            <span class="underline">Aéroport</span> {{ Air(value.depart)['name'] }}
                                        </span>
                                        <span class="">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="">
                                            <span class="underline">Aéroport</span> {{ Air(value.arriver)['name'] }}
                                        </span>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        </div>
                        <div class="bg-gray-400 mt-2 margin">
                            <div class="text-center">
                                <p class="underline">Heure du vole</p>
                            </div>
                            <div class="flex justify-end items-center space-x-4">
                                <span class="text-indigo-800 underline">Depart</span>
                                <span class="text-indigo-800">
                                    {{ value.vole['DateDepart'] }} à {{ value.vole['TimeDepart'] }}
                                </span>
                            </div>
                            <div class="flex justify-end items-center space-x-4">
                                <span class="text-indigo-800 underline">Arrive</span>
                                <span class="text-indigo-800">
                                    {{ value.vole['DateArrive'] }} à {{ value.vole['TimeArrive'] }}
                                </span>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-span-1 bg-blue-400 flex justify-center items-center">
                    <button class="btn bg-red-400" @click="retire(value.id)">Retire</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { usePage, router } from '@inertiajs/vue3';
import { computed, ref, reactive } from "vue"
import Airport from "../Donne/airports.json"
import FormInput from "../component/forminput.vue"
import Swal from 'sweetalert2';

const parama = ref(true)
const page = usePage();
const show = ref(true)
const show1 = ref(false)
const donne = computed(() => {
    return page.props
})
const errors = computed(() => {
    return page.props.errors
})

const voleIn = ref(null);
const AllFly = computed(() => {
    return page.props.vole.filter((value, index, self) => {
        return index = self.findIndex((o) => {
            o.compagnie.nom === value.compagnie.nom && o.avion.mark === value.avion.mark && o.depart === value.depart && o.arriver === value.arriver
        })
    })
})
const dateVole = reactive({
    ajouterVole: true,
    DateDepart: null,
    TimeDepart: null,
    DateArrive: null,
    TimeArrive: null,
    confirmed: true,
})
const vole = (id) => {

    router.post(route('vole.ajouter'), { ...dateVole, vole_id: id });

}
const indexObjet = ref(null)
const affiche = (id) => {
    show1.value = true
    indexObjet.value = id;
}
const annuler = () => {
    show1.value = false;
    indexObjet.value = null
}
const Air = (value) => {
    return Airport.find(item => {
        return item.name === value;
    })
}
const retire = (key) => {

    router.post(route('vole.ajouter'), {
        retire: true,
        id: key
    });
    Swal.fire({
        title: 'Supprime avec success',
        toast: true,
        timer: 2000,
        timerProgressBar: true,
        position: "top-end",
        showCancelButton: false,
        showConfirmButton: false,
        icon: "success"
    })
}
</script>
