<template>
<div>
    <h1>Dashboard</h1>
    <br>
    <!-- Name: {{user.name}} <br>
    Email: {{user.email}} -->
</div>
</template>

<script>

export default {
    data(){
        return{
            user: null
        }
    },
    mounted(){
        axios.get('/api/user').then((res)=>{
            this.user = res.data
        })
    }
}
</script>
