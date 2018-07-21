<template>
   <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="alert alert-danger m-3 text-center" v-if="errors.login">
                    {{ errors.login }}
                </div>

                <div class="card-body">
                    <form method="POST" aria-label="Login" @submit.prevent="submit">
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-bind:class="{'is-invalid' : errors.email}" name="email" v-model="email" required autofocus>

                                <span class="invalid-feedback" role="alert" v-if="errors.email">
                                    <strong>{{ errors.email[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-bind:class="{'is-invalid' : errors.password}" name="password" v-model="password" required>

                                <span class="invalid-feedback" role="alert" v-if="errors.password">
                                    <strong>{{ errors.password[0] }}</strong>
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</template>


<script>
import { mapActions } from "vuex";
import localforage from "localforage";
import { isEmpty } from "lodash";

export default {
  data() {
    return {
      email: null,
      password: null,
      errors: []
    };
  },
  methods: {
    ...mapActions({
      login: "auth/login"
    }),
    submit() {
      this.login({
        payload: {
          email: this.email,
          password: this.password
        },
        context: this
      }).then(() => {
        localforage.getItem("intended").then(name => {
          if (isEmpty(name)) {
            this.$router.replace({ name: "home" });
          }
          this.$router.replace({ name: name });
        });
      });
    }
  }
};
</script>
