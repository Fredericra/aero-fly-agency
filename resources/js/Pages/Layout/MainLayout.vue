<script  setup>
    import { usePage } from '@inertiajs/vue3';
    import { computed } from "vue"
    import LayoutA from '../Layout/LayoutA.vue'
    import LayoutB from './LayoutB.vue';
    const page = usePage();
    const auth = computed(()=>{
        return page.component.auth
    })
    const center = auth?LayoutA:LayoutB;
</script>
<template>
<component :is="center"></component>   
</template>
