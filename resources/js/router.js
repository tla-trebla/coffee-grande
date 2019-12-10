import Vue from 'vue';
import VueRouter from 'vue-router';
import Index from './components/users/Create';
import Create from './components/users/Show';
import Show from './components/users/Edit';
import Edit from './components/users/Delete';
import Delete from './Components/Users/Delete';
import NotFound from './Components/NotFound';

Vue.use(VueRouter);

const routes = [
    { path: '/', component: Index, name: 'users.index', },
    { path: '/create', component: Create, name: 'users.create', },
    { path: '/:id', component: Show, name: 'users.show', },
    { path: '/:id/edit', component: Edit, name: 'users.edit', },
    { path: '/:id/delete', component: Delete, name: 'users.delete', },
    { path: '*', component: NotFound, name: '404', },
];

const router = new VueRouter({
    routes
});

export default router;
