<template>
    <div class="">
        <head-web></head-web>
    </div>
    <div class="">
        <slot></slot>
    </div>
    <div class="">
        <foot-web></foot-web>
    </div>
</template>
  
  <script lang="ts" setup>
  import HeadWeb from '../Page/HeadWeb.vue';
  import FootWeb from '../Page/FooterWeb.vue';
  import { ref } from 'vue'
  
  const activeIndex = ref('1')
  const handleSelect = (key: string, keyPath: string[]) => {
    console.log(key, keyPath)
  }
  </script>
  
  <style>
  .flex-grow {
    flex-grow: 1;
  }
  </style>
  
