import { createRouter, createWebHistory } from 'vue-router';
import TodoList from '../components/TodoList.vue';
import TodoForm from '../components/TodoForm.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: TodoList,
    },
    {
        path: '/create',
        name: 'CreateTodo',
        component: TodoForm,
    },
    {
        path: '/edit/:id',
        name: 'EditTodo',
        component: TodoForm,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
