<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto py-4">
        <div class="card">
          <div class="card-header"><b>Login</b></div>
          <div class="card-body">
            <form action="#" method="post" @submit.prevent="login">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" v-model="form.email" id="email" class="form-control" placeholder="Enter email" />
                <div v-if="theErrors.email" class="mt-2 text-danger">
                  {{ theErrors.email[0] }}
                </div>
              </div>
			  <div class="form-group">
                <label for="password">Password</label>
                <input type="password" v-model="form.password" id="password" class="form-control" placeholder="Password" />
                <div v-if="theErrors.password" class="mt-2 text-danger">
                  {{ theErrors.password[0] }}
                </div>
              </div>
              <button type="submit" class="btn btn-primary d-flex align-items-center" >
                Login
                <svg v-if="loading" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style=" margin: auto; background: none; display: block; shape-rendering: auto; " width="30px" height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" > <rect x="17.5" y="30" width="15" height="40" fill="#f0f0f0"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="18;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s" ></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="64;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s" ></animate> </rect> <rect x="42.5" y="30" width="15" height="40" fill="#c0cfff"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s" ></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s" ></animate> </rect> <rect x="67.5" y="30" width="15" height="40" fill="#a6edfb"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" ></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" ></animate> </rect> <!-- [ldio] generated by https://loading.io/ --> </svg>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {},
      loading: false,
      theErrors: [],
    };
  },
  
  methods: {
	   async login() {
		  try {
			  localStorage.setItem('dicoba', 'mencoba localstorage heroku')
			  let response = await this.$store.dispatch('login', this.form)
			  if(response.status === 200) {
				  this.$router.push({ name: 'profile' })
			  }
		  } catch (error) {
			  this.theErrors = error.response.data.errors
		  }
	  }
  },
};
</script>