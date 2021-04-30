<template>
    <div>
        <form @submit="formSubmit">
            <button v-if="show" type="submit" class="btn btn-success" style="width: 100%;">Apply</button>
        <div v-else class="alert alert-success">
            Application sent successfully
        </div>
        </form>
    </div>
</template>

<script>
    export default {
        props:["jobid"],
        mounted() {
            console.log('Apply Component mounted.')
        },
        data(){
            return {
                'show': true
            }
        }, 
        methods: {
            formSubmit(e) {
                e.preventDefault();
                console.log('submit');
                axios.post('/applications/' + this.jobid,{

                }).then(response => this.show = false);
            }
        } 
    }
</script>