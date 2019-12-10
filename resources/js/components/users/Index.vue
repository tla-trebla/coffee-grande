<template>
    <div class="crud-listing">
        <div class="crud-header">
            <button
                class="button success"
                @click="$router.push({ name: 'users.create' })"
                :disabled="fetching"
            >
                Create
            </button>
            <button
                class="button ml-1"
                title="Reload"
                :disabled="fetching"
                @click="reload()"
            >
                <Fa :icon="['fas', 'sync-alt']" />
            </button>
        </div>
        <Loading v-if="loading" />
        <div v-else class="crud-content mb-0">
            <table class="table" :class="[ users.length === 0 ? '' : 'mb-5']">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="users.length === 0">
                    <td colspan="3" class="text-center"><em>The table is empty.</em></td>
                </tr>
                <template v-else>
                    <ItemRow v-for="user in users" :key="user.id" :user="user" />
                </template>
                </tbody>
            </table>
            <p class="text-right text-sm text-grey-dark" v-if="users.length !== 0">Number of rows: {{ users.length }}</p>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import ItemRow from '../ItemRow';
    import form from '../../form';

    export default {
        data() {
            return {
                users: [],
                loading: true,
                fetching: true,
            }
        },
        mounted() {
            let self = this;
            axios.get(route('users.index'))
                .then(res => {
                    self.users = res.data.users;
                })
                .catch(err => {

                })
                .then(() => {
                    self.fetching = false;
                    self.loading = false;
                });
        },
        methods: {
            reload() {
                let self = this;
                this.fetching = true;
                this.loading = true;
                axios.get(route('users.index'))
                    .then(res => {
                        self.users = res.data.users;
                    })
                    .catch(err => {

                    })
                    .then(() => {
                        self.loading = false;
                        self.fetching = false;
                    });
            }
        },
        components: { ItemRow },
    }
</script>
