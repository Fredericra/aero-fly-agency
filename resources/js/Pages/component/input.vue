<script setup>
const props = defineProps([''])
</script>
<template>
    <div>
        <div class="relative">
            <input type="text" class=" bg-gray-200 w-full rounded-full h-9 indent-8 outline outline-0" v-model="value">
            <i class="fas fa-user-circle absolute left-2 top-1/4 fa-lg text-gray-400 icon"></i>
        </div>
    </div>
</template>
<style scoped>
input:focus i{
    display: none;
    font-size: 1px;
}
</style>
