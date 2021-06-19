<template>
  <li class="list-group-item">
    <input @change="toggleCompleted" class="form-check-input me-1" type="checkbox" v-model="task.is_completed">
    [<span v-text="task.created_at"></span>]
    <span :class="{'text-decoration-line-through':task.is_completed}" v-text="task.title"></span>
    <span @click="deleteTask" class="trash text-danger">
      <i class="fa fa-trash-alt"></i>
    </span>
  </li>
</template>

<script>
    export default {
        name: "Task",
        props: {
            task: {},
        },
        methods: {
            toggleCompleted() {
                let value = this.task.is_completed ? 1 : 0;
                axios.patch(this.basepath + '/task-completed/' + this.task.id + '/' + value)
            },
            deleteTask() {
                if (confirm("Are you sure? you wanna did this task?")) {
                    axios.delete(this.basepath + '/tasks/' + this.task.id)
                        .then((res) => {
                            if (res.status)
                                this.$emit('delete', this.task)
                        });
                }
            }
        }
    }
</script>

<style scoped>
  .trash {
    float: right;
  }
  
  .trash:hover {
    cursor: pointer;
  }
</style>