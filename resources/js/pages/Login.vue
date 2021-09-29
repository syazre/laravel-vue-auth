<template>
<div>
    <h1>Login to your account</h1>
    <div>
        <label for="email">Your email</label>
        <input placeholder="Email" type="email" v-model="form.email">
    </div>
    <div>
        <label for="password">Password</label>
        <input placeholder="Password" type="password" v-model="form.password" name="password">
    </div>
    <div>
        <button @click.prevent="loginUser" type="submit">Login</button>
    </div>
</div>
</template>

<script>

export default {
    data() {
        return{
            form: {
                email: '',
                password: ''
            },
            errors: []
        }
    },
    methods: {
        loginUser() {
            axios.post('/api/login', this.form).then(response =>{
                let token = response.data.token;
                localStorage.setItem("SavedToken", 'Bearer ' + token);
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                this.$router.push({name: "Dashboard"});
            }).catch((error) => {
                this.errors = error.response.data.errors;
            })

            /* axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/login', this.formData).then(response => {
                    this.getSecrets();
                }).catch(error => console.log(error)); // credentials didn't match
            }); */

        }
        
    }
}
</script>
