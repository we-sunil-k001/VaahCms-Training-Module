<template>
    <div class="container"> <h3 class="text-dark"><img src="../assets/to-do-list.png"> My Todo</h3></div>
    <div class="container shadow mt-4 p-3">
        <div class="d-flex mb-3">
            <button class="btn btn-secondary " @click="filter = 'all'">All Todos</button>
            <button class="btn btn-success mx-2" @click="filter = 'completed'">Completed Tasks</button>
            <button class="btn btn-warning mx-2" @click="filter = 'incompleted'">Pending Tasks</button>
            <router-link to="/create" class="btn btn-primary mx-2">Create a New Task</router-link>
        </div>


        <div v-if="filteredTodos.length === 0">
            <p class="text-center">No Task available.</p>
        </div>

        <table class="table table-striped table-bordered ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Task Status</th>
                <th scope="col">Change Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="filteredTodos.length" v-for="(todo, num) in filteredTodos" :key="todo.id">
                <th class="align-middle">{{ num + 1 }}</th>
                <th class="align-middle">{{ todo.name }}</th>
                <td class="align-middle">{{ todo.description }}</td>
                <td class="align-middle">
                    <h6 v-if="!todo.is_completed" class="text-secondary"><i class="bi bi-question-circle-fill"></i> Pending</h6>
                    <h6 v-else class="text-success "> <i class="bi bi-check-circle-fill"></i> Completed</h6>
                </td>
                <td class="align-middle">
                    <button v-if="!todo.is_completed" class="btn btn-success p-0 px-3" @click="markComplete(todo.id)">Mark as Completed</button>
                    <button v-else class="btn btn-secondary p-0 px-3" @click="revertToPending(todo.id)">Revert to Pending</button>
                </td>
                <td class="align-middle"> <router-link :to="'/edit/' + todo.id" class="btn text-success"><i class="bi bi-pencil-square"></i></router-link></td>
                <td class="align-middle"><button class="btn text-danger" @click="deleteTodo(todo.id)"><i class="bi bi-trash3-fill"></i></button> </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { useTodoStore } from '../stores/todoStore';

const store = useTodoStore();
const filter = ref('all');


const filteredTodos = computed(() => {
    if (filter.value === 'all') {
        console.log(store.todos);
        return store.todos;
    } else if (filter.value === 'completed') {
        return store.todos.filter(todo => todo.is_completed);       // filter() add in to object only those have **is_completed = true**
    } else if (filter.value === 'incompleted') {
        return store.todos.filter(todo => !todo.is_completed);       // filter() add in to object only those have **is_completed = false**
    }
});

onMounted(() => {
    store.fetchTodos();
});

const markComplete = (id) => {
    store.markComplete(id);
};

const revertToPending = (id) => {
    store.revertToPending(id);  // New method to revert the Todo status
};

const deleteTodo = (id) => {
    if( confirm('Are you sure you want to delete this task?'))
    {
        store.deleteTodo(id);
    }
};
</script>

<style>
img{
    width: 60px;
}
</style>
