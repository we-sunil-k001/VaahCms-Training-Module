<template>
    <div class="container mt-4">
        <h2>{{ isEditing ? 'Edit Task' : 'Create a new Task' }}</h2>
        <form @submit.prevent="submitForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" v-model="name" />
                <div v-if="nameError" class="text-danger">{{ nameError }}</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" v-model="description" ></textarea>
                <div v-if="descriptionError" class="text-danger">{{ descriptionError }}</div>
            </div>
            <button type="submit" class="btn btn-primary">{{ isEditing ? 'Update Todo' : 'Create Todo' }}</button>
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

const isEditing = ref(false);
const name = ref('');
const description = ref('');

const nameError = ref('');
const descriptionError = ref('');

onMounted(() => {
    if (route.params.id) {
        isEditing.value = true;
        const todo = store.todos.find(todo => todo.id === parseInt(route.params.id));
        if (todo) {
            name.value = todo.name;
            description.value = todo.description;
        }
    }
});

const validateForm = () => {
    nameError.value = '';
    descriptionError.value = '';

    // Trim whitespace from the input values
    const trimmedName = name.value.trim();     // trim(): Removes whitespace from both ends of the name.value string
    const trimmedDescription = description.value.trim();

    // Validate name
    if (!trimmedName) {     // here trimmedName is after removing whitespaces
        nameError.value = 'Name is required';
        return false;
    }

    // Validate description
    if (!trimmedDescription) {
        descriptionError.value = 'Description is required';
        return false;
    }

    return true;
};

const submitForm = () => {
    if (validateForm()) {
        if (isEditing.value) {
            store.editTodo(route.params.id, { name: name.value, description: description.value });
        } else {
            store.createTodo({ name: name.value, description: description.value });
        }
        router.push('/');
    }
};
</script>
