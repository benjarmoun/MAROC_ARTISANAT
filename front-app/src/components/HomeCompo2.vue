<!-- <script>
    export default {
        name: 'HomeCompo',
    };
</script> -->

<template>
    <div class="font-mono my-9">
		<!-- Container -->
		<div class="container mx-auto ">
			<div class="sm:flex justify-center items-center ">
				<!-- Row -->
                    <!-- Col -->
                    <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <div class="flex flex-col justify-center ml-6">
                            <h3 class="text-xl   text-gray-800 p-6 pb-0">
                                <slot name="title"></slot>
                            </h3>
                            <p class="p-6 pt-3 justify-center text-gray-600">
                                <slot name="subtitle"></slot>
                            </p>
                        </div>
                    </div>
				
                <!-- Col -->
                <div class="w-auto h-auto p-3 m-auto ">
                    <slot name="img"></slot>
                </div>
            </div>
        </div>
    </div>

</template>