<template>
<div>
    <h1>Profile</h1>
    <div>
        <label for="name">Company Name</label>
        <input placeholder="Company Name" type="text" v-model="form.company">
    </div>
    <div>
        <label for="email">Phone Number</label>
        <input placeholder="Phone Number" type="text" v-model="form.phone">
    </div>
    <div>
        <button @click.prevent="saveForm" type="submit">Save</button>
    </div>
</div>
</template>

<script>

export default {
    data(){
        return{
            form:{
                company: '',
                phone: '',
            },
            errors:[]
        }
    },
    methods:{
        saveForm(){
            axios.post('/api/profile', this.form).then(() =>{
                console.log('profile saved');
            }).catch((error) =>{
                this.errors = error.response.data.errors;
            })
        }
    }
}
</script>