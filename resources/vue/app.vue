<template>

<div>
  <home-admin>
            <admin-form
            :dataload="userses" 
            v-on:datafromthirdondchild="Imagefromcomponent"
            v-on:datecomponentdate="DateFromDateComponent"
            >
            
            </admin-form>
</home-admin>
</div>
      

</template>
<script>
import homeadmin from './admin/home'
import adminformlayout from './admin/components/adminformlayout'
// for components test purpose
export default {
   
    components:{
        'admin-form': adminformlayout,
        'home-admin': homeadmin,
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
                password:{
                    inputType:"password",
                    data:"",
                    label:"Password",
                    colSpace:"md:col-span-2"
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
                image:{
                    inputType:"file",
                    data:"",
                    label:"Upload Your image",
                    colSpace:"md:col-span-5"
                }

              },
              userses:[]
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
        }

      
    },
    mounted(){
        this.loadData()
    }
 
}
</script>