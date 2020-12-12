<template>
    <div>
        <h2 class="text-center p-2 text-white bg-primary mt-5">Update Contact</h2>
        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form id="validateForm" @submit.prevent="updateContact" enctype="multipart/form-data" novalidate>

                    <div class="alert alert-danger" v-if="errors.length">
                         <ul class="mb-0">
                             <li v-for="(error, index) in errors" :key="index">
                                 {{ error }}
                             </li>
                         </ul>
                     </div> 

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  v-model="contact.name"
                            placeholder="Enter Name">
                    </div>


                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="contact.email"
                            placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control" v-model="contact.designation"
                            placeholder="Enter Designation">
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" class="form-control" v-model="contact.contact_no"
                            placeholder="Enter Contact Number">
                    </div>

                    <div class="form-group">
                        <label>Biography</label>
                        <textarea  v-model="contact.bio" id="" cols="20" rows="5"
                            class="form-control"></textarea>
                    </div>


                    <div class="form-group" v-if="contact.image">
                        <img :src="`${asset_url+'/'+ contact.image}`">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile"
                                v-on:change="onImageChange">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>

                    <button class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>



<script>
    export default {

        data() {
            return {
                asset_url: document.head.querySelector('meta[name="asset_url"]').content,
                url: document.head.querySelector('meta[name="url"]').content,
                contacts: [],
                contact: {},
                name: '',
                email: '',
                bio: '',
                designation: '',
                image: '',
                errors: []
            }
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData() {
                let url = this.url + `/api/get_contact/${this.$route.params.id}`;
                this.axios.get(url).then((response) => {
                    this.contact = response.data;

                });
            },
            updateContact() {

                this.errors = [];

                if (!this.contact.name) {
                    this.errors.push('Name is required');
                }

                if (!this.contact.email) {
                    this.errors.push('Email is required');
                }

                if (!this.contact.designation) {
                    this.errors.push('Designation is required');
                }

                if (!this.contact.contact_no) {
                    this.errors.push('Contact Number is required');
                }

                if (!this.errors.length) {

                let formData = new FormData();
                formData.append('name', this.contact.name);
                formData.append('email', this.contact.email);
                formData.append('image', this.image);
                formData.append('designation', this.contact.designation);
                formData.append('bio', this.contact.bio);
                formData.append('contact_no', this.contact.contact_no);
                let url = this.url + `/api/update_contact/${this.$route.params.id}`;


                this.axios.post(url, formData).then((response) => {
                    if (response.status) {
                        this.$utils.showSuccess('Success', response.message);
                        this.$router.push({
                            name: 'contacts'
                        });
                    } else {
                        this.$utils.showEror('Error', response.message);
                    }
                }).catch(error => {
                        this.errors.push(error.response.data.error);
                    });
                }
            },
            onImageChange(e) {
                this.image = e.target.files[0];
            },
        },
        mounted: function () {
            console.log('Contact Component Loaded...');

        }
    }

</script>
