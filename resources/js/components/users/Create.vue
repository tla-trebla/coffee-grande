<template>
    <div class="crud-create">
        <div class="crud-header">
            <button
                class="button"
                @click="$router.push({ name: 'users.index' })"
                :disabled="fetching"
            >
                <Fa :icon="[ 'fas', 'arrow-left' ]" /> &nbsp;Go back
            </button>
        </div>
        <form @submit.prevent="create()">
            <div class="crud-content">
                <div class="input">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/3 px-2">
                            <label for="create_name" class="mt-2">Name</label>
                        </div>
                        <div class="w-full md:w-2/3 px-2">
                            <input type="text" id="create_name" v-model="form.name" @focus="errors.name = []">
                            <span v-if="errors.name" v-text="errors.name[0]" class="input-error"></span>
                        </div>
                    </div>
                </div>
                <div class="input">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/3 px-2">
                            <label for="create_address" class="mt-2">Address</label>
                        </div>
                        <div class="w-full md:w-2/3 px-2">
                            <textarea id="create_address" v-model="form.address" cols="30" rows="10" @focus="errors.address = []"></textarea>
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
                <div class="input">
                    <div class="flex flex-wrap -mx-2">
                        <label for="create_phone" class="mt-2">Phone Number</label>
                    </div>
                    <div class="w-full md:w-2/3 px-2">
                        <input type="number" id="create_phone" v-model="form.phone" @focus="errors.number = []">
                        <span v-if="errors.number" v-text="errors.number[0]" class="input-error"></span>
                    </div>
                </div>
                <div class="input">
                    <div class="flex flex-wrap -mx-2">
                        <label for="create_email" class="mt-2">Email</label>
                    </div>
                    <div class="w-full md:w-2/3 px-2">
                        <input type="email" id="create_email" v-model="form.email" @focus="errors.email = []">
                        <span v-if="errors.email" v-text="errors.email[0]" class="input-error"></span>
                    </div>
                </div>
                <div class="input">
                    <div class="flex flex-wrap -mx-2">
                        <label for="create_email_verified_at" class="mt-2">Verify Email</label>
                    </div>
                    <div class="w-full md:w-2/3 px-2">
                        <input type="email" id="create_email_verified_at" v-model="form.email_verified_at" @focus="errors.email_verified_at = []">
                        <span v-if="errors.email_verified_at" v-text="errors.email_verified_at[0]" class="input-error"></span>
                    </div>
                </div>
                <div class="input">
                    <div class="flex flex-wrap -mx-2">
                        <label for="create_password" class="mt-2">Password</label>
                    </div>
                    <div class="w-full md:w-2/3 px-2">
                        <input type="password" id="create_password" v-model="form.password" @focus="errors.password = []">
                        <span v-if="errors.password" v-text="errors.password[0]" class="input-error"></span>
                    </div>
                </div>
                <div class="input">
                    <div class="flex flex-wrap -mx-2">
                        <label for="create_role" class="mt-2">Role</label>
                    </div>
                    <div class="w-full md:w-2/3 px-2">
                        <select id="create_role" v-model="form.role" @focus="errors.role = []">
                            <option disabled value="">Please select one role</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                        <span v-if="errors.role" v-text="errors.role[0]" class="input-error"></span>
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
    </div>
</template>

<script>
    import axios from 'axios';
    import form from '../../form';

    export default {
        data() {
            return {
                fetching: false,
                form: {
                    name: '',
                    address: '',
                    phone: '',
                    email: '',
                    email_verified_at: '',
                    password: '',
                    role: 0,
                    active: 1,
                },
                errors: {},
            }
        },
        methods: {
            create() {
                let self = this;
                self.fetching = true;
                axios.post(route('users.store'),{
                    name: self.form.name,
                    address: self.form.address,
                    phone: self.form.phone,
                    email: self.form.email,
                    email_verified_at: self.form.email_verified_at,
                    password: self.form.password,
                    role: self.form.role,
                    active: self.form.active,
                })
                    .then(res => {
                        self.clear();
                        form.note('Create request succeeded.', 8000);
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
            clear() {
                this.form.name = '';
                this.form.address = '';
                this.form.phone = '';
                this.form.email = '';
                this.form.email_verified_at = '';
                this.form.password = '';
                this.form.role = '';
                this.form.active = '';
            }
        }
    }
</script>
