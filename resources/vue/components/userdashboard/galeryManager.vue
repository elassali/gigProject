<template>
<div>
<c-header></c-header>

    <div class="container mx-auto"> <!-- //! wrapper -->

        <div class="flex items-center py-8  ">
            <div class="flex items-center cursor-pointer ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="text-lg">Back</span>
            </div>

             <div class="mx-auto">
                <h1 class="font-bold text-xl tracking-wide">Gallery Manager</h1>
            </div>
        </div>
        <!-- //! folders -->
        <div class="mt-12 flex justify-center flex-col md:flex-row">
           <div v-for="portfolio in portfolios" class="w-full md:w-1/2 lg:w-1/4 px-3 pb-3">
                    <div class="flex items-center bg-indigo-500 rounded-md p-3 text-white cursor-pointer transition duration-500 ease-in-out hover:shadow hover:bg-indigo-600">
                        <div>
                             <svg fill="currentColor" class="w-10 h-10" style="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 4c0-1.1.9-2 2-2h7l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z"></path></svg>
 
                        </div>
                        <router-link 
                        :to="{name:'galleryDisplay', query:{ profession: portfolio.professionName , id: portfolio.id }}"
                        class="px-3 mr-auto flex items-center justify-between w-full">
                            <h4 class="font-bold text-l">{{portfolio.professionName}}</h4>
                            <span class=" flex items-center justify-center w-10 h-10 rounded-full text-white text-lg font-bold">{{portfolio.iamgesCount}}</span>
                        </router-link>
                        
                    </div>
            </div>             
        </div>

        <!-- // ? adde profession  -->
        <div class="flex justify-end mt-12">
              <div  class=" flex w-full md:w-1/2 lg:w-2/4 px-3 pb-3 ">
                     <div class="flex items-center bg-lime-500	rounded-md p-3 text-white cursor-pointer transition duration-500 ease-in-out hover:shadow hover:bg-lime-600">
                        <div class="mr-2">
                             <svg fill="currentColor" class="w-10 h-10" style="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 4c0-1.1.9-2 2-2h7l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z"></path></svg>
 
                        </div>
                        <div 
                        @click="updateprofessionmode = true" 
                        :class=" updateprofessionmode == false ? 'px-3 mr-auto flex justify-between w-full items-center' : 'hidden'">
                            <h4 class="font-bold text-lg">Add A New Profession</h4>
                            <span class=" flex items-center justify-center w-10 h-10 rounded-full text-white text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </div>
                        <div :class="updateprofessionmode == false ? 'hidden' : 'flex'">
                            <!-- // ? add profession form-->
                                <div>
                                    <c-baseselect
                                    :selections="allprofession"
                                    v-on:sendittoparent="getvalueofjob"
                                    >
                                    </c-baseselect> 
                                </div>
                            <!-- action buttons after update is on -->
                                <div class="flex items-center">
                                    <button
                                    @click="addProfession(jobtoadd_id)"
                                    class="text-xs text-blue-500 font-semibold ml-2">Save
                                    </button>
                                    <button 
                                    @click="updateprofessionmode = false" 
                                    class="text-xs text-red-400 font-semibold ml-2">Cancel</button>
                                </div> 
                        </div>        
                    </div>
             </div>
        </div>        

    </div> <!-- // ! wraper end  -->
</div>    
</template>
 
<script>
import header from '../index/header'
import basesetelect from '../../admin/components/inputs/baseselectinput'
export default {
    components:{
        'c-header': header,
        'c-baseselect' : basesetelect,
    },
    data(){
        return{
            portfolios:undefined,
            allprofession:[],
            jobtoadd : undefined,
            jobtoadd_id : undefined,
            updateprofessionmode:false
        }
    },
    methods:{
        getvalueofjob:function(value){
            this.jobtoadd = value.title
            this.jobtoadd_id = value.id
            console.log(this.jobtoadd)
        },
        addProfession:function(){
            axios.post('/api/user/profession/new',{
                professionID : this.jobtoadd_id,
            })
        },
        userProfession:function(){
             axios.get('/api/gallerymanager').then(response => {
                 console.log(response)
                 this.portfolios = response.data.data,
                 this.allprofession = response.data.professions
             })
        }
    },
    mounted(){
        this.userProfession()
    }
}
</script>