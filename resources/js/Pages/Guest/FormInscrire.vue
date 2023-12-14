<script lang="ts" setup>
import { router,usePage } from "@inertiajs/vue3"
import { reactive,computed,ref } from "vue";
import MessageVue from "../component/Message.vue";
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
    <form @submit.prevent="inscrire">
      <div class="space-y-4">
        <div class="relative transition-all duration-1000">
          <input type="text" class="input" placeholder="email" v-model="form.email" />
          <i class="fas fa-envelope absolute left-4 top-1/2 fa-lg text-gray-400 icon"></i>
        </div>
        <message-vue :message="errors.email"></message-vue>
        <div class="relative">
          <input
            :type="eye ? 'text' : 'password'"
            class="input"
            placeholder="mots de pass"
            v-model="form.password"
          />
          <i class="fas fa-lock absolute left-4 top-1/2 fa-lg text-gray-400 icon"></i>
          <i
            :class="eye ? 'fa-eye' : 'fa-eye-slash'"
            class="fas duration-1000 fa-x absolute right-4 top-3 cursor-pointer text-gray-400 icon"
            @click="eye = !eye"
          ></i>
        </div>
        <message-vue :message="errors.password"></message-vue>
        <div class="relative">
          <input
            :type="eye1 ? 'text' : 'password'"
            class="input"
            placeholder="confirmation"
            v-model="form.confirm"
          />
          <i class="fas fa-keyboard absolute left-4 top-1/2 fa-lg text-gray-400 icon"></i>
          <i
            :class="eye1 ? 'fa-eye' : 'fa-eye-slash'"
            class="fas duration-1000 fa-x absolute right-4 top-3 cursor-pointer text-gray-400 icon"
            @click="eye1 = !eye1"
          ></i>
        </div>
        <message-vue :message="errors.confirm"></message-vue>
        <div class="px-5">
          <label for="">
            <input type="checkbox" v-model="form.check" />
            <span class="">j'accepte le</span>
            <Link>contrat</Link>
          </label>
        </div>
        <div class="px-4">
          <button class="btn">Inscrire <i class="fas fa-user-plus"></i></button>
        </div>
      </div>
    </form>
  </div>
</template>
