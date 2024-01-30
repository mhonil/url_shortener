<script>
    export default{
        mounted(){
            
        },
        data(){
            return{
                url:null,
                urlNotFound:true,
                response:null,
            }
        },
        methods:{
            shortenUrl(){
                let self = this;
                let newUrl = self.url;
                let newArray = newUrl.split('//');
                let counter = 0;
                let resultNewUrl = Math.round((Math.pow(5, 8) - Math.random() * Math.pow(5, 8).toString(5).slice(1)));
          
                for (let i = 0; i < newArray.length; i++) {
                    if (newArray[i] == 'http:' || newArray[i] == 'https:') {
                        counter++;
                    }
                    if (counter == 0) {
                        let newArrayOne = newUrl.split('.')
                        if(newArrayOne[i] === 'www'){
                            counter++;
                        }

                        let newArryTow = newUrl.indexof('.com');
                        if (newArryTow >= 0) {
                            counter++;
                        }
                    }

                    if (counter == 0) {
                        self.urlNotFound = false;
                    }
                    else{
                        let currentUrl = window.location.href+resultNewUrl;

                        axios.post('/url/shotren',{
                            url: newUrl,
                            shortlink: currentUrl
                        }).then(function(response){
                            self.response = response.data;
                            self.url = self.response;
                            console.log(self.response);
                        });
                    }
                    
                }
            }
        }

    }

</script>
<template>
    <div class="relative">
        <div aria-hidden="true" class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-40 dark:opacity-20">
            <div class="blur-[106px] h-56 bg-gradient-to-br from-primary to-purple-400 dark:from-blue-700"></div>
            <div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-sky-300 dark:to-indigo-600"></div>
        </div>
        <div class="relative pt-36 ml-auto">
            <div class="lg:w-2/3 text-center mx-auto">
                <h1 class="text-gray-900 dark:text-white font-bold text-5xl md:text-6xl xl:text-7xl">Paste the URL to be shortened</h1>
                <p class="mt-8 text-gray-700 dark:text-gray-300 pr-4 pl-4">Aero<span class="text-blue-500">URLs</span> is the World's Shortest Link Shortener service to track, brand, and share short URLs.</p>
                
                <form action="" class="mt-12 pr-4 pl-4">   
                    <div class="relative">
                        <input type="text" id="p1" v-model="url" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter the link here" required>
                        <button type="submit" v-on:click.prevent='shortenUrl' class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Shorten URL</button>
                    </div>
                </form>
                
                <div v-if="!urlNotFound" class="flex w-full fixed z-1 max-w-sm overflow-hidden bg-white rounded-lg shadow-md mt-5 ml-96">
                    <div class="flex items-center justify-center w-12 bg-red-500">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                        </svg>
                    </div>
                
                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                URL Not Found
                            </p>
                        </div>
                    </div>
                </div>


                <div class="hidden py-8 mt-16 border-y border-gray-100 sm:flex justify-between">
                    <div class="text-left">
                        <h6 class="text-lg font-semibold text-gray-700 dark:text-white">The lowest price</h6>
                        <p class="mt-2 text-gray-500">Some text here</p>
                    </div>
                    <div class="text-left">
                        <h6 class="text-lg font-semibold text-gray-700 dark:text-white">The fastest on the market</h6>
                        <p class="mt-2 text-gray-500">Some text here</p>
                    </div>
                    <div class="text-left">
                        <h6 class="text-lg font-semibold text-gray-700 dark:text-white">The most loved</h6>
                        <p class="mt-2 text-gray-500">Some text here</p>
                    </div>
                </div>   
            </div>


            <div class="mt-12 p-4 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6">
                <div class="p-4 grayscale transition duration-200 hover:grayscale-0">
                    <img src="https://astrolus.netlify.app/images/clients/microsoft.svg" class="h-12 w-auto mx-auto" loading="lazy" alt="client logo" width="" height="" />
                    </div>
                <div class="p-4 grayscale transition duration-200 hover:grayscale-0">
                    <img src="https://astrolus.netlify.app/images/clients/airbnb.svg" class="h-12 w-auto mx-auto" loading="lazy" alt="client logo" width="" height="" />
                </div>
                <div class="p-4 flex grayscale transition duration-200 hover:grayscale-0">
                    <img src="https://astrolus.netlify.app/images/clients/google.svg" class="h-9 w-auto m-auto" loading="lazy" alt="client logo" width="" height="" />
                </div>
                <div class="p-4 grayscale transition duration-200 hover:grayscale-0">
                    <img src="https://astrolus.netlify.app/images/clients/ge.svg" class="h-12 w-auto mx-auto" loading="lazy" alt="client logo" width="" height="" />
                    </div>
                    <div class="p-4 flex grayscale transition duration-200 hover:grayscale-0">
                    <img src="https://astrolus.netlify.app/images/clients/netflix.svg" class="h-8 w-auto m-auto" loading="lazy" alt="client logo" width="" height="" />
                    </div>
                <div class="p-4 grayscale transition duration-200 hover:grayscale-0">
                    <img src="https://astrolus.netlify.app/images/clients/google-cloud.svg" class="h-12 w-auto mx-auto" loading="lazy" alt="client logo" width="" height="" />
                </div>
            </div>
        </div>
    </div>
</template>