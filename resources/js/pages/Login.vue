<template>
    <div class="container">
        <div class="card-header">
            Login
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
          
                      v-model="name"
                      placeholder="Enter Name">
                </div>


            <div class="form-group">
                <label>Password</label>
                <input type="password"
                   class="form-control"
       
                   v-model="password"
                   placeholder="Enter Password">
            </div>


            <button class="btn btn-primary mt-4">Login</button>
        </form>
            </div>
        </div>
    </div>
</template>



<script>
    export default {
        name:'login',
        props: ['app'],
        data() {
            return {
                name: '',
                password: '',
        
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


                if(!this.errors.length) {
    
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('password', this.email);
                let url = this.url+'/auth/login';
                this.axios.post(url, formData).then((response) => {
                     if(response.status){
                           this.$router.push("/");
                        this.$utils.showSuccess('Success', response.message);
                    } else{
                        this.$utils.showEror('Error', response.message);
                    }
                    }).catch(error => {
                        this.errors.push(error.response.data.error);
                    });
                }
            }
        }
    }
</script>