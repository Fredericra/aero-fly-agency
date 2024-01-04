<template >
    <div class="margin shadow-lg">
        <div class="text-center py-4">
            <p class="text-[18px] font-bold">Ajouter Vole international ou Regional</p>
        </div>
        <form @submit.prevent="ajouter">
            <div class="media space-x-4">
                <div class="col-span-6">
                    <div class="space-y-4">
                        <form-input :text="`Compagnie`" :erreur="errors.compagnie">
                            <select v-model="form.compagnie" name="" id="" class="input rounded-none font-thin">
                                <option v-if="compagnie.length > 0" v-for="value in compagnie" :key="value.id"
                                    :value="value.id">
                                    {{ value.nom }}
                                </option>
                                <option value="" v-else>
                                    aucun donne
                                </option>
                            </select>
                        </form-input>
                        <form-input text="AVION" :erreur="errors.avion">
                            <select v-model="form.avion" class="input rounded-none font-thin">
                                <option v-for="(avion, index) in SelectPlane(form.compagnie)" :value="avion.id" :key="index">
                                    {{ avion.mark }}
                                </option>
                            </select>
                        </form-input>
                        <form-input text="Billet VIP" v-if="form.avion !== null" :erreur="errors.BVip">
                            <input v-model="form.BVip" type="text" class="input rounded-none font-thin text-center">
                        </form-input>
                        <form-input text="Billet Normal" :erreur="errors.BilletNormal">
                            <input type="text" v-model="form.BilletNormal" class="input rounded-none font-thin text-center">
                        </form-input>
                    </div>

                </div>
                <div class="col-span-6 space-y-4">
                    <form-input text="Pays Local"></form-input>
                    <form-input text="Pays arrive"></form-input>
                    <form-input text="Lieu de depart" :erreur="errors.depart">
                        <select name="" v-model="form.depart" id="" class="input rounded-none font-thin">
                            <option v-for="(Port, index) in SelectPort" :key="index" :value="Port.name">
                                {{ `${Port.name} à ${Port.country}` }}
                            </option>
                        </select>
                    </form-input>
                    <form-input text="Lieu de arriver" :erreur="errors.arriver">
                        <select name="" id="" v-model="form.arriver" class="input rounded-none font-thin">
                            <option v-for="(Port, index) in SelectPort" :key="index" :value="Port.name">
                                {{ `${Port.name} à ${Port.country}` }}
                            </option>
                        </select>
                    </form-input>
                </div>
            </div>
            <div class="py-2 flex justify-end items-center">
                <button class="btn">Valider</button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { router, usePage } from '@inertiajs/vue3'
import { computed, reactive, ref } from "vue"
import Airport from "../Donne/airports.json"
import FormInput from '../component/FormInput.vue';
import FormSelect from '../component/FormSelect.vue';
import Swal from 'sweetalert2';
import FormOption from '../component/FormOption.vue';

const errors = computed(() => {
    return page.props.errors;
})
const page = usePage();
const donne = computed(() => {
    return page.props;
})
const compagnie = computed(() => {
    return page.props.compagnie.sort(function (a, b) {
        const TextA = a.nom.toUpperCase();
        const TextB = b.nom.toUpperCase();
        if (TextA < TextB) {
            return -1;
        }
        if (TextA > TextB) {
            return 1
        }
        return 0;
    })
})

const SelectPort = computed(() => {
    const port = Airport.sort((a, b) => {
        const nameA = a.name.toUpperCase();
        const nameB = b.name.toUpperCase();
        if (nameA < nameB) {
            return -1;
        }
        if (nameA > nameB) {
            return 1;
        }
        return 0;
    })
    return port;
})

const SelectVip = () => {
    const vip = page.props.avion.filter((item) => {
        return item.id = form.avion;
    })
    return vip;

}

const SelectPlane = (id) => {

    const tous = page.props.avion.filter((item) => {
        return item.campagnie_id === id
    })
    return tous.sort(function (a, b) {
        const valueA = a.mark.toUpperCase();
        const valueB = b.mark.toUpperCase();

        if (valueA < valueB) {
            return -1
        }
        if (valueA > valueB) {
            return 1
        }
        return 0;
    })
}
const avion = computed(() => {
    return page.props.avion;
})
const form = reactive({
    vole: true,
    compagnie: null,
    avion: null,
    BVip: null,
    BilletNormal: null,
    depart: null,
    arriver: null

})
const ajouter = computed(() => {
    router.post(route('vole.ajouter'), form);
    const message = page.props.errors;
    if (message.message && form.compagnie!==null && form.avion!==null) {
        Swal.fire({
            title: "Vole ajouter avec success",
            toast: true,
            timer: 2000,
            position: "top-end",
            showConfirmButton: false,
            showCancelButton: false,
            timerProgressBar: true,
        }).then((request) => {
            return message.message = null
        })
        form.compagnie = null;
        form.avion = null;
        form.BVip = null;
        form.BilletNormal = null;
        form.depart = null;
        form.arriver = null;

    }
})
</script>