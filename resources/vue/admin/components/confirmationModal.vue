<!-- 
 // ? ============================= use case =================================
        //* props: text => what confirmation text to display
        // * showConfirmation => to show or hide confirmation modal
//   ? ============================ emit functions to detect cancel and confirm actions ==========================
        // * cancelAction => return false to cancel delete action
        // * confirmAction => return true to confirm delete action
//   ? ============================ How to use it in parent components =====================================

        // ?  this component  <c-comnfirmation
                            :showConfirmation="deleteconfirmation"
                            v-on:cancelActon="confirmation"
                            v-on:confirmActon="confirmation"
        // ?                   ></c-comnfirmation>

        //? deleteconfirmation => data variable to emutate showConfirmation 
        // ? confirmation => function to handle delete or cancel action
-->

<template>
    <div :class=" showConfirmation ? 'bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0' : 'hidden'">
         
        <div class="relative bg-white px-16  rounded-md text-center">
            <div 
            @click="$emit('cancelActon',false)"
            class="absolute top-0 right-0 p-0.5 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="flex flex-col space-y-2">
                <h1 class="text-xl font-bold text-slate-500 pt-2">Confirmation</h1>
                <p class="text-sm">{{text}}</p>
            </div>
           <div class="flex items-center justify-center my-4">
                 <button @click="$emit('cancelActon',false)" class="bg-indigo-500 px-4 py-2 rounded-md text-md text-white">Cancle</button>
                 <button @click="$emit('confirmActon',true)" class="bg-red-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Ok</button>
           </div>
        </div>
    </div>
</template> 

<script>
export default {
    props:{
        text:{
            type:String,
            default:"are you sure to delete?"
        },
        showConfirmation:{
            type:Boolean,
            default:true
        }

    },
    data(){
        return{
        }
    }
}
</script>

