<template>
    <div>
    <c-header></c-header>

        <!--gallery header action --> 
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
        <div class="flex justify-end items-center space-x-2">
        <!-- Upload button-->
            <div class="container  h-full flex flex-col items-center">
                <div class="flex w-full">
                    <div 
                        class="relative inline-flex items-center px-4 py-2 bg-gray-600 border border-gray-600 rounded-l font-semibold cursor-pointer text-sm text-white tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">
                        Upload Images
                        <input
                        v-on:change="getImages($event)"
                         type="file"  class=" absolute top-0 left-0 w-full h-full opacity-0" multiple/>
                    </div>
                    <div class="w-4/12 lg:w-3/12 border border-gray-300 rounded-r-md flex items-center justify-between">
                        <span  class="p-2 text-slate-500	">{{uploadedImageslength > 0 ? uploadedImageslength + " Selected Image" : ''}}</span>
                        <button 
                        v-if="uploadedImageslength > 0" 
                        class="pr-2"
                        v-on:click="removeUploadedimages()"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3"
                                viewBox="0 0 320 512">
                                <path
                                        d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                            </svg>
                        </button>
                    </div>
                    <div v-if="uploadedImageslength > 0"  class="flex items-center ml-2">
                        <button 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 tracking-wide rounded"
                        @click="addImages()"
                        
                        >
                            save
                        </button>
                    </div>
                </div>
                
            </div>

              <!-- check box -->
            <div :class=" isSlectActive == false ? 'md:col-span-5 flex items-center space-x-2' : 'hidden'">
                    <div class="inline-flex items-center">
                        <input v-model="isSlectActive" type="checkbox" class="form-checkbox rounded-full"/>
                    </div>
                    <label class="text-sm">Select</label>
            </div>
              <!-- check box -->
            <div v-if="isSlectActive" class=" md:col-span-5 flex items-center space-x-2 w-28">
                    <div class="flex items-center">
                        <input 
                        type="checkbox" 
                        class="form-checkbox rounded-full"
                        @change="selectAllImages($event)"
                        />
                        
                    </div>
                    <label class="text-sm font-semi-bold">Select All</label>
                    
            </div>
               <!-- DELETE button--> 
              <div 
              @click="deleteImages()"
              :class="selectedItems.length > 0 ? 'md:col-span-5 flex items-center space-x-1 cursor-pointer cursor-pointer ' : 'hidden'">     
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>                    
                    <label class="text-sm font-semi-bold h-5 text-red-600 cursor-pointer ">Delete</label>
            </div>
            <!-- Cancel button--> 
              <div  :class=" isSlectActive  ? 'md:col-span-5 flex items-center space-x-1 cursor-pointer' : 'hidden'"
              @click="isSlectActive = false"
              >     
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>                  
                    <label class="text-sm font-semi-bold h-5 text-red-600">Cancel</label>
            </div>
        </div>
     
        </div>
             <!--galery style start -->
                 <section class=" overflow-hidden text-gray-700 transition duration-300 ease-out">

                        <div  class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                            <div class="flex flex-wrap -m-1 md:-m-2">

                            <!-- One image start -->
                                <div v-for="image in  professionImages" :key="image.id" class="flex flex-wrap w-1/3">
                                    <div class="relative w-full p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                        :src="image.url">
                                        <!-- check box -->
                                          <div v-if="isSlectActive" class=" absolute md:col-span-5 top-4 right-4">
                                                <div class="inline-flex items-center">
                                                  <input
                                                   type="checkbox"
                                                    class="form-checkbox"
                                                    @change="slectImage(image.id,$event)"
                                                    :checked="selectedItems.includes(image.id)"
                                                    
                                                    />
                                                </div>
                                        </div>
                                    </div>
                                  
                                </div>
                                <!-- One image end -->

                                <!-- no image to display place holder -->
                                <div  :class="imagesExist == 0 ? 'hidden' : 'flex flex-col items-center w-full'">
                                    <h6 class="text-xl font-semibold -mb-16">There is no images to display please Upload some of your work!</h6>
                                    <svg class="w-6/12 h-6/12 fill-gray-400" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                       <path  d="M17 2.5H1a1 1 0 0 0-1 1v10.51a1.494 1.494 0 0 0 1.49 1.49h15.02A1.494 1.494 0 0 0 18 14.01V3.5a1 1 0 0 0-1-1zm-10 3a1 1 0 1 1-1 1 1 1 0 0 1 1-1zm-5 8a.418.418 0 0 0 .09-.155c.08-.13.17-.263.25-.4.12-.18.23-.37.35-.56.13-.22.27-.442.4-.662s.28-.44.41-.66c.13-.2.25-.4.37-.59.09-.15.18-.29.26-.43a1.443 1.443 0 0 1 .23-.32 1.086 1.086 0 0 1 .37-.19 1.056 1.056 0 0 1 .5 0 1.038 1.038 0 0 1 .37.17l1.45 1.1L10.3 13.5H2zm11.43 0L9.05 9.865l3.43-2.2a1.033 1.033 0 0 1 .54-.165.782.782 0 0 1 .26.04.95.95 0 0 1 .63.524L16 13.5h-2.57z"/>
                                    </svg>
                                </div>
                        
                            </div>
                        </div>


                </section>
                <!--galery style end -->
    
    </div>

</template>
<script>
import header from '../index/header'

export default {

    components:{
        'c-header': header
    },
    data(){
        return{
            professionImages:[],
            selectedItems:[],
            isSlectActive:false,
            selectAll:false,
            getAllImages:[],
            uploadedImageslength:0,
            // ! ----------
            imagesExist: 0
        }
    },
    methods:{
        slectImage:function(value,event){
            if(event.target.checked){
                this.selectedItems.push(value)
               console.log(this.selectedItems)
            }
            else{
                    let index = this.selectedItems.indexOf(value);
                    this.selectedItems.splice(index,1)
                    console.log(this.selectedItems)
            }
            
            
        },
        selectAllImages:function(event){
            if(event.target.checked){
                 let map =  []
              this.professionImages.map(function (item){
                  map.push(item.id)            
               })
                this.selectedItems = map.slice()    
                console.log(this.selectedItems) 

            }
            else{
                this.selectedItems = []
                console.log(this.selectedItems)
            }
        },
        displayProfessionImages:function(){
            let portfolioid = this.$route.query.id
            axios.get('/api/portfolio',{
                params:{
                   portfolioID:portfolioid
                }
            }).then(response =>{
                // this.professionImages = response.data
                response.data.status == 202 ?  this.professionImages = response.data.images : this.imagesExist = 1
                console.log(response)
                })
        },
        // * get images
        getImages:function(event){
            this.uploadedImageslength = event.target.files.length
            let imagesarray = []
            for(let i= 0 ; i < event.target.files.length ; i++){
                // this.getAllImages.push(event.target.files[i])
                imagesarray.push(event.target.files[i])
                
            }
            this.getAllImages = imagesarray
            console.log(this.getAllImages)
            
          
        },
        removeUploadedimages:function(){
            this.uploadedImageslength = 0
            this.getAllImages = undefined

        },
        // * Add images
        addImages:function(){
            const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
            let data = new FormData()
            for(let i = 0 ; i < this.uploadedImageslength ; i++){
                data.append('images[' + i + ']',this.getAllImages[i])
            }
            
            data.append('portfolioID',this.$route.query.id)

            axios.post('/api/add-professionion-images',data,config).then(response => console.log(response))
        },
        // * Delete Images
        deleteImages:function(){
            axios.delete('/api/remove-professionion-images',{
                params:{
                    portfolioId:this.$route.query.id,
                    images:this.selectedItems,
                }
            }).then(response => console.log(response))
        }
    },
    mounted(){
        this.displayProfessionImages()
    }
}
</script>
<style scooped>
.galerydimenssion{
    width:480px;
    height:680px;
    
}
</style>