<template>
    <div class="font-mono">
		<!-- Container -->
		<div class="container mx-auto">
			<div class="flex justify-center px-6">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex justify-center items-center h-screen">
					<!-- Col -->
					<div class="w-full border-radius:inherit h-auto  hidden lg:block lg:w-5/12 bg-cover rounded-l-lg">
                        <img src="..\assets\gerab.jpg" alt="">
                    </div>
					<!-- Col -->
					<div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-2xl text-center">Log In!</h3>
						<form @submit.prevent="login" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
							
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
									Email
								</label>
								<input v-model="email"
									class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="email"
									type="email"
									placeholder="Email"
								/>
							</div>
							<div class="mb-4 ">
								
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                    Password
                                </label>
								
                                <input v-model="password" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="********"  />
							</div>
							<div class="mb-6 text-center">
								<button type="submit"  class="w-full px-6 py-3 text-white bg-blue-500 hover:bg-blue-700 rounded-lg shadow-lg">
									Log In
								</button>
							</div>
							<hr class="mb-6 border-t" />
							<div class="text-center">
								<a
									class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
									href="./register"
								>
									Don't have an account? Register!
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import router from '../router';
    export default {
        name: 'login-form',
		data() {
			return {
				email: '',
				password: '',
			};
		},
		methods: {
			login() {

				var myHeaders = new Headers();
				myHeaders.append("Content-Type", "application/json");
				myHeaders.append("Cookie", "PHPSESSID=3g9jd4qq8p2vu4lanl28ben59s");

				var raw = JSON.stringify({
				"email": this.email,
				"password": this.password
				});

				var requestOptions = {
				method: 'POST',
				headers: myHeaders,
				body: raw,
				redirect: 'follow'
				};

				fetch("http://localhost/MAROC_ARTISANAT/back-app/login", requestOptions)
				.then(response => response.text())
				.then(result => {
					result=JSON.parse(result);
					// console.log(result);
					if(result.message == "User Not Logged In"){
						console.log("error");
					}else{
						console.log(result);
						localStorage.setItem('user', JSON.stringify(result.data));
						this.$router.push({name:"home"});
					}
					this.$parent.$parent.$parent.IsLogged();

				})
				
					
				.catch(error => console.log('error', error));


			},
		},
		
		
    };

</script>