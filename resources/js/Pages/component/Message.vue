<template>
    <div>
        <div class="px-4" v-if="message">
            <p class="text-red-400 text-sm text-right">
                {{ message }}
            </p>
        </div>
    </div>
</template>
<script setup>
const props = defineProps(['message'])
</script>