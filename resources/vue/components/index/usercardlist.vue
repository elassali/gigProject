<template>
<div>
    <!-- header -->    
    <c-header></c-header> 

    <!--Filter componnet -->
    <C-filter
    v-on:sendcity="getcity"
    v-on:sendprofession="getprofession"
    v-on:sendverified="getcheckboxvalue"
    v-on:search="filterusers"
    ></C-filter>

    <!-- Users Card-->
 <div class="container mx-auto">
    <section class="grid grid-cols-4 gap-4">
            <!-- This is an other example component -->
                <div class="w-96 text-center relative" v-for="user in users">
                    <img class="w-48 h-48 rounded-full mx-auto -mb-24" src="/images/profileImages/default_profile_picture.jpg" alt="Avatar Damien Marley"/>
                    <div class="bg-white shadow-lg rounded-lg px-8 pt-32 pb-10 text-gray-400">
                        <h3 class="font-title text-gray-800 text-xl flex items-center justify-center items-strech">
                            <span class="mr-1 text-lg">{{user.full_name}}</span>
                            <!-- Verfication icon starts -->
                            <svg 
                            v-show="user.is_verified"
                            xmlns="http://www.w3.org/2000/svg" 
                            class="h-4 w-4 self-center fill-blue-400" viewBox="0 0 20 20" 
                            fill="currentColor">
                                 <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <!-- Verfication icon Ends -->
                        </h3>
                        <p class="font-body mb-3">
                            {{user.username}}
                        </p>
                        <!-- Profession name -->
                        <p class="font-body text-sm mb-4 flex justify-center items-center flex-stretch">
                            <span class="mr-1 ">
                                <svg class="h-5 w-5"
                                    viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1254 29.6236C17.8971 29.1592 17.3814 28.9083 16.8786 29.0309C11.4745 30.3492 6 33.0372 6 37.0809V44H16V34C16 33.4477 16.4477 33 17 33C17.5523 33 18 33.4477 18 34V44H30V34C30 33.4477 30.4477 33 31 33C31.5523 33 32 33.4477 32 34V44H42V37.0809C42 33.0372 36.5255 30.3492 31.1214 29.0309C30.6186 28.9083 30.1029 29.1592 29.8746 29.6236L25.8105 29.8958L22.1893 29.8955L18.1254 29.6236Z" fill="#333333"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25 4.91406C26.0674 5.05142 27.0785 5.40145 28 5.8952V8.99958C28 9.55187 28.4477 9.99958 29 9.99958C29.5523 9.99958 30 9.55187 30 8.99958V7.30074C31.2334 8.4022 32.1606 9.73931 32.6383 11.0162C32.6565 11.4852 32.6057 11.9698 32.5138 12.4412C32.3972 13.0396 32.2213 13.5777 32.0735 13.9675C31.9999 14.1617 31.934 14.3173 31.8871 14.423C31.8636 14.4758 31.845 14.5161 31.8326 14.5424L31.8189 14.5712L31.8154 14.5783C31.6807 14.8503 31.7918 15.18 32.0637 15.315C32.3358 15.4501 32.6658 15.339 32.8009 15.0669L32.3158 14.8261C32.8009 15.0669 32.8012 15.0663 32.8013 15.0662L32.8019 15.065L32.8035 15.0616L32.8089 15.0505L32.8276 15.0113C32.8434 14.9779 32.8655 14.93 32.8926 14.8691C32.9466 14.7473 33.0204 14.5729 33.1021 14.3575C33.2649 13.928 33.4617 13.3281 33.5935 12.6516C33.6163 12.5346 33.6374 12.414 33.6561 12.2904C34.5129 13.4107 35 14.5716 35 15.5747C35 18.7641 30.0751 19.1497 24 19.1497C17.9249 19.1497 13 18.7641 13 15.5747C13 14.6346 13.4278 13.556 14.1868 12.502C14.1542 13.3989 14.333 14.3435 14.9369 15.1757C15.1172 15.4241 15.4608 15.4827 15.7044 15.3067C15.9481 15.1306 15.9994 14.7865 15.8191 14.5381C15.1018 13.5497 15.1944 12.2339 15.5559 11.0415C15.7318 10.461 15.9606 9.94772 16.1466 9.57826C16.2393 9.39423 16.3204 9.24764 16.3776 9.14826C16.4062 9.09861 16.4288 9.06086 16.4437 9.03624L16.4603 9.00933L16.4644 9.00269C16.4691 8.99535 16.4735 8.98793 16.4778 8.98044C16.9075 8.38893 17.4199 7.81877 18 7.30073V8.99958C18 9.55187 18.4477 9.99958 19 9.99958C19.5523 9.99958 20 9.55187 20 8.99958L20 5.89519C20.9215 5.40145 21.9326 5.05142 23 4.91406V6.99958C23 7.55187 23.4477 7.99958 24 7.99958C24.5523 7.99958 25 7.55187 25 6.99958V4.91406Z" fill="#333333"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17 18C17 21.866 20.134 25 24 25C27.866 25 31 21.866 31 18H33C33 22.9706 28.9706 27 24 27C19.0294 27 15 22.9706 15 18H17Z" fill="#333333"/>
                                </svg>
                            </span>
                            <span class="text-sm font-semibold ">{{user.profession}}</span>
                        </p>
                        <!-- review and go to profile link-->
                        <div class="flex items-center items-stretch absolute left-0 pl-4">
                           <!-- icons -->
                               <div class="flex mr-1 self-center">
                                    <svg v-for="item in float2int(user.review_score)"
                                        class="w-4 h-4"
                                    viewBox="0 -32 576 576" xmlns="http://www.w3.org/2000/svg"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg>
                                    <!-- half a star -->
                                    <svg v-if="!isInt(user.review_score)"
                                        class="w-4 h-4"
                                        viewBox="0 -12 536 536" xmlns="http://www.w3.org/2000/svg"><path d="M508.55 171.51L362.18 150.2 296.77 17.81C290.89 5.98 279.42 0 267.95 0c-11.4 0-22.79 5.9-28.69 17.81l-65.43 132.38-146.38 21.29c-26.25 3.8-36.77 36.09-17.74 54.59l105.89 103-25.06 145.48C86.98 495.33 103.57 512 122.15 512c4.93 0 10-1.17 14.87-3.75l130.95-68.68 130.94 68.7c4.86 2.55 9.92 3.71 14.83 3.71 18.6 0 35.22-16.61 31.66-37.4l-25.03-145.49 105.91-102.98c19.04-18.5 8.52-50.8-17.73-54.6zm-121.74 123.2l-18.12 17.62 4.28 24.88 19.52 113.45-102.13-53.59-22.38-11.74.03-317.19 51.03 103.29 11.18 22.63 25.01 3.64 114.23 16.63-82.65 80.38z"/>
                                    </svg>
                                       <!-- empty star -->
                                        <svg    v-for="item in emptystar(user.review_score) - float2int(user.review_score) "
                                                class="w-4 h-4"  
                                                viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="var(--ci-primary-color, currentColor)" d="M494,198.671a40.536,40.536,0,0,0-32.174-27.592L345.917,152.242,292.185,47.828a40.7,40.7,0,0,0-72.37,0L166.083,152.242,50.176,171.079a40.7,40.7,0,0,0-22.364,68.827l82.7,83.368-17.9,116.055a40.672,40.672,0,0,0,58.548,42.538L256,428.977l104.843,52.89a40.69,40.69,0,0,0,58.548-42.538l-17.9-116.055,82.7-83.368A40.538,40.538,0,0,0,494,198.671Zm-32.53,18.7L367.4,312.2l20.364,132.01a8.671,8.671,0,0,1-12.509,9.088L256,393.136,136.744,453.3a8.671,8.671,0,0,1-12.509-9.088L144.6,312.2,50.531,217.37a8.7,8.7,0,0,1,4.778-14.706L187.15,181.238,248.269,62.471a8.694,8.694,0,0,1,15.462,0L324.85,181.238l131.841,21.426A8.7,8.7,0,0,1,461.469,217.37Z"/>
                                        </svg>
                                </div>
                                <!-- Reviews -->
                                <span class="text-sm self-end mr-1">{{user.review_score}}</span>
                                <div class="before:content-['('] after:content-[')'] before:mr-0.5 after:ml-0.5 after:text-sm before:text-sm">
                                    <span 
                                    class="text-xs underline underline-offset-0 self-center cursor-pointer"
                                    >
                                    {{ user.comments_count > 1 ? user.comments_count+' reviews' : user.comments_count+' review' }}
                                    </span>
                                </div>  
                        </div>
                          <div class="flex items-center cursor-pointer absolute right-0 pr-4">
                                    <router-link :to="{name:'profile', query:{ username: user.username }}" class=" text-blue-600 hover:text-blue-800 text-base mr-0.5 tracking-wide">Profile</router-link>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                         <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                            </div>  
                    
                    </div>
            </div>
                
            <!-- This is an example component -->
    </section>
 </div><!-- </container> -->
</div> 
</template>
<script>
import filters from './filters'
import header from './header'
import footer from './footer'
export default {
    components:{
        'C-filter' : filters,
        'c-header' : header,
        'c-footer' : footer
    },
    data(){
        return{
            isToolTipHover:1,
            users:undefined,
            city:'',
            profession:'',
            Onlyverified:undefined 
            
        }
    },
    methods:{
        // ? get int from float (comments_score)
        float2int(value){
            return value | 0;
        },
         isInt(value) {
           return value % 1 === 0 ;
        },
        emptystar(value){
            if(value % 1 === 0){
                return 5
            }
            else{
                return 4
            }
           
        },
        getcity:function(value){
         this.city = value
        },
        getprofession:function(value){
         this.profession = value
        },
        getcheckboxvalue:function(value){
            this.Onlyverified = value
        },
        // * Get all users with profession
        gettalents:function(){
            axios.get('/api/talents').then(response => [ this.users = response.data, console.log(response)] )
        },
        // * filter users 
        filterusers:function(){
            axios.get('/api/filter-talents',{
                params:{
                city:this.city.id ? this.city.id : '' ,
                profession:this.profession.id ? this.profession.id : '' ,
                verfied:this.Onlyverified ? this.Onlyverified : false 
                }
            }).then(response => [ console.log(response)] )
        }
      
   

     
   },
    mounted(){
        this.gettalents()
    } 
}
</script>
