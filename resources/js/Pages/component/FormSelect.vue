<template>
    <select class="input font-light rounded-none ">
        <slot />
    </select>
</template>
<script setup>


const props = defineProps(['value'])
</script>
