<template>
<div>
    <h1>Dashboard</h1>
    <button @click.prevent="logout">Logout</button>
    <br>
    <!-- <div v-if="user">
        Name: {{user.name}} <br>
        Email: {{user.email}}<br><br>
        <button @click.prevent="logout">Logout</button>
    </div> -->
    <!-- Name: {{user.name}} <br>
    Email: {{user.email}} -->
</div>
</template>

<script>

export default {
    data(){
        return{
            users: []
        }
    },
    methods:{
        logout(){
            axios.post('/api/logout', {
                headers: {
                    Authorization:localStorage.getItem('SavedToken')
                }
            }).then(()=>{
                this.$router.push({ name: "Home"})
            })
        }
    },
    /* mounted(){
        axios.get('/api/user').then((res)=>{
            this.user = res.data
        })
    } */
}
</script>
