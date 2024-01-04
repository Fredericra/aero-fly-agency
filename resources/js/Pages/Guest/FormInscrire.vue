<script lang="ts" setup>
import { router,usePage } from "@inertiajs/vue3"
import { reactive,computed,ref } from "vue";
import MessageVue from "../component/Message.vue";
import FormInput from "../component/FormInput.vue";

const eye = ref(false)
const eye1=ref(false)
const page = usePage()
const props = defineProps(['caise'])
const errors = computed(()=>{
    return page.props.errors;
})
const form = reactive({
    email:null,
    password:null,
    confirm:null,
    check:null
})
const inscrire = ()=>{
    router.post(route('page.inscrire'),form);
}
</script>
<template>
  <div>
    <form @submit.prevent="inscrire" class="space-y-3">
      <form-input icon="fas fa-envelope" :erreur="errors.email">
        <input type="text" class="input font-thin text-center text-sm rounded-md" v-model="form.email">
      </form-input>
      <form-input icon="fas fa-lock" :erreur="errors.password" :password="true">
        <template v-slot="{pass}">
          <input :type="pass?'text':'password'" v-model="form.password" class="font-thin input text-center text-sm rounded-md">
        </template>
      </form-input>
      <form-input icon="fas fa-lock" :erreur="errors.password" :password="true">
        <template v-slot="{pass}">
          <input :type="pass?'text':'password'" v-model="form.confirm" class="font-thin input text-center text-sm rounded-md">
        </template>
      </form-input>
      <div class="">
        <lable class="font-thin">
          <input type="checkbox"> j'accepter tous les <Link class="font-thin">contrat</Link>
        </lable>
      </div>
        <div class="px-4">
          <button class="btn">Inscrire <i class="fas fa-user-plus"></i></button>
        </div>
        <div class="flex justify-end items-center py-4">
          <p class="font-thin text-blue-400">j'ai une compte, je me <Link class="link" :href="route('page.connexion')">connecte</Link></p>
        </div>
    </form>
  </div>
</template>
