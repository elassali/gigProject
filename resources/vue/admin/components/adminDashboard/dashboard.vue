<template>
    <div class="w-full flex">
        <c-sidebar></c-sidebar>

        <c-users></c-users>
    </div>

</template>

<script>
import sidenav from './components/sidebare'
import users from './components/adminUsers'
export default {
    components:{
        'c-sidebar' : sidenav,
        'c-users' : users
    }
}
</script>