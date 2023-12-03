<template>
  <Head :title="`aoero--||--${path}`"/>
  <div class="relative slot">
    <div class=" sticky top-0 bg-transparent">
        <head-web></head-web>
    </div>
    <div class="">
        <slot></slot>
    </div>
    <div class="">
        <foot-web></foot-web>
    </div>

  </div>
</template>
  
  <script lang="ts" setup>
  import { Head } from '@inertiajs/vue3';
  import HeadWeb from '../Page/HeadWeb.vue';
  import FootWeb from '../Page/FooterWeb.vue';
  import { ref } from 'vue'
  const props = defineProps(['path'])
  const activeIndex = ref('1')
  const handleSelect = (key: string, keyPath: string[]) => {
    console.log(key, keyPath)
  }
  </script>
  
  <style>
  .flex-grow {
    flex-grow: 1;


  }
  .slot{
    position: relative;
    overflow: hidden;
    z-index: 1000;
  }
  </style>
  
