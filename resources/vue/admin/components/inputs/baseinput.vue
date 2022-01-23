<template>
         <div >
                <label :for="label">{{label}}</label>
                <input 
                v-bind="$attrs"
                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" 
                v-bind:value="value"
                v-on:input="$emit('input', $event.target.value)"
                />
         </div>

</template>

<script>
export default {
    props:{
        label:{
            type:String,
            default:''
        },
        value:{
            type:[String,Number],
            default:''
        }
    }
    
}
</script>