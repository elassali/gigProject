<template>
        <div class="">
      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>
        <div class="flex items-center justify-center w-full">
            <label class=" relative flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
                <div class="flex flex-col items-center justify-center pt-7">
                  <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                  <p class="lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider">Select a photo</p>
                </div>
              <input 
                type="file"
                v-on:change="fileuploaded($event)"
                class="hidden"
                >
            </label>
        </div>
    </div>


</template>

<script>
export default {
  data(){
    return{
      image:''
    }
  },
    methods:{
      fileuploaded:function(event){
        this.image = event.target.files[0]
        this.$emit('datafromfirstchild',this.image)
      }
    }
}
</script>