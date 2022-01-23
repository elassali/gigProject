<template>
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 w-full">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Personal Details</p>
                                <p>Please fill out all the fields.</p>
                            </div>

                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                   <!-- Here come your data --> 


                                    <template v-for="(item,index) in user">
                                        <template v-if="item.inputType == 'text' || item.inputType == 'password' ">
                                                <base-input
                                                :type="item.inputType"
                                                :class="item.colSpace"
                                                v-model="item.data"
                                                :label="item.label"
                                                ></base-input>
                                                
                                        </template>        
                                        <template v-if="item.inputType == 'date'">
                                                <base-date-picker
                                                :class="item.colSpace"
                                                :label="item.label"
                                                v-on:dateComponentvalue="Datedatafromcomponent"
                                                ></base-date-picker>
                                        </template>        
                                        <template v-if="item.inputType == 'file'">
                                                <base-file-inpute
                                                type="date" 
                                                :class="item.colSpace"
                                                :label="item.label"
                                                v-on:datafromfirstchild="fileDatafromcompo"
                                                ></base-file-inpute>
                                        </template>        
                                    </template>    

                                

                                <!-- Here ends your data -->  
                                </div> 
                            </div>
                         </div>
                        </div> 

</template>
<script>
//{{Object.entries(user)[index][1].inputType}}
import baseinput from './inputs/baseinput'
import inputwithbuttons from './inputs/inputwithbuttons'
import BaseButton from './buttons/basebutton'
import baseselect from './inputs/baseselectinput'
import basedatetime from './inputs/basedatetime'
import basefileinput from './inputs/basefileinput'
export default {
    props:["user","selectdata","dateOfBirth"],
    components:{
        'base-input':baseinput,
        'input-with-buttons': inputwithbuttons,
        'base-button': BaseButton,
        'base-select': baseselect,
        'base-date-picker' : basedatetime ,
        'base-file-inpute' : basefileinput,
    },
    data(){
        return{
            data:'',
            classvariable:''
        }
    },
    methods:{
      fileDatafromcompo (value) {
           this.$emit('datafromsecondchild',value)
      },
      Datedatafromcomponent:function(value){
          this.$emit('Datafromdatecomponent',value)
      }

    
    }
}
</script>