<template>
    <QuasarLayout>
        <p>Gallery Show</p>
        {{ props.gallery.id }}
        {{ props.gallery }}

        <div class="q-pa-md">
            <h4>Images</h4>
            <q-carousel swipeable animated v-model="slide" thumbnails infinite>
                <q-carousel-slide
                    :name="1"
                    :img-src="'/storage/' + gallery.image1"
                />
                <q-carousel-slide
                    :name="2"
                    :img-src="'/storage/' + gallery.image2"
                />
                <q-carousel-slide
                    :name="3"
                    :img-src="'/storage/' + gallery.image3"
                />
            </q-carousel>
        </div>

        <div class="q-pa-md">
            <h4>Video</h4>
            <q-video
                :ratio="16 / 9"
                :src="getYouTubeEmbedUrl(gallery.video_id)"
            />
            <!-- <YouTube :src="gallery.video_id" ref="youtube" /> -->
        </div>
    </QuasarLayout>
</template>

<script setup>
import { ref } from "vue";
import QuasarLayout from "@/Layouts/QuasarLayout.vue";
import YouTube from "vue3-youtube";
const slide = ref(1);

const props = defineProps({
    gallery: Object,
});
const getYouTubeEmbedUrl = (videoId) =>
    `https://www.youtube.com/embed/${videoId}?rel=0`;
</script>
