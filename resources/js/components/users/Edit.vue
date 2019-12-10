<template>
    <div class="crud-edit">
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
            <form @submit.prevent="edit()">
                <div class="crud-content">
                    <div class="input">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full md:w-1/3 px-2">
                                <label for="edit_name" class="mt-2">Name</label>
                            </div>
                            <div class="w-full md:w-2/3 px-2">
                                <input type="text" v-model="form.name" id="edit_name" @focus="errors.name = []">
                                <span v-if="errors.name" v-text="errors.name[0]" class="input-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full md:w-1/3 px-2">
                                <label for="edit_address" class="mt-2">Address</label>
                            </div>
                            <div class="w-full md:w-2/3 px-2">
                                <textarea id="edit_address" v-model="form.address" cols="30" rows="10" @focus="errors.address = []"></textarea>
                                <div class="flex flex-wrap">
                                    <div class="w-1/2">
                                        <span v-if="errors.address" v-text="errors.address[0]" class="input-error"></span>
                                    </div>
                                    <div class="w-1/2">
                                        <span class="input-help">Maximum of 1000 letters.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="crud-footer">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/3 px-2"></div>
                        <div class="w-full md:w-2/3 px-2">
                            <button
                                type="submit"
                                class="button loading"
                                :class="fetching ? 'loading-show' : ''"
                                :disabled="fetching"
                            >
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </template>
    </div>
</template>

<script>
    import axios from 'axios';
    import form from '../../form';

    export default {
        data() {
            return {
                loading: true,
                fetching: true,
                form: {
                    name: '',
                    address: '',
                },
                errors: {},
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
            edit() {
                let self = this;
                self.fetching = true;
                axios.patch(route('users.update', { user: self.$route.params.id }),{
                    name: self.form.name,
                    address: self.form.address,
                })
                    .then(res => {
                        form.note('Edit request succeeded.', 8000);
                        self.errors = {};
                        self.$router.push({ name: 'users.index' });
                    })
                    .catch(err => {
                        self.errors = form.errors(err);
                    })
                    .then(() => {
                        self.fetching = false;
                    });
            },
            modify(user) {
                this.form.name = user.name;
                this.form.address = user.address;
            },
        }
    }
</script>
