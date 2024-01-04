<template>
    <div class="font-thin">
        <div class="text-[4px]">
        </div>
        <div class="text-center">
            <p class="">Filter ici votre vole</p>
        </div>
        <form @submit.prevent="cherche">
        <div class="margin shadow-lg rounded-md space-y-3">
            <form-input text="Pays Decollage">
                <select v-model="form.PaysA" name="" id="" class="input rounded-none font-thin text-sm text-right indent-4">
                    <option :value="value.country" v-for="value in Nation">
                        {{ value.country }}
                    </option>
                </select>
            </form-input>
            <form-input text="Aeroport Decollage" v-if="form.PaysA">
                <select v-model="form.PortA" name="" id="" class="input rounded-none font-thin text-sm text-right indent-4">
                    <option :value="value.country" v-for="value in Port.filter(item=>item.country===form.PaysA).sort((a,b)=>{
                        const TextA = a.name.toUpperCase();
                        const TextB = b.name.toUpperCase();
                        if(TextA<TextB)
                        {
                            return -1
                        }
                        if(TextA>TextB)
                        {
                            return 1
                        }
                        return 0
                    })">
                    {{ value.name }} à {{ value.city }}
                    </option>
                </select>
            </form-input>
            <form-input text="Pays Atterisage">
                <select v-model="form.PaysB" name="" id="" class="input rounded-none font-thin text-sm text-right indent-4">
                    <option :value="value.country" v-for="value in Nation">
                        {{ value.country }}
                    </option>
                </select>
            </form-input>
            <form-input text="Aeroport Atterisage" v-if="form.PaysB">
                <select v-model="form.PortB" name="" id="" class="input rounded-none font-thin text-sm text-right indent-4">
                    <option :value="value.country" v-for="value in Port.filter(item=>item.country===form.PaysB).sort((a,b)=>{
                        const TextA = a.name.toUpperCase();
                        const TextB = b.name.toUpperCase();
                        if(TextA<TextB)
                        {
                            return -1
                        }
                        if(TextA>TextB)
                        {
                            return 1
                        }
                        return 0
                    })">
                        {{ value.name }} à {{ value.city }}
                    </option>
                </select>
            </form-input>
        <div class="flex justify-end items-center text-[10px]">
            <button class="btn">Recherch <i class="fas fa-search"></i></button>
        </div>
        </div>
        </form>
    </div>
</template>
<script setup>
import { usePage, router } from '@inertiajs/vue3';
import { computed, reactive } from "vue";
import FormInput from '../component/forminput.vue';
import Port from "../Donne/airports.json"

const page = usePage();
const form = reactive({
    PaysA: null,
    PaysB: null,
    PortA: null,
    PortB: null
})
const vole = computed(() => {
    const AllVole = page.props.vole.filter((item) => {
        return item.vole !== null
    }).filter((value, index, self) => {
        return index === self.findIndex(i => i.depart === value.depart);
    });
    return AllVole;
})
const Nation = computed(()=>{
  return  Port.filter((value,index,self)=>{
        return index === self.findIndex(o=>o.country === value.country)
    }).sort((a,b)=>{
        const nameA = a.country.toUpperCase();
        const nameB = b.country.toUpperCase();
        if(nameA<nameB)
        {
            return -1;
        }
        if(nameA>nameB)
        {
            return 1
        }
        return 0
    })
})

const cherche = ()=>{
    emit('recherche',form)
}

</script>
