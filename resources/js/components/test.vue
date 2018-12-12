<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" v-for="myclass in classes">
             {{myclass.name}}
            </div>

            <div>
                add new class

                <textarea name="body"  cols="30" rows="1" v-model="classBox">

                </textarea>
                <button class="btn btn-success" @click.prevent="postClasses">save class</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                classes: [],
                classBox: '',

            }
        },
        mounted() {
            this.getClasses();
            this.listen();
        },

        methods:{
            getClasses(){
                axios.get('/api/my-classes')
                    .then(function (response) {

                        this.classes = response.data;

                    }.bind(this));
            },
            postClasses(){
                axios.post('/api/classes/',{

                    body: this.classBox
                })
                    .then((response)=>{
                        this.classes.unshift(response.data);
                        this.classBox = ''
                    })

            },
            listen(){
                Echo.channel('teachers')
                    .listen('addPresence',(classes) => {
                        console.log(classes);
                        this.classes.unshift(classes);
                    }).then(bind(this));
            }
        },




    }
</script>
