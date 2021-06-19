<template>
  <section class="container">
    <h2>Get started with todo app</h2>
    <div>
      <button class="btn btn-primary" data-bs-target="#addUpdateList" data-bs-toggle="modal" type="button">New List</button>
    </div>
    <hr>
    <div class="row">
      <list :list="list" @delete="deleteList" @edit="(value)=> operatingList = Object.assign({},value)" class="col-6" v-for="list in lists"></list>
    </div>
    <add-edit-list :list="operatingList" @created="addList" @updated="updateList"></add-edit-list>
  </section>
</template>

<script>
    import List from "../compnents/List";
    import AddEditList from "../compnents/AddEditList";
    
    export default {
        name: "Home",
        components: {AddEditList, List},
        data() {
            return {
                lists: [],
                operatingList: {},
            }
        },
        async mounted() {
            let result = await axios(this.basepath + '/task-lists')
            
            this.lists = result.data
        },
        methods: {
            addList(list) {
                this.lists.push(list);
                this.operatingList = {};
            },
            updateList(list) {
                let temp = this.lists.find(item => item.id == list.id)
                temp.name = list.name
            },
            deleteList(list) {
                if (confirm("Are you sure? you wanna did this list?")) {
                    axios.delete(this.basepath + '/task-lists/' + list.id)
                        .then((res) => {
                            if (res.status)
                                this.lists.splice(this.lists.indexOf(list), 1)
                        });
                }
            }
        }
    }
</script>

<style scoped>

</style>