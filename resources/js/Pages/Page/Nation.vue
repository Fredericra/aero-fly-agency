<template>
    <div>
        <div class="media py-4">
            <div class="col-span-4 py-20 px-4">
                <div class="">
                    <p class="indent-12">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae, a! Magni, suscipit ullam! Consequatur a dolor quod laboriosam modi sequi laborum libero? Quidem repudiandae ullam, possimus repellendus sint id explicabo!
                    </p>
                </div>
            </div>
            <div class="col-span-4">
                <div class="text-center">
                    <p class="titre">
                        {{ liste[0].country }}
                    </p>
                </div>
            </div>
            <div class="col-span-4">
                <div class="py-4 text-center shadow-lg shadow-fuchsia-500 bg-fuchsia-500 rounded-t-md">
                    <p class="text-orange-950 font-bold text-[22px]">
                        Aiéroport sur {{ donne.agence }}
                    </p>
                </div>
                <div class="py-16 h-[420px] overflow-hidden overflow-y-scroll rounded-b-lg y">
                    <div class=" shadow-lg marging" :class="index%2===0?'bg-blue-500':'bg-indigo-600'"  v-for="(value,index) in liste" :key="index">
                        <div class="px-4 py-4 ">
                            <div class="text-left ">
                                <Link class="h-[32] overflow-hidden overflow-y-scroll link" :href="route('page.agence',value.name)">
                                    <p class="">
                                    {{ value.name }}
                                    </p>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { computed } from "vue"
import { usePage } from "@inertiajs/vue3";

const page = usePage()
const props = defineProps(['liste'])
const donne = computed(()=>{
    return page.props;
})
</script>