<script lang="ts" setup>
import { reactive, ref, computed } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import FormInput from "../component/FormInput.vue";
import MessageVue from "../component/Message.vue";

const page = usePage()
const donne = computed(() => {
    return page.props
})

const props = defineProps(['show'])
const form = reactive({
    email: null,
    password: null
});
const errors = computed(()=>{
    return page.props.errors;
})
const connexion = () => {
    router.post(route('page.connexion'), form)
}
const eye = ref(false)
</script>
<template >
    <div>
        <form @submit.prevent="connexion" class="space-y-4">
            <form-input icon="fas fa-envelope" :erreur="errors.email">
                <input type="text" class="input font-thin text-center rounded-md" placeholder="email"
                    v-model="form.email" />
            </form-input>
            <form-input icon="fas fa-lock" :password="true" :erreur="errors.password">
                <template v-slot="{pass}">
                    <input :type="pass?'text':'password'" v-model="form.password" class="input font-thin text-sm text-center" >
                </template>
            </form-input>
            <div class="space-y-4">

                <div class="px-5">
                    <label for="">
                        <input type="checkbox"> <span class="">souvient </span>
                        <Link class=" text-stone-800 font-bold">moi</Link>
                    </label>
                </div>
                <div class="px-4">
                    <button class="text-sm btn" type="submit">
                        connexion <i class="fas fa-user-plus"></i>
                    </button>
                </div>
            </div>
            <div class="flex justify-end items-center py-4">
          <p class="font-thin text-blue-400">je n'ai pas  compte, je m'<Link class="link" :href="route('page.inscrire')">inscrire</Link></p>
        </div>
        </form>
    </div>
</template>
