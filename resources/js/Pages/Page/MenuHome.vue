<script  setup>
import { ref,onMounted,onUnmounted } from "vue"
import LogoVue from '../Logo/Logo.vue';


const object = ref(false)
const value = (index)=>{
   if(index)
   {
    return object.value =! object.value;
   }
}
function affiche()
{
    
}
onMounted(() => {
  affiche() 
})
onUnmounted(() => {
    affiche()
})
</script>
<template>
    <div>
        <div class=" shadow-lg bg-white">
            <div class="flex justify-between items-center">
                <div class="px-4">
                    <logo-vue></logo-vue>
                </div>
                <div class="media px-4 space-x-4 " id="drowp">
                    <div class="col-span-6"></div>
                    <div class="relative"  v-for="i in 6" :key="i">
                        <div class="">
                            <button class=" " @click="value(i)">Agence</button>
                        </div>
                        <div class="absolute top-6 scale-y-0  shadow-lg w-[120px] duration-200 event" style="transform-origin: top;" :class="object?'scale-y-100':''">
                            <div class="relative z-[1000] shadow-lg px-4 bg-white rounded-md margin">
                                <ul class="li">
                                    <li class="">lorem</li>
                                    <li class="">lorem</li>
                                    <li class="">lorem</li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>- 
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style scoped>
    .affiche{
        display: none;
        height: 0;
    }
    .cache{
        
    }
</style>