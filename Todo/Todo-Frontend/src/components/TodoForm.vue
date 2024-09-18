<template>
    <div class="container mt-4">
        <h2>
            <router-link to="/" class=""><i class="bi bi-arrow-left-circle-fill text-secondary"></i></router-link>
            {{ is_editing ? 'Edit Task' : 'Create a new Task' }}
        </h2>
        <form @submit.prevent="submitForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" v-model="name" />
                <div v-if="name_error" class="text-danger">{{ name_error }}</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" v-model="description" ></textarea>
                <div v-if="description_rror" class="text-danger">{{ description_rror }}</div>
            </div>
            <button type="submit" class="btn btn-primary">{{ is_editing ? 'Update Todo' : 'Create Todo' }}</button>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useTodoStore } from '../stores/todoStore';
import { useRoute, useRouter } from 'vue-router';

const store = useTodoStore();
const route = useRoute();
const router = useRouter();

const is_editing = ref(false);
const name = ref('');
const description = ref('');

const name_error = ref('');
const description_rror = ref('');

onMounted(() => {
    if (route.params.id) {
        is_editing.value = true;
        const todo = store.todos.find(todo => todo.id === parseInt(route.params.id));
        if (todo) {
            name.value = todo.name;
            description.value = todo.description;
        }
    }
});

const validateForm = () => {
    name_error.value = '';
    description_rror.value = '';

    // Trim whitespace from the input values
    const trimmed_name = name.value.trim();     // trim(): Removes whitespace from both ends of the name.value string
    const trimmed_description = description.value.trim();

    // Validate name
    if (!trimmed_name) {     // here trimmed_name is after removing whitespaces
        name_error.value = 'Name is required';
        return false;
    }

    // Check if the task name already exists (for both create and edit)
    const duplicateTodo = store.todos.find(
        todo => todo.name.toLowerCase() === trimmed_name.toLowerCase() && todo.id !== parseInt(route.params.id)
    );

    if (duplicateTodo) {
        name_error.value = 'Task name already exists. Please choose another name.';
        return false;
    }

    // Validate description
    if (!trimmed_description) {
        description_rror.value = 'Description is required';
        return false;
    }

    return true;
};

const submitForm = () => {
    if (validateForm()) {
        if (is_editing.value) {
            store.editTodo(route.params.id, { name: name.value, description: description.value });
        } else {
            store.createTodo({ name: name.value, description: description.value });
        }
        router.push('/');
    }
};
</script>
<style>
i{
    font-size: 29px;
}
</style>
