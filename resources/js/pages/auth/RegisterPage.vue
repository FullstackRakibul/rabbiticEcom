<template>
    <div>
        <!-- Registration -->
        <div class="container py-16 bg-gray-100">
            <div
                class="max-w-lg mx-auto shadow bg-white px-6 py-7 rounded overflow-hidden"
            >
                <h2 class="text-2xl uppercase font-medium mb-1">
                    Create an account
                </h2>
                <p class="text-gray-600 mb-6 text-sm">
                    Register for new cosutumer
                </p>
                <form
                    @click.prevent="register"
                    action="#"
                    method="POST"
                    autocomplete="off"
                >
                    <div class="space-y-2">
                        <div>
                            <label for="name" class="text-gray-600 mb-2 block"
                                >Full Name</label
                            >
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Enter Your Name"
                                v-model="name"
                            />
                        </div>
                        <div>
                            <label for="email" class="text-gray-600 mb-2 block"
                                >Email address</label
                            >
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="youremail@gmail.com"
                                v-model="email"
                            />
                        </div>
                        <div>
                            <label
                                for="password"
                                class="text-gray-600 mb-2 block"
                                >Password</label
                            >
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="*******"
                                v-model="password"
                            />
                        </div>
                        <div>
                            <label
                                for="confirm"
                                class="text-gray-600 mb-2 block"
                                >Confirm password</label
                            >
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="*******"
                                v-model="password_confirmation"
                            />
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                name="aggrement"
                                id="aggrement"
                                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
                            />
                            <label
                                for="aggrement"
                                class="text-gray-600 ml-3 cursor-pointer"
                                >I have read and agree to the
                                <a href="#" class="text-primary"
                                    >terms & conditions</a
                                ></label
                            >
                        </div>
                    </div>
                    <div class="mt-4">
                        <button
                            type="submit"
                            class="block w-full py-2 text-center text-white bg-primary-color border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium hover:text-primary-color hover:border-primary-color"
                            @click.prevent="Registration"
                        >
                            create account
                        </button>
                    </div>
                </form>

                <!-- login with -->
                <div class="mt-6 flex justify-center relative">
                    <div
                        class="text-gray-600 uppercase px-3 bg-white z-10 relative"
                    >
                        Or signup with
                    </div>
                    <div
                        class="absolute left-0 top-3 w-full border-b-2 border-gray-200"
                    ></div>
                </div>
                <div class="mt-4 flex gap-4">
                    <a
                        href="#"
                        class="w-1/2 py-2 text-center text-white bg-blue-800 rounded uppercase font-roboto font-medium text-sm hover:bg-blue-700"
                        >facebook</a
                    >
                    <a
                        href="#"
                        class="w-1/2 py-2 text-center text-white bg-red-600 rounded uppercase font-roboto font-medium text-sm hover:bg-red-500"
                        >google</a
                    >
                </div>
                <!-- ./login with -->

                <p class="mt-4 text-center text-gray-600">
                    Already have account?
                    <router-link to="/login" class="text-primary">
                        Log in
                    </router-link>
                </p>
            </div>
        </div>
        <!-- ./login -->
    </div>
</template>

<script>
export default {
    name: "Registration",
    data() {
        return {
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
        };
    },
    methods: {
        register() {
            axios
                .post("/api/auth/register", {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                })
                .then((response) => {
                    localStorage.setItem("token", response.data.token);
                    this.$router.push({ name: "homePage" });
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error.response.data);
                    
                });
        },
    },
};
</script>
