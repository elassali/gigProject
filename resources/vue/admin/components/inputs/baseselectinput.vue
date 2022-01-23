<template>

<div class=""
v-bind="$attrs"
> 
    <div class="relative">
        <div class="w-full  svelte-1l8159u">
            <div class="my-2 bg-white p-1 flex border border-gray-200 rounded svelte-1l8159u">
                <div class="flex flex-auto flex-wrap"></div>
                <input  v-model="inputsearsh" @input="filter" class="p-1 px-2 appearance-none outline-none w-full text-gray-800  svelte-1l8159u">
                <div>
                    <button v-on:click="cleardata()" class="cursor-pointer w-6 h-full flex items-center text-gray-400 outline-none focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather hover:stroke-red-600 feather-x w-4 h-4">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
                    <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none" @click="openselectoptions()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
                            <polyline points="18 15 12 9 6 15"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div :class="[isopen ? 'absolute shadow top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj' : 'hidden']">
            <div class="flex flex-col w-full">
                <div class="cursor-pointer w-full border-gray-100 rounded-t border-b 
            hover:bg-teal-100" >

                
                <div 
                v-for="item in filtered_data" :key="item.id"
                @click="selectedoption(item.proficent)"
                class="flex w-full items-center p-2 pl-2 border-transparent bg-white border-l-2 relative hover:bg-teal-600 hover:text-teal-100 hover:border-teal-600">
                        <div class="w-full items-center flex">
                            <div class="mx-2 leading-6  ">{{item.proficent}} </div>
                        </div>
                    </div>
                </div>

                <!-- selected one -->
                <div class="cursor-pointer w-full border-gray-100 border-b hover:bg-teal-100">
                    <div class="flex w-full items-center p-2 pl-2 border-transparent bg-white border-l-2 relative hover:bg-teal-600 hover:text-teal-100 border-teal-600">
                        <div class="w-full items-center flex">
                            <div class="mx-2 leading-6  ">Javascript </div>
                        </div>
                    </div>
                </div>

        
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props:{
        selections:{
            type:Array,
        },
     
    },
    data(){
        return{
            isopen:{
                type:Boolean,
                default:false
            },
            inputsearsh:"",
            
         
            filtered_data:{
                type:Array,
                default:this.selections
            }
        }
    },
    methods:{
        openselectoptions:function(){
            this.isopen = !this.isopen
        },

        selectedoption:function(selected){
                        this.isopen = false;
            this.inputsearsh = selected;
        },
        cleardata:function(){
            this.inputsearsh = "";
            this.isopen = open;
        },
       
     
    },
    computed:{
        filter:function(){
            this.inputsearsh.length == 1 ? this.isopen = true : ''
            this.filtered_data =  this.selections.filter(item => !item.proficent.indexOf(this.inputsearsh))
          },
    },
          
}
</script>
 <style scooped>
    .top-100 {top: 100%}
    .bottom-100 {bottom: 100%}
    .max-h-select {
        max-height: 300px;
    }
 </style>