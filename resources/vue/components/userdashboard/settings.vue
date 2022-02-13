<template>

         <!-- This is an example component -->
        <div class="container mx-auto my-4 flex w-full">
        <!-- setting component-->
            <router-link 
             :to="{name : 'UserInfo'}"
             class='flex flex-wrap cursor-pointer bg-[#F2F2F2] hover:bg-[#d9d9d9] rounded-lg w-96 mr-4'>
                <div class='flex ml-2 items-center justify-between px-6 py-6 w-full'>
                    
                    <div>
                        <h6 class="text-2xl font-semibold">My Account information</h6>
                    </div>     

                    <div class='mx-4'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>              
                    </div>
   

                </div>

            </router-link>

            <Router-link 
            :to="{name:'myJobOffers'}"
            class='flex flex-wrap cursor-pointer bg-[#F2F2F2] hover:bg-[#d9d9d9] rounded-lg w-96'>
                <div class='flex ml-2 items-center justify-between px-6 py-6 w-full'>
                    
                    <div>
                        <h6 class="text-2xl font-semibold">My Job Offers</h6>
                    </div>     

                    <div class='mx-4'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>              
                    </div>
   

                </div>

            </Router-link>

        </div>
       <!-- setting component-->
    <!-- This is an example component -->

</template>
<script>
export default {
    data(){
        return{
            isToolTipHover:undefined
        }
    },
  
    
    
}
</script>
