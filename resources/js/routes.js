 // * ==================================== for users ========================================
import indexpage from "../vue/index"
import profile from "../vue/components/index/userprofile"
import joboffers from "../vue/components/userdashboard/userdataview"
import talents from "../vue/components/index/usercardlist"
import settings from "../vue/components/userdashboard/settings"
import userinfo from "../vue/components/userdashboard/userinfo"
import comments from "../vue/components/index/comments.vue"
import chat from '../vue/components/userdashboard/chatbox.vue'
import galleryManager from '../vue/components/userdashboard/galeryManager.vue'
import galleryDisplay from '../vue/components/userdashboard/galleydisplay.vue'

 // * ==================================== for Amins ========================================
 import adminformlayout from '../vue/admin/components/adminDashboard/dashboard.vue'



export default{
    mode: 'history',

    routes:[
        // * ==================================== for users ========================================
        {
            path: '/',
            component:indexpage,
            name:'index'
        }, 
        {
            path:'/profile',
            component:profile,
            name:'profile'
        },
        {
            path:'/account/my-jobs-offers', 
            component:joboffers,
            name:'myJobOffers'
        },
        {
            path:'/talent-hire',
            component:talents
        },
        {
            path:'/account',
            component:settings,
            name:'account'
        },
        {
            path:'/account/user-info',
            component:userinfo,
            name:'UserInfo'
        },
        {
            path:'/comments',
            component:comments,
        },
        {
            path:'/conversations', 
            component:chat,
            name:'chat'
        },
        {
            path:'/galery',
            component:galleryManager,
            name:'galleryManager'
        },
        {
            path:'/portfolio',
            component:galleryDisplay,
            name:'galleryDisplay'
        },
         // * ==================================== for Admins ========================================
        {
            path:'/admin',
            component:adminformlayout
        }
       

    ] 

}