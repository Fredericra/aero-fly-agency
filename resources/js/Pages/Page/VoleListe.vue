<template >
    <div class="h-screen">
        <div class="media px-10 py-10">
            <div class="col-span-4">
                <div class="margin">
                    <div class="font-thin">
                        <div class="text-[4px]">
                        </div>
                        <div class="text-center">
                            <p class="">Filter ici votre vole</p>
                        </div>
                        <form @submit.prevent="cherche">
                            <div class="margin shadow-lg rounded-md space-y-3">
                                <form-input text="Pays Decollage">
                                    <select v-model="form.PaysA" name="" id=""
                                        class="input rounded-none font-thin text-sm text-right indent-4">
                                        <option :value="value.country" v-for="value in Nation">
                                            {{ value.country }}
                                        </option>
                                    </select>
                                </form-input>
                                <form-input text="Aeroport Decollage" v-if="form.PaysA">
                                    <select v-model="form.PortA" name="" id=""
                                        class="input rounded-none font-thin text-sm text-right indent-4">
                                        <option :value="value.name" v-for="value in Port.filter(item => item.country === form.PaysA).sort((a, b) => {
                                            const TextA = a.name.toUpperCase();
                                            const TextB = b.name.toUpperCase();
                                            if (TextA < TextB) {
                                                return -1
                                            }
                                            if (TextA > TextB) {
                                                return 1
                                            }
                                            return 0
                                        })">
                                            {{ value.name }} à {{ value.city }}
                                        </option>
                                    </select>
                                </form-input>
                                <form-input text="Pays Atterisage">
                                    <select v-model="form.PaysB" name="" id=""
                                        class="input rounded-none font-thin text-sm text-right indent-4">
                                        <option :value="value.country" v-for="value in Nation">
                                            {{ value.country }}
                                        </option>
                                    </select>
                                </form-input>
                                <form-input text="Aeroport Atterisage" v-if="form.PaysB">
                                    <select v-model="form.PortB" name="" id=""
                                        class="input rounded-none font-thin text-sm text-right indent-4">
                                        <option :value="value.name" v-for="value in Port.filter(item => item.country === form.PaysB).sort((a, b) => {
                                            const TextA = a.name.toUpperCase();
                                            const TextB = b.name.toUpperCase();
                                            if (TextA < TextB) {
                                                return -1
                                            }
                                            if (TextA > TextB) {
                                                return 1
                                            }
                                            return 0
                                        })">
                                            {{ value.name }} à {{ value.city }}
                                        </option>
                                    </select>
                                </form-input>
                                <div class="flex justify-end items-center py-2">
                                    <label for="" class="font-thin ">
                                        <input type="checkbox" v-model="form.check"> <span class="">voir tous</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-span-8">
                <div class="margin">
                    <card-fly :liste="vole"></card-fly>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import LayoutB from "../Layout/LayoutB.vue"
export default {
    layout: LayoutB
}
</script>

<script setup>
import { usePage, router } from "@inertiajs/vue3";
import { computed, reactive, ref, watch } from "vue"
import CardFly from "./CardFly.vue";
import FormFly from "./FormFly.vue"
import Port from "../Donne/airports.json"
import FormInput from '../component/forminput.vue';



const page = usePage();
const form = reactive({
    PaysA: null,
    PaysB: null,
    PortA: null,
    PortB: null,
    check: false
})
const voling = computed(() => {
    const AllVole = page.props.vole.filter((item) => {
        return item.vole !== null
    }).filter((value, index, self) => {
        return index === self.findIndex(i => i.depart === value.depart);
    });
    return AllVole;
})
const Nation = computed(() => {
    return Port.filter((value, index, self) => {
        return index === self.findIndex(o => o.country === value.country)
    }).sort((a, b) => {
        const nameA = a.country.toUpperCase();
        const nameB = b.country.toUpperCase();
        if (nameA < nameB) {
            return -1;
        }
        if (nameA > nameB) {
            return 1
        }
        return 0
    })
})
const vole = computed(() => {
    const Flying = page.props.vole.filter((item) => {
        return item.vole !== null
    }).map((ObjetA) => {
        const Depart = Port.find((ObjetB) => {
            return ObjetB.name === ObjetA.depart;
        })
        const arriver = Port.find((ObjetB) => {
            return ObjetB.name === ObjetA.arriver
        })
        return { ...ObjetA, decollage: { ...Depart }, atterisage: { ...arriver } }
    })
    //decollage
    if (form.PaysA && form.PaysA.length > 0 && !form.PortA && !form.check) {
        return Flying.filter((item) => {
            return item.decollage.country === form.PaysA
        })
    }
    else if (form.PaysA && form.PortA && form.PaysA.length > 0 && form.PortA.length > 0 && !form.check && !form.PaysB && !form.PortB) {
        return Flying.filter((item) => {
            return item.decollage.country === form.PaysA && item.decollage.name === form.PortA;
        })
    }
    //landing
    else if (form.PaysB && form.PaysB.length > 0 && !form.PortB && !form.check && !form.PaysA && !form.PortA ) {
        return Flying.filter((item) => {
            return item.atterisage.country === form.PaysB
        })
    }
    else if (form.PaysB && form.PortB && form.PaysB.length > 0 && form.PortB.length > 0 && !form.check && !form.PaysA && !form.PortA) {
        return Flying.filter((item) => {
            return item.atterisage.country === form.PaysB && item.atterisage.name === form.PortB;
        })
    }
    else if( form.PaysA && form.PaysB && form.PortA && !form.PortB && form.PaysA.length>0 && form.PaysB.length>0 && form.PortA.length>0 &&  !form.check)
    {
        return Flying.filter((item)=>{
            return item.decollage.country === form.PaysA && item.decollage.name === form.PortA && item.atterisage.country === form.PaysB 
        })
    }
    else if( form.PaysA && form.PaysB && form.PortA && form.PortB && form.PaysA.length>0 && form.PaysB.length>0 && form.PortA.length>0 && form.PortB.length>0 && !form.check)
    {
        return Flying.filter((item)=>{
            return item.decollage.country === form.PaysA && item.decollage.name === form.PortA && item.atterisage.country === form.PaysB && item.atterisage.name === form.PortB;
        })
    }

    else if (form.check) {
        form.PaysA=null;
        form.PortA =null;
        form.PaysB=null;
        form.PortB=null;
        return Flying
    }
    else {
        return Flying

    }
});

</script>