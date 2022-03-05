<template>

        <label for="unchecked" class="mt-3 inline-flex items-center cursor-pointer">
            <span class="relative">
            <span class="block w-10 h-6 bg-gray-400 rounded-full shadow-inner"></span>
            <span
             :class="checked ? 'absolute block w-4 h-4 mt-1 ml-1 rounded-full shadow inset-y-0 left-0 focus-within:shadow-outline transition-transform duration-300 ease-in-out bg-green-600 transform translate-x-full' : 'absolute block w-4 h-4 mt-1 ml-1 bg-white rounded-full shadow inset-y-0 left-0 focus-within:shadow-outline transition-transform duration-300 ease-in-out'">
                <input 
                v-bind="$attrs"
                v-bind:checked="checked"
                v-on:change="$emit('change',$event.target.checked)"
                class="absolute opacity-0 w-0 h-0" />
            </span>
            </span>
            <span class="ml-3 text-sm">{{checked ? 'Public' : 'Private'}}</span>
        </label>



</template>
<script>
export default {
    model:{
        prop:'checked',
        event:'change'
    },
    props:{
        checked:{
            type:[Boolean,Number],
            default:true
        }
    }
}
</script>