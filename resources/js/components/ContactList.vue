<template>
    <div>
        <h2 class="text-center p-2 text-white bg-primary mt-5">Contacts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Contact Number</th>
                    <th class="co">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">123</th>
                    <td>asdsad</td>
                    <td>asdasdsad</td>
                    <td>asdsadsadsad</td>
                    <td>12321321331</td>
                    <td>
                        <button class="btn btn-danger btn-sm">Delete</button>
                        <router-link class="btn btn-primary btn-sm">Edit</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>




<script>
    export default {
        created() {
            // this.loadData();
        },
        methods: {
            // loadData() {
            //     let url = this.url + '/api/getContacts';
            //     this.axios.get(url).then(response => {
            //     this.contacts = response.data
            //     });
            // },
            // deleteContact(id) {
            //     let url = this.url + `/api/deleteContact/${id}`;
            //     this.axios.delete(url).then(response => {
            //           if(response.status){
            //             this.loadData();
            //             this.$utils.showSuccess('Success', response.message);
                 
            //         } else{
            //             this.$utils.showEror('Error', response.message);
            //         }
            //     });
            // }
        },
        mounted() {
            console.log('Contacts List Component mounted');
        },
        data() {
            return {
                asset_url: document.head.querySelector('meta[name="asset_url"]').content,
                url: document.head.querySelector('meta[name="url"]').content,
                contacts: []
            }
        }
    }

</script>
