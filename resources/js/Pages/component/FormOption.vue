<template>
   <option :value="value">{{ data }} </option>
</template>
<script setup>
const props = defineProps(['value','data'])
</script>