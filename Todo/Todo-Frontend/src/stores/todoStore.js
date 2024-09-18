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

                // Sort Todos by creation date (newest first) before setting them
                this.todos = response.data.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                // this.todos = response.data;
            } catch (error) {
                console.error('Error fetching todos:', error);
            }
        },

        // Create a new Todo
        async createTodo(todo) {
            try {
                const response = await axios.post('/api/todos', todo);
                this.todos.unshift(response.data);      // unshift: Adds the newly created Todo to the top of the todos array
                // this.todos.push(response.data);
            } catch (error) {
                console.error('Error creating todo:', error);
                }
        },

        // Edit an existing Todo
        async editTodo(id, updatedTodo) {
            try {
                const response = await axios.put(`/api/todos/${id}`, updatedTodo);
                const index = this.todos.findIndex(todo => todo.id === parseInt(id));   //findIndex - fetch the index of this record
                if (index !== -1) {     // index starts from 0
                    this.todos[index] = response.data;      // updates the updated response on the same todos object index
                }
            } catch (error) {
                console.error('Error editing todo:', error);
            }
        },

        // Mark as complete
        async markComplete(id) {
            try {
                const response = await axios.put(`/api/todos/${id}`, { is_completed: true });
                const index = this.todos.findIndex(todo => todo.id === parseInt(id));
                if (index !== -1) {
                    this.todos[index] = response.data;
                }
            } catch (error) {
                console.error('Error marking todo complete:', error);
            }
        },

        // Revert to pending
        async revertToPending(id) {
            try {
                const response = await axios.put(`/api/todos/${id}`, { is_completed: false });
                const index = this.todos.findIndex(todo => todo.id === parseInt(id));
                if (index !== -1) {
                    this.todos[index] = response.data;
                }
            } catch (error) {
                console.error('Error reverting todo to pending:', error);
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
