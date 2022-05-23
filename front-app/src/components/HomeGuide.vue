<script setup>
    import HomeCompo1 from './HomeCompo1.vue'
    import HomeCompo2 from './HomeCompo2.vue'
    import WelcomeItem from './WelcomeItem.vue'
</script>




<template>
<!-- <div>
    <img class="z-1 sticky" src="src\assets\gerab.jpg" alt="">
    <h1 class="z-2"> test Test</h1>
</div>
<p>khvkbkblnlnlbjgcv,blcgvhbjn</p> -->

    <HomeCompo1>
        <template #title >
            HANDCRAFTED WITH LOVE    
        </template>
        <template #subtitle >
            For every natural material there is a Moroccan tradition of working it by hand to enrich it with fine craftsmanship. Moroccan artisans pour their hearts and souls into their work, often in family-run workshops where craft knowledge and traditional motifs are passed from generation to generation. Moroccan craftsmanship brings out the best of the artisans’ skills together with the qualities of raw materials such as wool, leather, clay, and brass. This use of simple materials also means their products will last and age gracefully.   
        </template>
        <template #img >
            <img src="src\assets\mand made.jpg" alt="">
        </template>
    </HomeCompo1>
    <HomeCompo2>
        <template #title >
            CREATE TEXTURED LAYERS WITH THROWS AND BLANKETS     
        </template>
        <template #subtitle >
            Just as we layer our clothes in the winter to be cosy, using layers at home makes a space feel warm and inviting.  Having a few extra blankets around the house in the colder months is practical and creates a feeling of cosiness adding texture, colour, and warmth.  
        </template>
        <template #img >
            <img src="src\assets\CEAT TEXTURED JPG.jpg" alt="">
        </template>
    </HomeCompo2>
    <HomeCompo1>
        <template #title >
            LIGHT UP CANDLES    
        </template>
        <template #subtitle >
               Candlelight instantly transforms the atmosphere of a room and brings a feeling of calm and warmth. Using a scented candle engages all your senses and is a great way to create comfort, calm and relieve stress.
        </template>
        <template #img >
            <img src="src\assets\LIGHT UP CANDELS JPG.jpg" alt="">
        </template>
    </HomeCompo1>
    <HomeCompo2>
        <template #title >
            LAY A DEEP PILE RUG     
        </template>
        <template #subtitle >
            There’s no better feeling when waking up than stepping onto a thick wool rug.  It’s a great way to add warmth to a room and what’s best it’s portable. Unlike carpet you can move it from one room to the next as your mood takes you or roll it up and store for later.
        </template>
        <template #img >
            <img src="src\assets\LAY A DEEP PILE JPG.jpg" alt="">
        </template>
    </HomeCompo2>
    <HomeCompo1>
        <template #title >
            PILE UP ON CUSHIONS    
        </template>
        <template #subtitle >
               One of the simplest ways to transform any living space is with some thoughtfully chosen cushions. They’re a great inexpensive way to transform a room by adding colour, texture, and individuality.
        </template>
        <template #img >
            <img src="src\assets\PILE UP ON CUSHIONS JPG.jpg" alt="">
        </template>
    </HomeCompo1>
    <HomeCompo2>
        <template #title >
            ADD A POP OF COLOUR     
        </template>
        <template #subtitle >
            Autumn’s all about warm colours. Tones of orange, brown and red bring an instant feel of autumn. Look around the room and figure out which of those colours you have the most of and introduce an area piece in the same tone.  This will tie the room together and make the space feel cohesive. <br> Explore our Autumn picks for a selection of cosy artisan made homewares to get you autumn ready!
        </template>
        <template #img >
            <img src="src\assets\ADD A POP OF COLOUR JPG.jpg" alt="">
        </template>
    </HomeCompo2>
    
</template>

<style scoped>
.bg-local {
    /* background-color: blue; */
    background: url("src\assets\gerab.jpg");
}
</style>