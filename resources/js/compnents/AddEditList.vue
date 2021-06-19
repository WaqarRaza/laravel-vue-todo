<template>
  <div aria-hidden="true" aria-labelledby="addUpdateList" class="modal fade" id="addUpdateList" tabindex="-1">
    <form @submit.prevent="saveList" autocomplete="off">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">List</h5>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating">
              <input class="form-control" id="name" name="name" placeholder="List Name" required type="text" v-model="list.name">
              <label for="name">List Name</label>
            </div>
          
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
    export default {
        name: "AddEditList",
        props: {
            list: {},
        },
        data() {
            return {
                modal: null,
            }
        },
        mounted() {
            this.modal = new bootstrap.Modal(document.getElementById('addUpdateList'))
        },
        methods: {
            saveList() {
                let list = this.list
                if (list.id) {
                    axios.put(this.basepath + '/task-lists/' + list.id, list)
                        .then((res) => {
                            this.$emit('updated', res.data.list)
                            this.modal.hide();
                        })
                } else {
                    axios.post(this.basepath + '/task-lists', list)
                        .then((res) => {
                            this.$emit('created', res.data.list)
                            this.modal.hide();
                        })
                }
                
            }
        }
    }
</script>

<style scoped>

</style>