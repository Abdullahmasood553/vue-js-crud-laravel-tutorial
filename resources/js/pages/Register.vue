<template>
    <div class="container">
        <div class="card-header">
            Register
        </div>

        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                 <form v-on:submit.prevent="onSubmit">
                     <div class="alert alert-danger" v-if="errors.length">
                         <ul class="mb-0">
                             <li v-for="(error, index) in errors" :key="index">
                                 {{ error }}
                             </li>
                         </ul>
                     </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text"
                      class="form-control"
                      name="name"  
                      v-model="name"
                      placeholder="Enter Name">
                </div>


            <div class="form-group">
                <label>Password</label>
                <input type="password"
                   class="form-control"
                    name="password"
                   v-model="password"
                   placeholder="Enter Password">
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" 
                 class="form-control"
                 v-model="passwordAgain"
                 placeholder="Password Again">
            </div>

            <button class="btn btn-primary mt-4">Register</button>
        </form>
            </div>
        </div>
    </div>
</template>



<script>
    export default {
        name:'register',
        props: ['app'],
        data() {
            return {
                name: '',
                password: '',
                passwordAgain: '',
                asset_url: document.head.querySelector('meta[name="asset_url"]').content,
                url: document.head.querySelector('meta[name="url"]').content,
                user: {},
                errors: []
            }
        },
        methods: {
            onSubmit() {
                this.errors = [];

                if(!this.name) {
                    this.errors.push('Name is required');
                }

                if(!this.password) {
                    this.errors.push('Password is required');
                }

                 if(!this.passwordAgain) {
                    this.errors.push('Password Confirmation is required');
                }

                if(this.password !== this.passwordAgain) {
                    this.errors.push('Password do not match');
                }

                if(!this.errors.length) {
                    // const data = {
                    //     name: this.name, 
                    //     password: this.password
                    // }

                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('password', this.email);
                formData.append('passwordAgain', this.email);

                let url = this.url+'/auth/register';
                this.axios.post(url, formData).then((response) => {
                    this.$router.push("/");
                    }).catch(error => {
                        this.errors.push(error.response.data.error);
                    });
                }
            }
        }
    }
</script>