<template>
    <div>
        <div class=" fixed bottom-6 duration-1000 -left-10 w-screen" >
            <div class="">
                <div class="media">
                    <div class="col-span-4">
                    </div>
                    <div class="col-span-4">
                        
                    </div>
                    <div class="col-span-4 flex justify-end items-end " >
                        <div class="w-3/4 space-y-3" >
                            <div class=" bg-indigo-500 shadow-lg rounded-lg shadow-indigo-200 duration-200" style="transform-origin: bottom left;" :class="message?' scale-y-125':'scale-y-0 h-0'">
                                <div class="margin">
                                    <div class="flex justify-end items-center">
                                        <button class="" @click="message = !message">
                                            <i class="fas fa-window-close text-indigo-900"></i>
                                        </button>
                                    </div>
                                    <div class="flex justify-center items-start py-4">
                                    <logo-vue></logo-vue>
                                    </div>
                                    <div class="t">
                                    <email-message></email-message>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end items-end" :class="value || donne.errors.lenght>0?'':'z-[0] hidden h-0'">
                                <button class="relative px-5 py-5 rounded-full btn" @click="message =!message">
                                    <i class="fas fa-envelope fa-2x text-white"></i>
                                    <i class="fas fa-envelope fa-2x absolute top-3 left-2 text-purple-500"></i>
                                    <i class="fas fa-envelope fa-2x absolute top-10 left-6 text-indigo-500"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref, reactive, computed,onMounted,onUnmounted } from "vue"
import { router, usePage } from "@inertiajs/vue3";
import EmailMessage from "./EmailMessage.vue";
import LogoVue from "../Logo/Logo.vue"

const page = usePage()
const props = defineProps(['value'])
const message = ref(false)
const donne = computed(() => {
    return page.props;
})
const scale = ref(0);

const email = () => {
    const errors = page.props.errors;
    const bodyHeigh = document.body.scrollHeight
    const router1 = router.post(route('page.home'), form);
    if (errors) {
        window.scrollTo({
            behavior: "smooth",
            top: bodyHeigh
        });
    }
    else {
        console.log("bien")
    }


}
function commence()
{
    if(message)
    {
        scale.value = 1
    }
    else{
        scale.value = 0
    }
}
onUnmounted(() => {
    commence();
})
onMounted(() => {
  commence();  
})
</script>