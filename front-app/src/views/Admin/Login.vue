<template>
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8" >
    <div class="max-w-md w-full space-y-8">
      <div v-if="msg" class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
          <span class="font-medium">{{msg}}</span>
          
        </div>
      </div>
      <div class="my-10">
        <h1 class=" text-center text-3xl font-extrabold text-gray-900 mb-10">ADMIN</h1>
        <h2 class=" text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
      </div>
      <form @submit.prevent="login" class="mt-8 space-y-6">
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm -space-y-px">
          <label for="username" class="sr-only">Username</label>
          <input v-model="user" id="username" name="user" type="text" autocomplete="user" required=""
            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
            placeholder="Username" />
        </div>
        <div class="rounded-md shadow-sm -space-y-px">
          <label for="password" class="sr-only">Password</label>
          <input v-model="password" id="password" name="password" type="password" autocomplete="current-password"
            required=""
            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
            placeholder="Password" />
        </div>
        <div>
          <button type="submit"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Sign in
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'loginAdmin',
  data() {
    return {
      user: '',
      password: '',
      msg:""
    };
  },
  methods: {
    login() {

      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json");
      myHeaders.append("Cookie", "PHPSESSID=3g9jd4qq8p2vu4lanl28ben59s");

      var raw = JSON.stringify({
        "user": this.user,
        "password": this.password
      });

      var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
      };

      fetch("http://localhost/MAROC_ARTISANAT/back-app/loginAdmin", requestOptions)
        .then(response => response.text())
        .then(result => {
          console.log(result);
          result = JSON.parse(result);
           if(result.message == "success"){
            console.log(result);
            localStorage.setItem('admin', JSON.stringify(result.data));
            this.$router.push({name:"ADMIN"});
          } else {
           this.msg=result.message;
          }
        })

        .catch(error => console.log('error', error));


    },
  },
  mounted() {
        if(JSON.parse(localStorage.getItem('admin'))){
          this.$router.push({name:"ADMIN"});
        }
    
  },


};

</script>