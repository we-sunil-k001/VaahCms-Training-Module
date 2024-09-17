import { defineStore } from 'pinia';
import axios from 'axios';

export const useTodoStore = defineStore('todoStore', {
    state: () => ({
        todos: [],
    }),
    actions: {
        // Fetch all Todos from Laravel API
        async fetchTodos() {
            try {
                const response = await axios.get('/api/todos');
                this.todos = response.data;
            } catch (error) {
                console.error('Error fetching todos:', error);
            }
        },

        // Create a new Todo
        async createTodo(todo) {
            try {
                const response = await axios.post('/api/todos', todo);
                this.todos.push(response.data);
            } catch (error) {
                console.error('Error creating todo:', error);
            }
        },

        // Edit an existing Todo
        async editTodo(id, updatedTodo) {
            try {
                const response = await axios.put(`/api/todos/${id}`, updatedTodo);
                const index = this.todos.findIndex(todo => todo.id === parseInt(id));
                if (index !== -1) {
                    this.todos[index] = response.data;
                }
            } catch (error) {
                console.error('Error editing todo:', error);
            }
        },

        // Mark a Todo as complete
        async markComplete(id) {
            try {
                await axios.put(`/api/todos/${id}/mark-complete`);
                const todo = this.todos.find(todo => todo.id === parseInt(id));
                if (todo) {
                    todo.is_complete = true;
                }
            } catch (error) {
                console.error('Error marking todo as complete:', error);
            }
        },

        // Delete a Todo
        async deleteTodo(id) {
            try {
                await axios.delete(`/api/todos/${id}`);
                this.todos = this.todos.filter(todo => todo.id !== parseInt(id));   // here it after deleting it excluding the deleted ID/row from the object, that is getting changed everywhere without reloading parseInt(id)- used for to convert id which currently string into integer
            } catch (error) {
                console.error('Error deleting todo:', error);
            }
        }
    }
});
