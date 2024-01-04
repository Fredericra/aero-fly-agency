<template>
    <div class="text-[10px]">
        <div class="media">
                        <div class="col-span-4 shadow-lg shadow-indigo-950 hover:shadow-purple-950 duration-1000">
                            <div class=" margin">
                                <dig class="">
                                    <div class="text-center">
                                        <p class="text-white text-[22px]">Ajouter Image Carouselle</p>
                                    </div>
                                    <form action="" class="space-y-4 margin" @submit.prevent="ajouter">
                                        <form-input text="titre" :erreur="errors.text">
                                            <input type="text" class="input rounded-none " v-model="form.text" placeholder="description">
                                        </form-input>
                                        <form-input text="description" :erreur="errors.description">
                                            <textarea v-model="form.description" id="" class="indent-4 font-thin rounded-none text-center text-sm input" placeholder="description image"></textarea>
                                        </form-input>
                                       <form-input icon="fas fa-image" :erreur="errors.image">
                                            <input type="file" class=" w-full text-right outline outline-2 outline-gray-600 " @input="form.image = $event.target.files[0]" />
                                       </form-input>
            
                                        <div class="text-sm">
                                        <button class="btn">Ajouter</button>
                                        </div>
                                    </form>
                                </dig>
                            </div>
                        </div>
                        <div class="col-span-8">
                            <div class="px-10 py-4 flex flex-wrap m-4  ">
                                <div class=" bien m-2"  v-for="(value,index) in donne.carouselle" :key="index">
                                    <div class="relative  overflow-hidden">
                                        <div class="">
                                            <div class="py-2 bg-gray-600 rounded-t-md">
                                                <div class="text-center font-bold text-sm">
                                                    <p class="titre">{{ index+1 }} </p>
                                                </div>
                                            </div>
                                            <img :src="value.image" alt="" class=" object-cover h-[150px] w-[150px]">
                                            <div class="py-2 bg-white rounded-b-md"></div>
                                        </div>
                                        <div class="absolute left-0 duration-1000  okay">
                                            <div class="bg-white w-[150px] h-[200px]">
                                                <div class="flex justify-center h-[200px] items-end">
                                                    <button class="" @click.prevent="efface(value.id)">
                                                        <i class="fas link fa-trash fa-sm text-gray-700"></i>
                                                    </button>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4"></div>
                    </div>
    </div>
</template>
<script lang="ts" setup>
import { ref,reactive,computed } from 'vue'
import { router,usePage } from "@inertiajs/vue3"
import MessageVue from "../component/Message.vue"
import FormInput from "../component/FormInput.vue"

const page = usePage()
const errors = computed(()=>{
    return page.props.errors;
})
const donne = computed(()=>{
    return page.props;
})
const form = reactive({
    image:null,
    text:null,
    description:null,
    categorie:2
})

const efface = (id)=>{
    router.post(route('admin.image'),{
        id:id,
        categorie:1
    });
}
const ajouter = ()=>{
    router.post(route('admin.image.carouselle'),form);
    if(errors.length > 0)
    {

    }
    else{
        form.description = null;
        form.image = null;
        form.text = null;
    }
} 
</script>
<style scoped>
.bien:hover .okay{
    transform: translateY(-10px);
    transform-origin:top ;
    border-top-right-radius:20px ;
    border-top-left-radius:20px ;
}
.okay{
    transform-origin: bottom;
    bottom: 0;
    transform: translateY(150px);
}
.demo-tabs>.el-tabs__content {
    padding: 32px;
    color: #6b778c;
    font-size: 32px;
    font-weight: 600;
}

.el-tabs--right .el-tabs__content,
.el-tabs--left .el-tabs__content {
    height: 100%;
}
</style>