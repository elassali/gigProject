<template>
    <div id="root">
        <c-header></c-header>

        <!-- cart design start  -->
        <div class="container mx-auto m-4">
                    <div class="flex flex-col w-full border-2 max-w-2xl rounded-md drop-shadow-2xl">

                           

                            <div class="flex items-center flex-1 h-full">

                                    <div class="flex align-center  felx-wrap ">
                                        <span class="font-semibold hidden sm:block md:hidden seperator text-neutral-700">Name</span>
                                        <img src="images/profileImages/icons8-cat-profile-48.png" class=" hidden sm:hidden md:block w-8 h-8" alt="Profile Picture">
                                        <span class="self-center mr-1">Abdo Jhom doe</span>
                                    </div>


                                    <div class="flex  h-full flex-1 justify-center flex-wrap horizontalseperator">
                                        <span class="font-semibold  text-neutral-700 w-full text-center verticalseperator">Job Location</span>
                                        <span class="mr-1 text-base font-light mt-0 self-center text-neutral-600">Casablanca</span>
                                    </div>

                                    <div class="flex  h-full flex-1 justify-center flex-wrap horizontalseperator">
                                        <span class="font-semibold  text-neutral-700 w-full text-center verticalseperator">Job</span>
                                        <span class="mr-1 text-base font-light mt-0 self-center text-neutral-600">Sebagh</span>
                                    </div>
                                    
                                    <div class="flex h-full flex-1 justify-center flex-wrap horizontalseperator">
                                        <span class="font-semibold  text-neutral-700 w-full text-center verticalseperator">For Date</span>
                                        <span class="mr-1 text-base font-light mt-0 self-center text-neutral-600">27 Dec,2022</span>
                                    </div>
                            </div>
                        <hr>
                        <!-- description start -->
                        <div class="flex flex-col p-2">
                           <div class="flex flex-col">
                                <span class="font-semibold seperator paragraphholder text-neutral-700 text-lg"> Job Description</span>
                                <p class="paragraphstyle leading-5 text-base font-light mt-0 mb-4 text-neutral-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint quisquam officiis, atque, ab aut vitae qui nisi sed id esse fuga quidem, quis quibusdam quos molestiae sapiente obcaecati incidunt quia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis culpa illo asperiores provident? Quos modi porro placeat, odit earum iste veniam sint laborum quisquam necessitatibus obcaecati ut. Recusandae, laudantium praesentium?</p>
                            </div>
                            <div class="flex justify-between mt-4">
                                <button class=" w-fit bg-green-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                    Apply
                                </button>
                                <button  class="flex items-center text-blue-500 background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 w-fit">
                                    View More
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-0.5 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                                </button>
                                 

                            </div>
                        </div>
                    </div> 
        </div>                  

        <!-- cart design start end  -->




        <c-footer></c-footer>
    </div>
</template>
<script>
import header from './header'
import footer from './footer'
export default {
    components:{
        'c-header': header,
        'c-footer': footer
    },
    data(){
        return{
            togglePragraphStyle:false
        }
    },
    methods: {
        getAllJobOffers:function(){
            axios.get('/api/Job-Offers')
                 .then(response => console.log(response))
        },
        paragraphStyleApply:function(){
            const paragraphHeight = document.querySelector('.paragraphholder + p');
            if ( paragraphHeight.offsetHeight < 63){
                paragraphHeight.classList.remove('paragraphstyle')
            }
        },
        viewMoreToggle:function(){
            
        }
        
    },
    mounted() {
        this.getAllJobOffers()
        this.paragraphStyleApply()
    },
}
</script>

<style scooped>    
.seperator::after{
    content:":";
    margin: 0 2px 0 

}

/* remove the after with javascript too in order to show all paragraph content */
.paragraphstyle{
    height: calc(3 * 21px); /* with javascript remove height  */
    overflow: hidden;
    position: relative;
}

.paragraphstyle::after{
    Content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    height: 21px;
    width: 75%;
    background: linear-gradient(
    90deg, transparent, white
    )
}
.verticalseperator {
    position:relative;

}
.verticalseperator::after {
    Content:'';
    position:absolute;
    width:100%;
    height:1px;
    bottom:0;
    right:0;
    background-color: rgb(55, 65, 82);

}
.horizontalseperator{
    position:relative
}
.horizontalseperator::before{
    Content:'';
    position:absolute;
    width:1px;
    height:100%;
    left:0;
    top:0;
    background-color: rgb(55, 65, 82);
}
</style>