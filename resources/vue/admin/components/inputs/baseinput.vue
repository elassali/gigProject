<template>
         <div>
                <label v-if="label" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" :for="label">{{label}}</label>
                <input 
                v-bind="$attrs"
                v-bind:class="styleclass" 
                v-bind:value="value"
                v-on:input="$emit('input', $event.target.value)"
                v-bind:type="type"
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
        },
        styleclass:{
            type:String,
            default:'h-10 border mt-1 rounded px-4 w-full bg-gray-50'
        },
        type:{
            type:String,
            default:"text"
        }
    }
    
}
</script>