<script setup>
import { reactive,ref,computed } from "vue";
import { router } from "@inertiajs/vue3";
import MessageVue from "../component/Message.vue";

const props = defineProps(['errors'])
    const form = reactive({
        email:null,
        password:null
    });
    const connexion = ()=>{
        router.post(route('page.connexion'),form)
    }
    const eye = ref(false)
</script>
<template>
    <div class="h-screen">
        <div class="h-screen py-20">
            <div class="media">
                <div class="col-span-4"></div>
                <div class="col-span-4">
                    <div class="py-4 px-4">
                        <div class="px-4 py-4 shadow-lg">
                            <div class="text-center">
                                <p class="titre">Connexion</p>
                            </div>
                            <div class="py-2 px-4">
                                <hr />
                            </div>
                            <div class="py-2 px-4">
                                <form @submit.prevent="connexion">
                                    <div class="space-y-4">
                                        <div class="relative">
                                            <input type="text"
                                                class="input"
                                                placeholder="email"
                                                v-model="form.email" />
                                            <i
                                                class="fas fa-envelope absolute left-4 top-1/4 fa-lg  text-gray-400 icon"></i>
                                        </div>
                                        <message-vue :message="errors.email"></message-vue>
                                        <div class="relative">
                                            <input :type="eye?'text':'password'"
                                                class="input"
                                                placeholder="mots de pass"
                                                v-model="form.password" />
                                            <i
                                                class="fas fa-lock absolute left-4 top-1/4 fa-lg  text-gray-400 icon"></i>
                                                <i :class="eye?'fa-eye':'fa-eye-slash'" class="fas duration-1000 fa-x absolute right-4 top-3 cursor-pointer text-gray-400 icon" @click="eye=!eye"></i>

                                        </div>
                                        <message-vue :message="errors.password"></message-vue>
                                       
                                        <div class="px-5">
                                            <label for="">
                                                <input type="checkbox"> <span class="">souvient </span> <Link class=" text-stone-800 font-bold">moi</Link>
                                            </label>
                                        </div>
                                        <div class="px-4">
                                            <button class="btn">
                                                connexion <i class="fas fa-user-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4"></div>
            </div>
        </div>
    </div>
</template>
<script setup></script>
<script>
import LayoutB from "../Layout/LayoutB.vue";
export default {
    layout: LayoutB,
};
</script>
<style scoped></style>
