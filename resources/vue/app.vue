<template>

        <div>
                <template v-if="islogedin">
                        <c-userheader></c-userheader>
                </template>
                <template v-esle>            
                        <c-header></c-header>
                </template>
               <c-home-page
               >
               </c-home-page> 
        
        </div>   
      

</template>
<script>
import homeadmin from './admin/home'
import adminformlayout from './admin/components/adminformlayout'
import homepage from './home_page'
import indexheader from "./components/index/header"
import userheader from "./components/userdashboard/header"
// for components test purpose
export default {
   
    components:{
        'admin-form': adminformlayout,
        'home-admin': homeadmin,
        'c-home-page' : homepage,
        'c-header' : indexheader,
        'c-userheader' : userheader
    },
    // props:["notificationbar","menuopen"],
     data() {
        return {
              user:{
                name:{ 
                    inputType:"text",
                    data:"",
                    label:"First name",
                    colSpace:"md:col-span-3"
                },
                lastname:{
                    inputType:"text" ,                   
                    data:"",
                    label:"Last name",
                    colSpace:"md:col-span-2"
                },
                email:{
                    inputType:"email",
                    data:"",
                    label:"Email",
                    colSpace:"md:col-span-3"
                },
                city:{
                    inputType:"text", 
                    data:"",
                    label:"City",
                    colSpace:"md:col-span-3"
                },
                dateOfBirth:{
                    inputType:"date",
                    data:"",
                    label:"Date of birth",
                    colSpace:"md:col-span-2"
                },
              },
              userses:[],
              islogedin:undefined,
            // ! ====================================>
              
        };
    },
    methods:{
        
        Imagefromcomponent:function(value){
            console.log(value.name)
        },

        DateFromDateComponent:function(value){
            this.user.dateOfBirth.data = value
        },

        // ! ------------------ all the above is good for now----------------------------
        // ! ------------------ devlopement area----------------------------
        target_table:function(){
            // let data = Object.entries(this.user)
            // console.log(data)
            // console.log(data[0][1].inputType)
        //    console.log(Object.keys(this.user).length);  
         
        },
        loadData:function(){
             
          axios.get('api/users') 
            .then(
                response=>(this.userses = response.data)
                //    response=>(console.log(response.data))                  
            ).catch(function(error){
                console.log(error)
            });
        },
     

       

    },
    mounted(){
        axios.get('api/check').then(
           response => ( this.islogedin = response.data.isconnected)

        )
    }
 
}
</script>