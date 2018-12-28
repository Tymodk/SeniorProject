<template>
    <div class="container">
        <h3>
            <a class="btn btn-primary kdg" data-toggle="collapse" href="#present" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Aanwezig ( {{present.length}} )
            </a>
        </h3>
        <div class="collapse show" id="present">

            <div class="card card-body p-3">

                <table class="table table-borderless ">
                    <thead>
                    <tr>
                        <td><strong>Naam </strong></td>
                        <td><strong> Kaartnummer</strong></td>
                        <td><strong>Ingescanned om </strong></td>
                    </tr>

                    </thead>
                    <tbody>
                    <tr v-for="student in present">
                        <td>
                            {{ student.name }}
                        </td>
                        <td>{{student.card_id}}</td>
                        <td>{{student.created_at}}</td>
                        <td><a v-on:click="remove(student.student_id)"><i class="fas fa-times text-danger float-right"></i></a></td>
                    </tr>

                    </tbody>
                </table>

            </div>


        </div>
        <h3 class="mt-5">
            <a class="btn btn-primary kdg" data-toggle="collapse" href="#absent" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Nog niet gescand ({{absent.length}})
            </a>
        </h3>

        <div class="collapse" id="absent">
            <div class="card card-body p-3">

                <table class="table table-borderless">

                    <tbody>
                    <tr v-for="student in absent">
                        <td>{{student.name}}
                            <span class="float-right">

                            <a v-on:click="add(student.id)"><i class="fas fa-plus text-success pr-2"></i></a>
                            <a v-on:click="isIll(student.id)"><i class="fas fa-ambulance text-danger"></i></a>
                        </span>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <h3 class="mt-5">
            <a class="btn btn-primary kdg" data-toggle="collapse" href="#ill" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Zieken ( {{ill.length}} )
            </a>
        </h3>
        <div class="collapse" id="ill">
            <div class="card card-body p-3">

                <table class="table table-borderless">

                    <tbody>
                    <tr v-for="student in ill">
                        <td>{{student.name}} <i class="fas fa-ambulance text-danger"></i></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                absent: [],
                present: [],
                ill: [],
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
            this.getIll();
            this.listen();
        },

        methods: {
            getAbsent() {
                axios.get('/api/classes/absent/' + this.class_id)
                    .then(function (response) {

                        this.absent = response.data;


                    }.bind(this));
            },
            getPresent() {
                axios.get('/api/classes/present/' + this.class_id)
                    .then(function (response) {

                        this.present = response.data;

                    }.bind(this));
            },
            getIll() {
                axios.get('/api/classes/ill/' + this.class_id)
                    .then(function (response) {
                        this.ill = response.data;
                    }.bind(this));
            },
            add(id){
              console.log('geklikt' + id);
              ///manueel-aanwezig/{class}/{student}
                axios.get('/manueel-aanwezig/' + this.class_id + '/' + id);
                this.getPresent();
                this.getAbsent();

            },
            isIll(id){
                axios.get('/manueel-ziek/' + this.class_id + '/' + id);
                this.getIll();
                this.getAbsent();
            },
            remove(id){
                axios.get('/manueel-verwijderen/' + this.class_id + '/' + id);
                this.getPresent();
                this.getAbsent();
            },
            listen() {
                Echo.private('class.' + this.class_id)
                    .listen('addPresence', (classes) => {

                        this.present = [...this.present, classes[0]];

                        this.getAbsent();
                        this.getIll();


                    });
            },
            indexWhere(array, conditionFn) {
                const item = array.find(conditionFn)
                return array.indexOf(item);
            },
        },


    }
</script>
