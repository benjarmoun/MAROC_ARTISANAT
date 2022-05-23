<!-- <script>
    export default {
        name: 'HomeCompo',
    };
</script> -->

<template>
    <div class="font-mono my-9">
		<!-- Container -->
		<div class="container mx-auto ">
			<div class="flex justify-center items-center ">
				<!-- Row -->
				
                <!-- Col -->
                <div class="w-auto h-auto  ">
                    <slot name="img"></slot>
                </div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <div class="flex flex-col justify-center ml-6">
                        <h3 class="text-xl   text-gray-800 p-6 pb-0">
                            <slot name="title"></slot>
                        </h3>
                        <p class="p-6 pt-3 justify-center  text-gray-600">
                            <slot name="subtitle"></slot>
                        </p>
                                        <!-- TEST 1 -->
                        <!-- <h1 class="text-xl  text-center text-gray-700">
                            title
                        </h1>
                        <p class="text-center text-gray-600">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus recusandae numquam quasi quam? Asperiores voluptatum dolorum aut veniam modi doloremque corporis a! Distinctio deleniti error sapiente rerum eaque, dolores vero.
                        </p> -->
                                        <!-- TEST 2 -->
                        <!-- <div >
                            <h3>title</h3> <br>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum obcaecati ipsa enim officia, ab debitis sed ipsam, porro, magni labore dolorem maxime assumenda? Amet illum perferendis numquam sint esse culpa!</p>
                            
                        </div> -->


                        <!-- <div >
                            <h3>{{title}}</h3> <br>
                            <p>{{subtitle}}</p>
                            
                        </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>