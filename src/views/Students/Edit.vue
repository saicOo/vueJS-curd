<template>
  <div class="container">
    <div class="card mt-4">
      <div class="card-header">
        <h4>Edit Student</h4>
      </div>
      <div class="card-body">
        <ul class="alert alert-warning" v-if="Object.keys(this.errorList).length > 0" >
            <li class="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">
                {{error[0]}}
            </li>
        </ul>
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" v-model="model.student.name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" v-model="model.student.email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Course</label>
            <input type="text" v-model="model.student.course" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Phone</label>
            <input type="text" v-model="model.student.phone" class="form-control">
        </div>
        <div class="mb-3">
            <button type="button" @click="updateStudent()" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
    name: 'studentCreate',
    data(){
        return{
            model:{
                student:{
                    name:"",
                    email:"",
                    course:"",
                    phone:""
                }
            },
            studentId:null,
            errorList:'',
        }
    },
    mounted(){
        this.studentId = this.$route.params.id;
        this.getStudentData()
    },
    methods: {
        getStudentData(){
            axios.get(`http://127.0.0.1:8000/api/students/${this.studentId}/edit`).then(res=>{
                // this.students = res.data.students
                console.log(res);
                this.model.student = res.data.student
            }).catch(error=>{
                if (error.response) {
                    console.log(error);
                    if(error.response.status == 404){
                        alert(error.response.data.message);
                    }
                }
            });
        },
        updateStudent(){
            var mythis = this;
            axios.put(`http://127.0.0.1:8000/api/students/${this.studentId}/edit`,this.model.student).then(res=>{
                console.log(res);
                alert(res.data.message);
            }).catch(error=>{
                if (error.response) {
                    console.log(error);
                    if(error.response.status == 422){
                        mythis.errorList = error.response.data.errors;
                    }
                    if(error.response.status == 404){
                        alert(error.response.data.message);
                    }
                }
            })
        }
    }
}
</script>

