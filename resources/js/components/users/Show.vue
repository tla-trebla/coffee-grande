<template>
    <div class="crud-show">
        <div class="crud-header">
            <button
                class="button"
                @click="$router.push({ name: 'users.index' })"
                :disabled="fetching"
            >
                <Fa :icon="[ 'fas', 'arrow-left' ]" /> &nbsp;Go back
            </button>
        </div>
        <Loading v-if="loading" />
        <template v-else>
            <div class="crud-content">
                <h2 class="mb-4" v-text="user.name"></h2>
                <p class="text-content" v-text="user.address"></p>
            </div>
            <div class="crud-meta">
                <p class="mb-1">Written at: {{ user.created_at }}.</p>
                <p v-if="user.created_at != user.updated_at">Last updated: {{ user.updated_at }}.</p>
            </div>
        </template>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                loading: true,
                fetching: true,
                user: {},
            }
        },
        mounted() {
            let self = this;
            axios.get(route('users.show', { user: self.$route.params.id }))
                .then(res => {
                    self.modify(res.data.user);
                })
                .catch(err => {

                })
                .then(() => {
                    self.fetching = false;
                    self.loading = false;
                });
        },
        methods: {
            modify(user) {
                this.user = user;
            }
        }
    }
</script>
