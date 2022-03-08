import indexpage from "../vue/index"
import profile from "../vue/components/index/userprofile"
import joboffers from "../vue/components/userdashboard/userdataview"
import talents from "../vue/components/index/usercardlist"
import settings from "../vue/components/userdashboard/settings"
import userinfo from "../vue/components/userdashboard/userinfo"
import comments from "../vue/components/index/comments.vue"
import chat from '../vue/components/userdashboard/chatbox.vue'
import alert from '../vue/admin/components/alert.vue'
export default{
    mode: 'history',

    routes:[
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
        // ! to remove after finishing
        {
            path:'/alert', 
            component:alert,
        },

    ] 

}