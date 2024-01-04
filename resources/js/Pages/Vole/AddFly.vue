<template>
    <div class="text-sm">
        <div class="media">
            <div class="col-span-4"></div>
            <div class="col-span-8 margin">
                <div class="px-4">
                    <form-addfly></form-addfly>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from "vue"
import FormAddfly from './FormAddfly.vue';
</script>