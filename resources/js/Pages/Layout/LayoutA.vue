<script lang="ts" setup>
import { usePage,Head } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import AdminHead from '../Head/AdminHead.vue';
import ClientHead from '../Head/ClientHead.vue';

const page = usePage();
const tous = computed(()=>{
    return page.props;
})
</script>
<template>
     <Head :title="`aoero--||--${tous.path}`"/>
    <div class="relative head">
        <div class="">
            <div class="" v-if="tous.admin">
                <admin-head></admin-head>
            </div>
            <div class="" v-else>
                <client-head></client-head>
            </div>
            <div>
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<style  scoped>
.head{
    position: relative;
    z-index: 1000;
    overflow: hidden;
}
</style>
