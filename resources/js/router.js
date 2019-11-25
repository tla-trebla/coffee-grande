import Vue from 'vue';
import VueRouter from 'vue-router';
import Index from './Components/Users/Index';
import Create from './Components/Users/Create';
import Show from './Components/Users/Show';
import Edit from './Components/Users/Edit';
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
