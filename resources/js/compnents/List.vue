<template>
  <section>
    <div class="card bg-light mb-4">
      <div class="card-header">
        <h4>
          <span v-text="list.name"></span>
          <small class="text-info"><i @click="$emit('edit',list)" class="fa fa-edit" data-bs-target="#addUpdateList" data-bs-toggle="modal"></i></small>
          <small class="text-danger"><i @click="$emit('delete',list)" class="fa fa-trash-alt"></i></small>
        </h4>
      </div>
      <div class="card-body">
        <form @submit.prevent="saveTask" class="row">
          
          <div class="col-10">
            <input class="form-control form-control-sm" name="title" placeholder="New Task" required type="text" v-model="currentTask.title"/>
          </div>
          
          <div class="col-2 text-right">
            <button class="btn btn-sm btn-success" type="submit">Add</button>
          </div>
        </form>
        <hr>
        <ul class="list-group">
          <task :task="task" v-for="task in orderedTasks" @delete="deleteTask"></task>
        </ul>
      </div>
    </div>
  </section>
</template>

<script>
    import Task from "./Task";
    
    export default {
        name: "List",
        components: {Task},
        props: {
            list: {}
        },
        data() {
            return {
                currentTask: {}
            }
        },
        methods: {
            saveTask() {
                axios.post(this.basepath + '/task-lists/' + this.list.id + '/tasks', this.currentTask)
                    .then((res) => {
                        console.log(res.data.task)
                        this.list.tasks.push(res.data.task)
                        this.currentTask = {}
                    })
            },
            deleteTask(task) {
                this.list.tasks.splice(this.list.tasks.indexOf(task), 1)
            }
        },
        computed: {
            orderedTasks() {
                return this.list.tasks.sort((a,b)=>{
                    if ( a.id > b.id ){
                        return -1;
                    }
                    if ( a.id < b.id ){
                        return 1;
                    }
                    return 0;
                })
            }
        }
    }
</script>

<style scoped>
  small {
    font-size: 1rem;
  }
  
  .card-header:hover {
    cursor: default;
  }
  
  .fa:hover {
    cursor: pointer;
  }

</style>