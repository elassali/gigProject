<template>
<div class="container mx-auto mb-8 mt-8 ">
        <div class="flex justify-between items-center border-b-2 pb-4 mb-8">
            <!-- filter button + input search -->
              <div class="flex space-x-4 mx-auto">
                    <button class="bg-gray-300 flex px-1.5 py-1.5 items-center space-x-1 h-fit self-center ">
                        <span>Filters</span>
                        <svg class="w-4 h-4" 
                        viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Stock_cut" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><desc/><g><circle cx="5" cy="8" fill="none" r="2" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><line fill="none" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="7" x2="32" y1="8" y2="8"/><circle cx="5" cy="24" fill="none" r="2" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><line fill="none" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="7" x2="32" y1="24" y2="24"/><circle cx="27" cy="16" fill="none" r="2" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><line fill="none" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="0" y1="16" y2="16"/><line fill="none" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="3" x2="0" y1="8" y2="8"/><line fill="none" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="29" x2="32" y1="16" y2="16"/><line fill="none" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="3" x2="0" y1="24" y2="24"/></g></svg>
                    </button>
                    <!-- Profession Select -->
                    <div class="">
                        <c-base-select
                        :isdesabeld="true"
                        placeholder="Select Profession"
                        :selections="professions"
                        v-on:sendittoparent="getprofession"
                        >
                        </c-base-select>
                    
                    </div>
                    <!-- City Select -->
                    <div class="">
                        <c-base-select
                        placeholder="Select City Or Region"
                        :isdesabeld="true"
                        :selections="cities"
                        v-on:sendittoparent="getcity"
                        >
                        </c-base-select>
                    </div>
                    <!-- Verified Phone number -->
                    <div 
                    class=" flex items-center"
                    >
                    
                        <c-check-box
                        label="Verified Employee Only"
                        v-model="Onlyverified"
                        @change="sendverified(Onlyverified)"
                        >
                        </c-check-box>
                    </div>
              </div>
            <!-- Apply button -->
              <div class=" flex items-center">
                    <button 
                    @click="search"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
              </div> 

        </div>      
    

</div>


</template>
<script>
import basecheck from '../../admin/components/checkboxs/basecheckbox'
import baseselect from '../../admin/components/inputs/baseselectinput'
export default {
    components:{
        'c-check-box' : basecheck,
        'c-base-select' : baseselect
    },
    data(){
        return{
            cities:undefined,
            professions:undefined,
            Onlyverified:undefined 
        }
    },
    methods:{
        // * Get all cities and professions
        getallprofessions:function(){
            axios.get('/api/listprofessions').then(response => this.professions = response.data)
        },
        getallcities:function(){
            axios.get('/api/loadcities').then(response => this.cities = response.data)
        },
        // * get data from select 
        getcity:function(value){
         this.$emit('sendcity',value) 
        },
        getprofession:function(value){
         this.$emit('sendprofession',value) 
        },
        sendverified:function(value){
            this.$emit('sendverified',value) 
        },
        search:function(){
            this.$emit('search')
        }
    },
    mounted(){
        this.getallcities(),
        this.getallprofessions()
    } 
}
</script>