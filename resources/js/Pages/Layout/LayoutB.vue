<template>
  <Head :title="`aoero--||--${path}`"/>
  <div class="relative slot">
    <div class="">
      <head-web></head-web>
    </div>
    <div id="corp" >
        <slot></slot>
    </div>
    <div id="footer" >
        <foot-web :mess="affiche"></foot-web>
    </div>

  </div>
</template>
  
  <script lang="ts" setup>
  import { Head } from '@inertiajs/vue3';
  import FootWeb from '../Page/FooterWeb.vue';
  import HeadWeb from '../head/headweb.vue';
  import MenuHome from "../Page/MenuHome.vue"
  import { ref,onMounted,onUnmounted } from 'vue'

  const affiche = ref(false)
  const props = defineProps(['path'])
  const activeIndex = ref('1')
  const handleSelect = (key: string, keyPath: string[]) => {
    console.log(key, keyPath)
  }
  function commence()
  {
    const footer = document.getElementById('footer');

    const scroll = window.scrollY;
    const position = footer?.getBoundingClientRect();
    console.log(position?.top)
    if(position?.top >= 500 )
    {
      affiche.value = false
    }
    else{
      affiche.value = true
    }
  }
  onUnmounted(() => {
    window.addEventListener('scroll',commence)
  })
  onMounted(() => {
    window.addEventListener('scroll',commence)


  })
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
  
