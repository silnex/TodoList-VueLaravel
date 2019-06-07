<template>
    <v-container fill-height style="max-width:450px">
        <v-layout align-center row wrap>
            <v-flex>
                <v-form v-on:submit.prevent="onSubmit">
                    <v-card>
                        <v-toolbar flat>
                            <v-toolbar-title>Login</v-toolbar-title>
                        </v-toolbar>
                        <div class="ma-3">
                            <v-text-field
                                type="text"
                                v-model="email"
                                :rules="emailRules"
                                label="Email"
                            ></v-text-field>
                            <v-text-field
                                type="password"
                                v-model="password"
                                :rules="passwordRules"
                                label="password"
                            ></v-text-field>
                        </div>
                        <div>
                            <v-btn type="submit" block large color="info"
                                >로그인</v-btn
                            >
                        </div>
                    </v-card>
                </v-form>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import store from "../store"
export default {
    data() {
        return {
            valid: false,
            email: "",
            emailRules: [
                v => !!v || "E-mail is required",
                v => /.+@.+/.test(v) || "E-mail must be valid"
            ],
            password: "",
            passwordRules: [
                v => !!v || "password is required",
                v => v.length >= 8 || "Password must be more than 8 characters"
            ]
        }
    },
    methods: {
        onSubmit() {
            console.log(store.commit("increment"))
            console.log(store)
        }
    }
}
</script>
