<template>
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-secondary" @click="filter = 'all'">All Todos</button>
            <button class="btn btn-success" @click="filter = 'completed'">Completed Todos</button>
            <button class="btn btn-warning" @click="filter = 'incompleted'">Incomplete Todos</button>
            <router-link to="/create" class="btn btn-primary">Create New Todo</router-link>
        </div>

        <div v-if="filteredTodos.length" v-for="todo in filteredTodos" :key="todo.id" class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ todo.name }}</h5>
                <p class="card-text">{{ todo.description }}</p>
                <div class="d-flex justify-content-between">
                    <router-link :to="'/edit/' + todo.id" class="btn btn-warning">Edit</router-link>
                    <button class="btn btn-danger" @click="deleteTodo(todo.id)">Delete</button>
                    <button v-if="!todo.is_complete" class="btn btn-success" @click="markComplete(todo.id)">Mark Complete</button>
                </div>
            </div>
        </div>

        <div v-if="filteredTodos.length === 0">
            <p class="text-center">No Task available.</p>
        </div>
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

const deleteTodo = (id) => {
    store.deleteTodo(id);
};
</script>
