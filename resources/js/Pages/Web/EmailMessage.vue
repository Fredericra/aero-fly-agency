<template>
    <div>
        <div class="margin text-[5px]">
            <div class="text-sm text-center py-2 text-white" v-if="message.length>0">
                <p class="">{{ message }} </p>
            </div>
            <form @submit.prevent="ajouter" class="space-y-4 text-sm">
                <div class="relative">
                    <input type="text" v-model="form.pseudo" class="input indent-4 rounded-none" placeholder="pseudo">
                    <i class="fas fa-user-alt absolute top-1/4 text-gray-700 left-2"></i>
                </div>
                <div class="text-sm">
                    <message-vue :message="donne.errors.pseudo"></message-vue>
                </div>
                <div class="relative">
                    <input type="text" v-model="form.email" class="input indent-4  rounded-none" placeholder="email">
                    <i class="fas fa-envelope absolute top-1/4 text-gray-700 left-2"></i>
                </div>
                <div class="text-[5px]">
                    <message-vue :message="donne.errors.email"></message-vue>
                </div>
                <div class="relative">
                <textarea v-model="form.message" name="" id="" cols="30" rows="10" class=" rounded-none indent-4 h-[62px] input" placeholder="votre descritpion"></textarea>
                <i class="fas fa-pen-alt absolute top-1/4 text-gray-700 left-2"></i>
                </div>
                <div class="flex justify-end items-end">
                    <button class="btn">
                        envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script setup>
import { ref,computed,reactive } from "vue"
import { router,usePage } from "@inertiajs/vue3"
import MessageVue from "../component/Message.vue"


const form = reactive({
    pseudo:null,
    email:null,
    message:null
})
const page = usePage()
const message = ref("")
const donne = computed(()=>{
    return page.props;
});
const ajouter = ()=>{
    router.post(route('page.home'),form);
    if(donne.errors)
    {

    }
    else{
        if(form.email.length>0 && form.pseudo.length>0)
        {
            message.value = form.email + "merci de votre message"
            setTimeout(() => {
                message.value= ""
            }, 2000);
            form.pseudo=null
            form.email = null
            form.message = null

        }

    }
  
  
}
</script>
