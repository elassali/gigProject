<template>
      <div class="md:col-span-5">
          <div class="inline-flex items-center">
          <input 
          type="checkbox" 
          v-bind="$attrs"
          class="form-checkbox"
          v-bind:checked="checked"
          v-on:change="$emit('change',$event.target.checked)"
           />
          <label for="billing_same" class="ml-2">{{label}}.</label>
          </div>
      </div>
</template>
<script>
export default {
    model:{
        prop:'checked',
        event:'change'
    },
    props:{
        label:{
            type:String,
            default:''
        },
        checked:{
            type:Boolean,
            default:false
        }
    }
    
}
</script>