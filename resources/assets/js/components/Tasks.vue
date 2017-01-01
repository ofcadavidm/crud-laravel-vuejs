<template>

    <div>
        <form accept-charset="utf-8">

            <input type="text" class="form-control" placeholder="Task" name="task" v-model="task.task">

            <br>

            <button class="form-control btn btn-primary" @click="createTask">Submit</button>

        </form>

        <table class="table table-bordered table-hover">
            <caption>Task List</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody v-for="task in tasks">
                <tr>
                    <td>{{task.id}}</td>
                    <td>{{task.task}}</td>
                    <td>{{task.created_at}}</td>
                    <td>{{task.updated_at}}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" @click="showTask(task)">Edit</button>
                        <button class="btn btn-danger" @click="deleteTask(task)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Task</h4>
              </div>
              <div class="modal-body">
                <input type="text" class="form-control" placeholder="Task" name="task" v-model="task.task">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" @click="fetchTaskList">Close</button>
                <button type="button" class="btn btn-primary" @click="updateTask(task)">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        
    </div>
   
</template>

<script>
    export default {

        data: function() {
            return {
                tasks: [],
                task: {task: ''}
            };
        },

        methods: {
            fetchTaskList: function(){
                this.$http.get('api/tasks').then((response) => {
                    this.tasks = response.body;
                });
            },

            createTask: function(){
                this.$http.post('api/tasks', {task: this.task.task});
            },

            deleteTask: function(task){
                var index = this.tasks.indexOf(task);
                this.tasks.splice(index,1);
                this.$http.delete('api/tasks/' + task.id);
            },

            showTask: function(task) {
                this.$http.get('api/tasks/' + task.id).then((response) => {
                    this.task = response.body;
                });
            },

            updateTask: function(task){
                this.$http.put('api/tasks/' + task.id, {task: this.task.task}).then((response) => {
                    alert("Updated successfully.");
                });                
            }
        },

        created: function() {
            this.fetchTaskList();
        }
    }
</script>
