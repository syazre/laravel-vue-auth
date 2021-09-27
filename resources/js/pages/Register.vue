<template>
<div>
    <h1>Register an account</h1>
    <div>
        <label for="name">Name</label>
        <!-- <span class="text-red-500" v-if="errors.name">{{errors.name[0]}}</span> -->
        <input placeholder="Name" type="text" v-model="form.name">
    </div>
    <div>
        <label for="email">Your email</label>
        <input placeholder="Email" type="email" v-model="form.email">
    </div>
    <div>
        <label for="password">Password</label>
        <input placeholder="Password" type="password" v-model="form.password" name="password">
    </div>
    <div>
        <label for="confirm_password">Confirm Password</label>
        <input placeholder="Confirm Password" type="password" v-model="form.password_confirmation" name="password_confirmation">
    </div>
    <div>
        <button @click.prevent="saveForm" type="submit">Register</button>
    </div>
</div>
</template>

<script>

export default {
    data(){
        return{
            form:{
                name: '',
                email: '',
                password:'',
                password_confirmation:''
            },
            errors:[]
        }
    },
    methods:{
        saveForm(){
            axios.post('/api/register', this.form).then(() =>{
                console.log('saved');
            }).catch((error) =>{
                this.errors = error.response.data.errors;
            })
        }
    }
}
</script>
