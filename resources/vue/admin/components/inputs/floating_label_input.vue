<template>


    <!-- This is the input component -->
    <div class="relative h-10 input-component mb-5 empty">
      <input
        v-bind="$attrs"
        v-bind:value="value"
        v-on:input="$emit('input', $event.target.value)"
        class="h-full border-gray-300 px-2 transition-all border-blue rounded-sm"
      />
      <label for="name" class="absolute left-2 transition-all bg-white px-1">
        Name
      </label>
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
<style>
label {
  top: 0%;
  transform: translateY(-50%);
  font-size: 11px;
  color: rgba(37, 99, 235, 1);
}
.empty input:not(:focus) + label {
  top: 50%;
  transform: translateY(-50%);
  font-size: 14px;
}
input:not(:focus) + label {
  color: rgba(70, 70, 70, 1);
}
input {
  border-width: 1px;
}
input:focus {
  outline: none;
  border-color: rgba(37, 99, 235, 1);
}
</style>