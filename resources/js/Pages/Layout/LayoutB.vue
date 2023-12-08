<template>
  <Head :title="`aoero--||--${path}`"/>
  <div class="relative slot">
    <div class="">
      <head-web></head-web>
    </div>
    <div id="corp">
        <slot></slot>
    </div>
    <div id="footer">
        <foot-web></foot-web>
    </div>

  </div>
</template>
  
  <script lang="ts" setup>
  import { Head } from '@inertiajs/vue3';
  import FootWeb from '../Page/FooterWeb.vue';
  import HeadWeb from '../head/headweb.vue';
  import MenuHome from "../Page/MenuHome.vue"
  import { ref,onMounted,onUnmounted } from 'vue'


  const props = defineProps(['path'])
  const activeIndex = ref('1')
  const handleSelect = (key: string, keyPath: string[]) => {
    console.log(key, keyPath)
  }
  function commence()
  {
    const corp = document.getElementById('corp');
    if(corp?.clientHeight === 0 && corp.clientHeight < window.innerHeight)
    {
      corp?.classList.add('h-screen');
    }
    else{
      corp?.classList.remove('h-screen');
      corp?.classList.add('h-auto')
    }
  }
  onUnmounted(() => {
    window.addEventListener('click',()=>commence()) 
  })
  onMounted(() => {
    window.addEventListener('click',()=>commence()) 

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
  
