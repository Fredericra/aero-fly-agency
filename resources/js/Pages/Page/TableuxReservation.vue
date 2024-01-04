<template>
    <div>
        <div class="" v-if="Auth">
            <div class="media">
                <div class="col-span-4 margin">
                    <div class="grid grid-cols-3">
                        <div class="col-span-1 flex justify-center items-center bg-blue-500 text-white py-2">
                            <p class="">Compagnie</p>
                        </div>
                        <div class="col-span-2">
                            <div class=" grid-flow-row grid-cols-2 text-center">
                                <div class="col-span-1 bg-blue-500 text-white margin">
                                    <p class="">{{ data.compagnie.nom }}</p>
                                </div>
                                <div class="col-span-1 bg-blue-800 margin">
                                    <Link href="" class="link text-white underline">
                                    {{ data.compagnie.nom }}
                                    </Link>
                                </div>
                            </div>

                        </div>
                        <div class="col-span-1 flex justify-center items-center bg-indigo-800 text-white py-2">
                            <p class="">Départ</p>
                        </div>
                        <div class="col-span-2">
                            <div class=" grid-flow-row grid-cols-2 text-left">
                                <div class="col-span-1 bg-blue-700 text-white px-4 py-2">
                                    <p class="space-x-4">
                                        <span class="underline">Code</span>
                                        <span class="">
                                            {{ data.PlaceDepart.iata_code }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-span-1 bg-blue-500 text-white px-4 py-2">
                                    <p class="space-x-4">
                                        <span class="underline">Pays</span>
                                        <span class="">
                                            {{ data.PlaceDepart.country }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-span-1 bg-blue-600 text-white px-4 py-2">
                                    <p class="space-x-4">
                                        <span class="underline">Ville</span>
                                        <span class="">
                                            {{ data.PlaceDepart.city }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-span-1 bg-blue-700 text-white px-4 py-2">
                                    <p class="space-x-4">
                                        <span class="underline">Aéroport</span>
                                        <span class="">
                                            {{ data.PlaceDepart.name }}
                                        </span>
                                    </p>
                                </div>

                            </div>

                        </div>

                        <div class="col-span-1 flex justify-center items-center bg-indigo-600 text-white py-2">
                            <p class="">Arrive</p>
                        </div>
                        <div class="col-span-2">
                            <div class=" grid-flow-row grid-cols-2 text-left">
                                <div class="col-span-1 bg-blue-700 text-white px-4 py-2">
                                    <p class="space-x-4">
                                        <span class="underline">Code</span>
                                        <span class="">
                                            {{ data.PlaceArrive.iata_code }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-span-1 bg-blue-500 text-white px-4 py-2">
                                    <p class="space-x-4">
                                        <span class="underline">Pays</span>
                                        <span class="">
                                            {{ data.PlaceArrive.country }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-span-1 bg-blue-600 text-white px-4 py-2">
                                    <p class="space-x-4">
                                        <span class="underline">Ville</span>
                                        <span class="">
                                            {{ data.PlaceArrive.city }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-span-1 bg-blue-700 text-white px-4 py-2">
                                    <p class="space-x-4">
                                        <span class="underline">Aéroport</span>
                                        <span class="">
                                            {{ data.PlaceArrive.name }}
                                        </span>
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-span-8 margin">
                    <div class="font-thin text-[22px] text-center" v-if="data.nombre && data.nombre.id">
                        <p class="">Vole superieur</p>
                    </div>
                    <div class="font-thin text-[22px] text-center" v-else>
                        <p class="">Class Normal</p>
                    </div>
                    <div class="margin shadow-lg">
                        <div class="margin">
                            <div class="text-right underline underline-offset-8">
                                <p class="font-thin">Card de payment</p>
                            </div>
                            <form @submit.prevent="acceder(data.id)" class="margin">
                                <div class="flex justify-end item-center py-2" v-if="data.nombre && data.nombre.id && data.nombre.placeVIP!==0">
                                    <label for="">
                                        <input type="checkbox" name="" id="" v-model="form.modeVip"> Place vip
                                    </label>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="col-span-1 margin">
                                        <div class="space-y-2">
                                            <form-input text="Pays" :erreur="errors.pays">
                                                <select name="" id=""
                                                    class="input rounded-none font-thin text-right indent-4" v-model="form.pays">
                                                    <option :value="value.country" v-for="(value, index) in Pays"
                                                        :key="index">{{ value.country }} </option>
                                                </select>
                                            </form-input>
                                            <form-input text="Nationalite">
                                                <input type="text" 
                                                    class="input rounded-none font-thin text-center" v-model="form.nationalite">
                                            </form-input>
                                            <form-input text="Passwport" :erreur="errors.passport">
                                                <input type="text" 
                                                    class="input rounded-none font-thin text-center" v-model="form.passport">
                                            </form-input>
                                        </div>
                                    </div>
                                    <div class="col-span-1 margin space-y-2">
                                        <form-input text="Payment" :erreur="errors.payment">
                                            <select name="" id="" class="input rounded-none text-center font-thin" v-model="form.payment">
                                                <option :value="value.value" v-for="(value, index) in Payment" :key="index"
                                                    class="">
                                                    {{ value.value }}
                                                </option>
                                            </select>
                                        </form-input>
                                        <form-input text="Numero compte" :erreur="errors.compte">
                                            <input type="text" 
                                                class="input rounded-none font-thin text-center" v-model="form.compte">
                                        </form-input>
                                    </div>
                                </div>
                                <div class="margin flex justify-start items-center">
                                    <button class="btn bg-gray-400 text-[12px] font-thin">Accepter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" v-else>

            <div class="flex justify-start items-center margin">
                <div class="space-x-4 text-[12px]">
                    <button class="btn" @click.prevent="show = false"
                        :class="show ? 'bg-green-400 shadow-none' : 'bg-bg-fuchsia-500'">Connexion</button>
                    <button class="btn" @click.prevent="show = true"
                        :class="!show ? 'bg-green-400 shadow-none' : 'bg-bg-fuchsia-500'">Inscrire</button>
                </div>
            </div>
            <div class="margin text-center">
                <p class="text-[22px] font-thin">Veuillez vous connectéz d'abord, s'ils vous plait</p>
            </div>
            <div class="media margin">
                <div class="col-span-4"></div>
                <div class="col-span-4 margin">
                    <div class="" v-if="show">
                        <div class="text-center margin">
                            <p class="text-[22px] font-thin">Inscrire</p>
                        </div>
                        <form-inscrire></form-inscrire>
                    </div>
                    <div class="" v-else>
                        <div class="text-center margin">
                            <p class="text-[22px] font-thin">Connexion</p>
                        </div>
                        <form-connexion></form-connexion>
                    </div>
                </div>
                <div class="col-span-4"></div>
            </div>
        </div>

    </div>
</template>
<script setup>
import { usePage, router } from "@inertiajs/vue3";
import { computed, ref, reactive } from "vue"
import Country from "../Donne/airports.json"
import FormInscrire from "../Guest/FormInscrire.vue"
import FormConnexion from "../Guest/FormConnexion.vue"
import FormInput from "../component/FormInput.vue";

const show = ref(false)
const page = usePage();
const props = defineProps(['data'])

const errors = computed(()=>{
    return page.props.errors
})
const form = reactive({
    billet:true,
    data:props.data,
    pays: null,
    modeVip:null,
    nombre:props.data.avion.place,
    vip:props.data.nombre,
    id:page.props.user?page.props.user.id:null,
    nationalite: null,
    passport: null,
    payment: null,
    compte: null
})
const acceder = (id)=>{
    router.post(route('page.vole',id),form);
}
const Payment = ref([
    { value: "PayPal" },
    { value: "MasterCard" },
    { value: "ORANGE MONEY AFRIQUE" }
])
const Pays = computed(() => {
    const All = Country.filter((item, index, self) => {
        return index === self.findIndex((value) => {
            return value.country === item.country
        })
    })
    return All.sort((a, b) => {
        const nameA = a.country.toUpperCase();
        const nameB = b.country.toUpperCase();
        if (nameA < nameB) {
            return -1;
        }
        if (nameA > nameB) {
            return 1
        }
        return 0;
    })
})
const Auth = computed(() => {
    return page.props.auth;
})
</script>