<template>
    <div>
        <div class="border-b border-gray-800">
            <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
                <div class="flex-none">
                    <img :src="'https://image.tmdb.org/t/p/w500/' + tvShow.poster_path" alt="poster" class="w-96">
                </div>
                
                <div class="md:ml-24">
                    <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ tvShow.name }}</h2>

                    <p class="text-sm text-gray-300 mt-1">
                        <span class="">First Air Date: </span>{{ tvShow.first_air_date | moment }}
                    </p>

                    <p class="text-sm text-gray-300 mt-1">
                        <span class="">No. of Seasons: </span>{{ tvShow.seasons.length }}
                    </p>

                    <p class="text-sm text-gray-300 mt-1">
                        <span class="">Genres: </span>
                        <span v-for="genre in tvShow.genres" :key="genre.id">{{ genre.name }}, &nbsp;</span>
                    </p>

                    <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                        <span>Rating: </span>
                        <span class="ml-1">{{ tvShow.vote_average }}</span>
                        <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    </div>

                    <p class="text-gray-300 mt-8">
                        {{ tvShow.overview }}
                    </p>

                    <div class="mt-12">
                        <h4 class="text-white font-semibold">Featured Crew</h4>

                        <div class="mt-2">
                            <div v-if="tvShow.credits.crew.length > 0" class="flex">
                                <div class="mr-8" v-for="personnel in tvShow.credits.crew.slice(0, 3)" :key="personnel.crew_id">
                                    <div>{{ personnel.name }}</div>
                                    <div class="text-sm text-gray-400">{{ personnel.job }}</div>
                                </div>
                            </div>

                            <div v-else>
                                <div class="text-sm">No featured crew.</div>
                            </div>
                        </div>
                    </div>

                    <div  v-if="tvShow.videos.results.length > 0">
                        <div class="mt-8">
                            <button
                                v-for="(trailer, index) in tvShow.videos.results.slice(0, 3)" :key="trailer.id"
                                @click="openTrailer(tvShow.videos.results[index].key)"
                                class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150 mr-5 mt-5"
                            >
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Play Trailer {{ index + 1 }}</span>

                            </button>
                            
                            <div
                                v-show="trailer.isOpen"
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button
                                                @click="trailer.isOpen = false"
                                                class="text-3xl leading-none hover:text-gray-300">&times;
                                            </button>
                                        </div>
                                        
                                        <div class="modal-body px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" :src="trailer.source" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end tvShow-info -->

        <div class="border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Cast</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <div class="mt-8" v-for="actor in tvShow.credits.cast.slice(0, 10)" :key="actor.cast_id">
                        <a href="#">
                            <img :src="'https://image.tmdb.org/t/p/w500/' +actor.profile_path" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray:300">{{ actor.name }}</a>
                            <div class="text-sm text-gray-400">
                                {{ actor.character }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--end tvShow-cast -->

        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="mt-8" v-for="image in tvShow.images.backdrops" :key="image.id">
                    <a
                        @click.prevent="openImage(image.file_path)"
                        href="#"
                    >
                        <img :src="`https://image.tmdb.org/t/p/w500/${image.file_path}`" alt="image" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
            </div>

            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                v-show="image.isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto 0">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="image.isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image.source" alt="poster">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            id: Number,
        },

        mounted() {
            this.fetchTvShow(this.id);
        },

        data() {
            return {
                tvShow: {
                    credits: {
                        cast: [],
                        crew: [],
                    },
                    videos: {
                        results: [],
                    },

                    images: {
                        backdrops: [],
                    },
                    seasons: '',
                },
                image: {
                    source: '',
                    isOpen: false,
                },
                trailer: {
                    source: '',
                    isOpen: false,
                }
            }
        },

        methods: {
            fetchTvShow(id) {
                axios.get(`https://api.themoviedb.org/3/tv/${id}?api_key=c2e68a00a417e16e82e7a9b1666fca2e&append_to_response=credits,images,videos`).then((res) => {
                    this.tvShow = res.data;
                    console.log(this.tvShow);
                }).catch((err) => {
                    console.log(err);
                });
            },

            openImage(filePath) {
                this.image.isOpen = true;
                this.image.source = `https://image.tmdb.org/t/p/original/${filePath}`;
            },

            openTrailer(trailerKey) {
                this.trailer.isOpen = true;
                this.trailer.source = 'https://www.youtube.com/embed/' + trailerKey;
                console.log(this.trailer.source)
            },

            moment() {
                return moment();
            }
        },

        filters: {
            moment(date) {
                return moment(date).format('MMMM D, YYYY');
            }
        }
    }
</script>
