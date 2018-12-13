<template>
    <div class="container">
        <h3>
            <a class="btn btn-primary" data-toggle="collapse" href="#present" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Present ({{present.length}})
            </a>
        </h3>
        <div class="collapse" id="present">
            <div class="card card-body p-2" >

                <p v-for = "student in present">
                    {{student.name}}
                </p>

            </div>
        </div>
        <h3>
            <a class="btn btn-primary" data-toggle="collapse" href="#absent" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Not present ({{absent.length}})
            </a>
        </h3>

        <div class="collapse" id="absent">
            <div class="card card-body p-2" >

                <p v-for = "student in absent">
                    {{student.name}}
                </p>

            </div>
        </div>


    </div>
</template>

<script>
    export default {
        data() {
            return {
                absent: [],
                present:[],
                classBox: '',
                class_id: this.classid,
                user: '',

            }
        },
        props: {
            classid: '',
        },
        created() {
            this.getAbsent();
            this.getPresent();
            this.listen();
        },

        methods:{
            getAbsent(){
                axios.get('/api/classes/absent/'+ this.class_id)
                    .then(function (response) {

                        this.absent = response.data;
                        console.log(response)

                    }.bind(this));
            },
            getPresent(){
                axios.get('/api/classes/present/'+ this.class_id)
                    .then(function (response) {

                        this.present = response.data;

                    }.bind(this));
            },
            listen(){
                Echo.channel('teachers')
                    .listen('addPresence',(classes) => {
                        console.log(classes);
                        this.present = [...this.present, classes[0]];
                        console.log(this.present);




                        this.getAbsent();
                     
                    });
            }
        },




    }
</script>
