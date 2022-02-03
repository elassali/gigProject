<template>
<!-- opperation page Start [to add for editcreate ml-[17rem]]  --> 
<div class="container  ml-[17rem] py-10 h-64 md:w-4/5 w-11/12 px-6">
    <!-- Remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
     <div class="p-1 bg-gray-100 flex ">
                   

                        
                         
      
                               

                                         

    
  </div>
</div><!-- opperation page End -->  
</template>
<script>
import view_add_edit_page from './viewaddEditpage'
import dataview from './dataview'
export default {
    props:["dataload","selectoptions" ],
    components:{
        'view-page': view_add_edit_page,
        'data-view' : dataview

    },
      data(){
        return{
        }
    },
    methods:{
       fileDatafromcompo (value) {
           this.$emit('datafromthirdondchild',value)
      },
      datafromdatecompo:function(value){
        this.$emit('datecomponentdate',value)
      }

    }

}
</script>