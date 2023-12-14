<template>
    <div class="text-sm">
        <div class="grid grid-cols-12 border-b-2 border-white">
            <div class="col-span-1  bg-blue-400 py-2 font-bold text-white">
                <p class="text-center">Index </p>
            </div>
            <div class="col-span-2 bg-blue-600 py-2 font-bold text-white">
                <p class="text-center">Pseudo </p>
            </div>
            <div class="col-span-4 bg-blue-700 py-2 font-bold text-white">
                <p class="text-center">Email </p>
            </div>
            <div class="col-span-2 bg-blue-400 py-2 font-bold text-white">
                <p class="text-center">Statue de compte </p>
            </div>
            <div class="col-span-3 bg-purple-400 py-2 font-bold text-white">
                <p class="text-center"> </p>
            </div>
        </div>
        <div class=" overflow-hidden overflow-y-auto" style="height: calc(100vh / 2);" >
        <div class="grid grid-cols-12 border-b-2 border-white" v-for="(value,index) in combineUser" :key="index" >
            <div class="col-span-1  bg-stone-400 py-2 font-bold text-white">
               <div class="flex justify-around items-center">
                    <div class="">
                        <p class="px-3 py-1 bg-blue-500 rounded-full">
                            {{ combineUser.indexOf(value) + 1 }}
                        </p>
                    </div>
               </div>
            </div>
            <div class="col-span-2 bg-orange-600 py-2 font-bold text-white">
                <p class="text-center">
                {{ value.pseudo }}
                 </p>
            </div>
            <div class="col-span-4 bg-gray-600 py-2 font-bold text-white">
                <p class="text-left indent-4">
                {{ value.email }}
                 </p>
            </div>
            <div class="col-span-2 bg-blue-400 py-2 font-bold text-white">
                <p class="text-center">
                    <i class="px-2 py-1 fas fa-check rounded-full bg-green-800" v-if="value.compte"></i>
                    <i class="px-2 py-1 fas fa-window-close text-red-950 rounded-full bg-red-800" v-else></i>
                </p>
            </div>
            <div class="col-span-2 bg-purple-400 py-2 font-bold text-white">
                <div class="flex justify-around items-center" :class="value.email==='admin@gmail.com'?'hidden':''">
                    <div class="" v-if="!value.compte">
                        <button class="btn" @click.prevent="ajouter(value.email)">Ajouter compte</button>
                    </div>
                    <div class="" v-if="value.compte" > 
                        <button class="bg-red-600 btn" @click.prevent="annuler(value.email)">Rétire</button>
                    </div>
                    
                </div>
            </div>
            <div class="col-span-1 bg-stone-500">
                <div class="flex justify-center items-center py-4">
                        <input type="checkbox" v-model="check">
                </div>
            </div>
            <div class="col-span-6 font-bold bg-blue-400" v-if="!value.compte">
                <div class="bg-purple-400">
                    password
                </div>
                <p class="text-white text-center">
                {{ value.password }}
                </p>
            </div>

        </div>
        </div>
    </div>
</template>
<script setup>
import { usePage,router } from "@inertiajs/vue3"
import { all } from "axios";
import { computed,ref } from "vue"


const ajouter = (mail)=>{
    router.post(route('parametre.admin'),{
        value:mail,
        admin:1
    });
}

const annuler = (mail)=>{
    router.post(route('parametre.admin'),{
        value:mail,
        admin:0
    });
}
const page = usePage()
const donne = computed(()=>{
    
    return page.props
})

const combineUser = computed(()=>{
    const userMail = page.props.message;
    const allUser = page.props.tousCompte
   const combine = [];
    
   userMail.forEach(element => {
       if(allUser.find((item)=>element.email===item.email))
       {
        element = {...element,compte:true }
       }
       else{
        element = {...element,compte:false}
       }
       combine.push(element)
   });
   return combine;

})
</script>