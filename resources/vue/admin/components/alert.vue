<!-- 
 // ? ============================= use case =================================
        //* props: text => what alert text to display
        // * called => detect an alert call

//   ? ============================ How to use it in parent components =====================================

        // ?  this component  <c-alert
                            :called="alertcall"
                            :text="alertText"
        // ?                   ></c-alert>

        alertCall:false,
        alertText:undefined,
        //* use in axios ex:
        //  .then(response => {
        //                  console.log(response)
                        // ? here !!!!       
        //                 this.alertText="Profession Deleted"
        //                 this.alertCall = true
        //                 setTimeout(() => {   this.alertCall = false; }, 1500) return to default value
                         // ? here !!!!
        //              })   
-->



<template>

    <div  :class="called ? '   animate__animated animate__fadeOutUp animate__delay-3s z-50  min-w-1/5 bg-green-400 rounded-lg py-4 px-6 mb-3 text-base text-white inline-flex items-center absolute right-0 top-0 mt-2 mr-2' : 'hidden'">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
        </svg>
           {{text}}
   </div>

</template>
<script>
export default {
    props:{
        called:{
            type:Boolean,
            default:false
        },
        text:{
            type:String,
            default:'Profession Deleted'
        }
    }
}

</script>