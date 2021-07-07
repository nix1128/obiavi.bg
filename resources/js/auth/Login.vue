<template>
    <div>
        <div class=" w-50 m-auto ">
            <div class="card card-body">
                <form class="form-group">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            name="email"
                            type="text"
                            placeholder="enter your email"
                            class="form-control"
                            v-model="email"
                            :class="[{ 'is-invalid': errorFor('email') }]"
                        />
                        <v-validation :errors="errorFor('email')"></v-validation>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            name="password"
                            type="password"
                            placeholder="enter your password"
                            class="form-control"
                            v-model="password"
                            :class="[{'is-invalid': errorFor('password') }]"
                        />
                        <v-validation
                            :errors="errorFor('password')"
                        ></v-validation>
                    </div>

                    <button
                        type="button"
                        class="btn btn-lg btn-primary btn-block"
                        @click.prevent="load()"
                    >
                        Submit
                    </button>

                    <hr />

                    <div>
                        <span>
                            Not an account Yet?
                            <router-link to="home" class="text-primary">
                                Register</router-link
                            >
                        </span>
                    </div>

                    <div>
                        <span
                            >Have you forgoten your password?
                            <router-link to="home" class="text-primary">
                                Reset password</router-link
                            >
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import validationErrors from "../shared/mixins/validationErrors";
import {logIn} from "../shared/utils/userState"

export default {
    mixins: [validationErrors],

    data() {
        return {
            email: null,
            password: null,
            loading :false,
        };
    },

   methods: {
    async load() {
      this.loading = true;
      this.errors = null;
      try {
        await axios.get("/sanctum/csrf-cookie");
        await axios.post("/login", {
          email: this.email,
          password: this.password
        });
        logIn();
        this.$store.dispatch("loadUser");
        this.$router.push({ name: "home" });
      } catch (error) {
        this.errors = error.response && error.response.data.errors;
      }
      this.loading = false;
    }
  }
};
</script>


