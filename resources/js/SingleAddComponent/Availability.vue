<template>
    <div>
        <h6
            class=" d-block  d-inline-flex  text-uppercase text-secondary font-weight-bolder"
        >
            Check Availability
            <transition name="fade">
                <span v-if="hasAvailability"
                    ><div class="text-success">(Availible)</div></span
                >
                <span v-if="noAvailability"
                    ><div class="text-danger">(Not Availible)</div></span
                >
            </transition>
        </h6>

        <div class="form-row md-6">
            <div class="form-group col-sm-6">
                <label for="from">From</label>
                <input
                    type="text"
                    name="from"
                    class="form-control form-control-sm"
                    placeholder="Start date"
                    v-model="from"
                    @keyup.enter="check"
                    :class="[{ 'is-invalid': errorFor('from') }]"
                />
                <v-validation :errors="errorFor('from')"></v-validation>
            </div>

            <div class="form-group col-sm-6">
                <label for="to">To</label>
                <input
                    type="text"
                    name="to"
                    class="form-control form-control-sm"
                    placeholder="End date"
                    v-model="to"
                    @keyup.enter="check"
                    :class="[{ 'is-invalid': errorFor('to') }]"
                />

                <v-validation :errors="errorFor('to')"></v-validation>
            </div>

            <br />

         <check-button class ="btn btn-block"

         :loading ="loading" >Check</check-button>

    </div>
    </div>
</template>

<script>
import { is422 } from "../shared/components/validations/Errors";
import axios from "axios";


export default {


    props: {
        adId: [String, Number]
    },
    data() {
        return {
            from: this.$store.state.manageState.from,
            to: this.$store.state.manageState.to,
            loading: false,
            status: null,
            errors: null
        };
    },

    methods: {
        check() {
            this.loading = true;
            this.errors = null;
            //dispatch the action to appear in input fields from store.js
            this.$store.dispatch("manageStateMutation", {
                from: this.from,
                to: this.to
            });

            const request = axios.get(
                `/api/ad/${this.adId}/availability?from=${this.from}&to=${this.to}`
            );
            request
                .then(response => {
                    this.status = response.status;
                })
                .catch(error => {
                    if (is422(error)) {
                        this.errors = error.response.data.errors;

                    }
                    this.status = error.response.status;
                      this.loading = false;
                })

        },

        errorFor(field) {
            return this.hasErrors && this.errors[field]
                ? this.errors[field]
                : null;
        }
    },

    computed: {
        hasErrors() {
            return 422 === this.status && this.errors !== null;
        },
        hasAvailability() {
            return 200 === this.status;
        },
        noAvailability() {
            return 404 === this.status;
        }
    }
};
</script>

<style scoped>
label {
    font-family: monospace;
    font-size: 14px;
}

.is-invalid {
    border-color: #b22222;
    background-image: none;
}
.invalid-feedback {
    color: #b22222;
}
</style>
