<template>
    <div>
        <form action="" class="space-y-4 margin" @submit.prevent="ajouter">
            <div class="relative text-sm">
                <input type="text" class="indent-4 rounded-none input" v-model="form.text" placeholder="nom de compagnie">
                <i class="fas fa-edit fa-sm absolute top-1/4 left-3"></i>
            </div>
            <div class="relative text-sm">
                <input type="text" class="indent-4 rounded-none input" v-model="form.text" placeholder="Slogan du pays">
                <i class="fas fa-edit fa-sm absolute top-1/4 left-3"></i>
            </div>
            <div class="relative text-sm">
                <input type="text" class="indent-4 rounded-none input" v-model="form.text" placeholder="Site web">
                <i class="fas fa-globe fa-sm absolute top-1/4 left-3"></i>
            </div>
            <div class="relative text-sm">
                <select name="" id="" class="rounded-none indent-0 input">
                    <option value="" v-for="(value, index) in Monde" :key="index">{{ value.name }} </option>
                </select>
            </div>
            <div class="text-sm">
                <message-vue :message="errors.text"></message-vue>
            </div>

            <div class="">
                <input type="file" class="text-sm h-9" @input="form.image = $event.target.files[0]" />
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                </progress>
            </div>
            <div class="text-sm">
                <message-vue :message="errors.image"></message-vue>
            </div>
            <div class="text-sm">
                <button class="btn">Ajouter</button>
            </div>
        </form>
    </div>
</template>
<script lang="ts" setup>
import { router,usePage } from "@inertiajs/vue3";
import { reactive } from "vue"
import MessageVue from "../component/Message.vue"
import Monde from "../Donne/Monde.json"

const props = defineProps(['errors','carouselle'])

const form = reactive({
    image:null,
    text:null,
    description:null,
    post:1
})
</script>