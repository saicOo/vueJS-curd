<template>
  <div class="container">
    <div class="card mt-4">
      <div class="card-header">
        <h4>Students</h4>
        <RouterLink to="/students/create" class="btn btn-primary">
          Add Student
        </RouterLink>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(student, index) in this.students" :key="index">
                    <td>{{ student.id }}</td>
                    <td>{{ student.name }}</td>
                    <td>{{ student.course }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.phone }}</td>
                    <td>{{ student.created_at }}</td>
                    <td>
                        <RouterLink :to="{path:'students/'+student.id+'/edit'}" class="btn btn-success float-end">Edit</RouterLink>
                        <button type="button" @click="deleteStudent(student.id)" class="btn btn-danger float-end">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
    name:'students',
    data(){
        return{
            students:[]
        }
    },
    mounted(){
        this.getStudents()
    },
    methods:{
        getStudents(){
            axios.get('http://127.0.0.1:8000/api/students/').then(res=>{
                this.students = res.data.students
                console.log(res);
            });
        },
        deleteStudent(studentId){
            if (confirm('Are you sure, you want delete this data ?')) {
                console.log(studentId);
                axios.delete(`http://127.0.0.1:8000/api/students/${studentId}/delete`).then(res=>{
                alert(res.data.message)
                this.getStudents()
            }).catch(error=>{
                if (error.response) {
                    console.log(error);
                    if(error.response.status == 404){
                        alert(error.response.data.message);
                    }
                }
            });
            }
        }
    }
}
</script>
