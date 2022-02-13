<template>

<div class=""

> 
  <label v-if="label" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" :for="label">{{label}}</label>
    <div class="relative">
        <div class="w-full  ">
            <div class="bg-white p-1 flex border border-gray-200 rounded h-10">
                <div class="flex flex-auto flex-wrap"></div>
                <input
                  v-bind="$attrs"
                  :disabled="isdesabeld"
                  :value="value"
                  v-on:input="$emit('input',$event.target.value)"
                  class="p-1 px-2 appearance-none outline-none w-full text-gray-800 h-full  ">
                <div>
                    <button v-on:click="cleardata()" class="cursor-pointer w-6 h-full flex items-center text-gray-400 outline-none focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather hover:stroke-red-600 feather-x w-4 h-4">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 ">
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
                        v-for="item in selections" :key="item.id"
                        @click="selectedoption(item.id,item.title)"

                        :class=" [selected == item.id ? 'border-teal-600' : '','flex w-full items-center p-2 pl-2 border-transparent bg-white border-l-2 relative hover:bg-teal-600 hover:text-teal-100 hover:border-teal-600']"
                     >
                            <div class="w-full items-center flex">
                                    <div class="mx-2 leading-6  "> {{item.title}} </div>
                            </div>
                    </div>
                </div>
                <!-- slected one has border-teal-600 deffrence -->
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props:{
        selections:{
            type:[Array,Object]
        },
        // value:{
        //     type:[String,Number],
        //     default:""
        // },
        isdesabeld:{
            type:Boolean,
            default:false
        },
        label:{
            type:String,
            default:''
        }
     
    },
    data(){
        return{
            isopen:false,
            selected:undefined,
            filtered_data:'',
            value:undefined 
                
        }
    },
    methods:{
        openselectoptions:function(){
            this.isopen = !this.isopen
        },

        selectedoption:function(id,optiontitle){ 
            this.isopen = false;
            this.value = optiontitle,
            this.selected = id
            this.$emit('sendittoparent',[optiontitle,id]) 
            
        },
        cleardata:function(){
            this.value = ""
            this.isopen = true
            this.selected = -1
        },
        filter:function(){
            this.inputsearsh.length > 0 ? this.isopen = true : ''
            if(this.inputserash){
                    this.filtered_data =  this.selections.filter(item => !item.proficent.indexOf(this.inputsearsh))
            }
          },
          
    },
    computed:{
      
    },
    mounted(){

    }
}
</script>
 <style scooped>
    .top-100 {top: 100%}
    .bottom-100 {bottom: 100%}
    .max-h-select {
        max-height: 300px;
    }
 </style>