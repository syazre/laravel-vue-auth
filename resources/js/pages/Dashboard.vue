<template>
<div>
    <h1>Dashboard</h1>
    <br>
    <div v-for="user in users" :key="user.id">
        Name: {{user.name}}
    </div>
    <button @click.prevent="logout">Logout</button>
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
            axios.post('/api/logout').then(()=>{
                this.$router.push({ name: "Home"})
            })
        }
    },
    mounted(){
        axios.get('/api/users').then((res)=>{
            this.users = res.data
        })
    }
}
</script>
