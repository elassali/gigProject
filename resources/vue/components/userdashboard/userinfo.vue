<template>
<div>

    <c-header></c-header>

            <div v-if="userdata" class="bg-gray-100">
                <div class="container mx-auto my-5 p-5">
                    <div class="md:flex no-wrap md:-mx-2 ">
                        <!-- Left Side -->
                        <div class="w-full md:w-3/12 md:mx-2">
                            <!-- Profile Card -->
                            <div class="bg-white p-3 border-t-4 border-green-400">
                                <div class="relative image overflow-hidden rounded-full">
                                    <img class="h-80 w-full mx-auto rounded-full"
                                        :src="imagepreview ? imagepreview : image" 
                                        alt="Profile Picture"
                                    >
                                    <div :class="editmode ? ' ease-in duration-300 opacity-100 absolute text-center  top-3/4  w-full h-full flex justify-center bg-black opacity-70' : 'hidden'">
                                        <div class="relative underline text-secondary">
                                        click to edit
                                        <input v-on:change="getfilename" type="file" class="absolute w-full h-full opacity-0 top-0 left-0 cursor-pointer"/>
                                        </div>
                                    </div>
                                </div> 
                                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{userdata.name+' '+userdata.lastname}}</h1>
                                <h3 class="text-gray-600 font-lg text-semibold leading-6">{{'@'+userdata.username}}</h3>
                                <ul
                                    class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                    <li class="flex items-center py-3">
                                        <span>Status</span>
                                        <span class="ml-auto"><span
                                                class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                                    </li>
                                    <li class="flex items-center py-3">
                                        <span>Member since</span>
                                        <span class="ml-auto">Nov 07, 2016</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- End of profile card -->
                            <div class="my-4"></div>
                        
                        </div>
                        <!-- Right Side -->
                        <div class="w-full md:w-9/12 mx-2 h-64">
                            <!-- Profile tab -->
                            <!-- About Section -->
                            <div class="bg-white p-3 shadow-sm rounded-sm">
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-4 border-b justify-between">

                                        <div class="flex items-center ">
                                            <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            </span>
                                            <span class="tracking-wide">About</span>
                                        </div>
                                        
                                        <div
                                            class="cursor-pointer">
                                            <svg v-on:click="editmode = !editmode" xmlns="http://www.w3.org/2000/svg" :class="!editmode ? 'h-5 w-5' : 'hidden'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <div class="fles items-center">
                                                <a @click="updateuserdata" :class="editmode ? 'text-blue-600 text-xs' : 'hidden'">Save Change</a>
                                                <a @click="[editmode = false , imagepreview = false, image = oldimagevalue ]" :class="editmode ? 'text-red-600 text-xs' : 'hidden'">Cancel</a>
                                            </div>    
                                        </div>
                                        
                                        
                                </div>
                                    
                                <div class="text-gray-700">
                                    <div class="grid md:grid-cols-2 text-sm">
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">First Name</div>
                                            <div>
                                                    <c-baseinput
                                                    v-model="userdata.name"
                                                    :disabled="!editmode"
                                                    :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white border-none	'"
                                                    ></c-baseinput>
                                                </div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Last Name</div>
                                            <div>
                                                    <c-baseinput
                                                    v-model="userdata.lastname"
                                                    :disabled="!editmode"
                                                    :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white border-none	'"
                                                    ></c-baseinput>
                                                </div>
                                        </div>
                                
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Contact No.</div>
                                            <div>
                                                    <c-baseinput
                                                    v-model="userdata.phone"
                                                    :disabled="!editmode"
                                                    :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white border-none	'"
                                                    ></c-baseinput>
                                                </div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">City</div>
                                            <div>
                                                    <c-baseinput
                                                    v-model="userdata.city"
                                                    :disabled="!editmode"
                                                    :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white border-none	'"
                                                    ></c-baseinput>
                                                </div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Email</div>
                                            <div>
                                                    <c-baseinput
                                                    v-model="userdata.email"
                                                    :disabled="!editmode"
                                                    :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white border-none'"
                                                    ></c-baseinput>
                                                </div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Birthday</div>
                                            <div>
                                                    <template v-if="editmode">
                                                        <c-basedatepiker
                                                        v-model="dateformat"
                                                        v-on:dateComponentvalue="DateFromDateComponent"
                                                        >                                       
                                                        </c-basedatepiker>
                                                    </template>
                                                    <template v-else>
                                                        <div>{{userdata.date_of_birth}}</div> 
                                                    </template>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ! ============================================== -->
                                <div :class="moreinfo ? 'flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-4 border-b border-t py-2 justify-between' : 'hidden'">

                                        <div class="flex items-center ">
                                            <span clas="text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                        </svg>
                                            </span>
                                            <span class="tracking-wide">My Professions</span>
                                        </div>
                                        <div class="flex items-center">
                                            <!-- select option-->
                                            <template v-if="addprofession">
                                            <c-baseselect
                                                :isdesabeld="!editmode"
                                                v-model="jobtoadd"
                                                :selections="allprofession"
                                                v-on:sendittoparent="getvalueofjob"
                                                >
                                                </c-baseselect> 
                                            </template>    
                                                <!-- Actions -->
                                            <button @click="addprofession = true" :class="addprofession == false ? 'text-sm text-blue-400 ml-2' : 'hidden'">Add New Profession</button>
                                            <div :class="addprofession  ? '' : 'hidden' ">
                                                <button @click="addprofessiontouser()" class="text-sm text-green-400 ml-2">Save</button>
                                                <button @click="addprofession = false" class="text-sm text-red-400 ml-2">Cancel</button>

                                            </div>
                                        </div>                        
                                        
                                </div>
                                <div class="text-gray-700">
                                    <div class="grid md:grid-cols-2 text-sm">
                                    <!-- Display mode -->
                                        <div v-if="!editmode" v-for="item in userprofession" :key="item.id" class="grid grid-cols-2 flex items-center">

                                            <div class="px-4 py-2 font-semibold">Job title</div>
                                                <div class="flex items-center ">
                                                <!-- view mode -->
                                                <span :class="updateprofession ? 'hidden':'mr-4'">{{item.title}}</span>
                                                <!-- Update mode -->
                                                    <div :class="updateprofession ? 'flex mr-4' :'hidden'">
                                                        <c-baseselect
                                                        v-model="item.title"
                                                        :selections="allprofession"
                                                        v-on:sendittoparent="getvalueofjob"
                                                        >
                                                        </c-baseselect> 
                                                    </div>
                                                    <!-- action buttons before update is on -->
                                                    <div class="flex items-center">
                                                        <button @click="updateprofession = true" :class="updateprofession ? 'hidden' : 'text-xs text-blue-400'">Update</button>
                                                        <button @click="detachprofession(item.id)" :class="updateprofession ? 'hidden' : 'text-xs text-red-400 ml-2'">Delete</button>
                                                    </div>     
                                                    <!-- action buttons after update is on -->
                                                    <div class="flex items-center">
                                                        <button
                                                        @click="updateProfession(item.id)"
                                                        :class="updateprofession ? 'text-xs text-green-400' : 'hidden'">Save
                                                        </button>
                                                        <button @click="updateprofession = false" :class="updateprofession ? 'text-xs text-red-400 ml-2' : 'hidden'">Cancel</button>
                                                    </div>     
                                            </div>                                   
                                        </div>
                                    </div>
                                    <!-- display mode end -->
                                    <!-- ############################## -->
                                    <!-- edit mode -->
                                        <div v-if="editmode" v-for="item in userprofession" class="grid grid-cols-2 flex items-center">
                                            <!-- select input-->
                                            <div  class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Job title</div>
                                                    <div>
                                                        <c-baseselect
                                                        v-model="item.title"
                                                        :selections="allprofession"
                                                        >
                                                        </c-baseselect> 
                                                    </div>
                                        </div>
                                            
                                        </div>
                                    </div>
                                    <!-- edit mode end -->
                                    <button
                                    @click="moreinfo = !moreinfo"
                                    class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4"
                                    >
                                    Show Full Information
                                </button>
                                </div> 

                            <!-- ============================================== -->

                            
                            </div>
                            <!-- End of about section -->
            
                            <div class="my-4"></div>

                        
                            <!-- End of profile tab -->
                        </div>
                    </div>
                </div>
            </div>
</template>
<script>
import inputfloatlabel from '../../admin/components/inputs/baseinput'
import basedatepiker from '../../admin/components/inputs/basedatetime'
import basesetelect from '../../admin/components/inputs/baseselectinput'
import header from './header'
export default {
    components:{
        'c-baseinput' : inputfloatlabel, 
        'c-basedatepiker' : basedatepiker,
        'c-baseselect' : basesetelect,
        'c-header' : header
    },
    data(){
        return{
        editmode: false,
        userdata:undefined,
        datefromcoponent:undefined,
        userprofession:undefined,
        moreinfo:false,
        jobtoadd:"Select your job",
        jobtoadd_id:undefined,
        addprofession:false,
        allprofession:undefined,
        updateprofession:undefined,
        image:"/images/profileImages/default_profile_picture.jpg",
        imagepreview:undefined,
        oldimagevalue:undefined
        }
    },
    methods:{
        getuserinfo:function(){
            try{
                  axios.get('/api/my-information')
                 .then(response => 
                    [this.userdata = response.data.data, this.datefromcoponent = response.data.date_of_birth, this.userprofession = response.data.userprofession, this.allprofession = response.data.allprofession, this.imagepreview = response.data.profilePicture ]
                 )
                 .catch(e => console.log(e))  
               
            }catch(e){
                console.log(e)
            }

        },
        // ? retrive date from datecomponent
         DateFromDateComponent:function(value){
            this.datefromcoponent = value
        },
        // ? retrieve data from select component
        getvalueofjob:function(value){
            this.jobtoadd = value[0]
            this.jobtoadd_id = value[1]
            console.log(value)
        },
        // ? retireive uploaded file
          getfilename:function(event){
            this.oldimagevalue = this.image; 
            this.image = event.target.files[0]
            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e =>{
                this.imagepreview = e.target.result
            }
            console.log(this.image)
        },
        // ? Profession methods crud start
        addprofessiontouser:function(){
            axios.post('/api/user/profession/new',{
                professionName: this.jobtoadd_id
            }).then(this.getuserinfo) 
              .catch(e => console.log(e))
        }, 
        detachprofession:function(jobid){
             axios.delete('/api/user/profession/delete',{data:{professionName:jobid}})
                 .then(this.getuserinfo)
                 .catch(e => console.log(e))
        },
        updateProfession:function(oldjobid){
            axios.put('/api/user/profession/update',{oldprofeesion:oldjobid,newprofession:this.jobtoadd })
                 .then([this.updateprofession = false, this.getuserinfo])
                 .catch(e => console.log(e))   
            
        },
        // ? Profession methods crud ends
        // ? update user data
        updateuserdata:function(){
            const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
            let data = new FormData()
            data.append('profilePicture',this.image)
            data.append('firstName',this.userdata.name)
            data.append('lastname',this.userdata.lastname)
            data.append('city',this.userdata.city)
            data.append('email',this.userdata.email)
            data.append('birthDay',this.userdata.date_of_birth)
            data.append('username',this.userdata.username)
            axios.post('/api/user/profile/update',data,config)
                .then([this.editmode = false,this.getuserinfo])
                .catch(e => console.log(e)) 
        }
     
    },
    computed:{
        dateformat:function(){
            if(this.datefromcoponent instanceof Date){
              return this.datefromcoponent.toLocaleString('en-NZ',{year:'numeric',month:'long',day:'numeric'})
            } 
        }
    },
    mounted(){
        this.getuserinfo();
    }
}
</script>