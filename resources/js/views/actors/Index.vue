<template>
    <div class="container mx-auto px-4 py-16">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                
                <div class="actor mt-8" v-for="actor in actors" :key="actor.id">
                    <a :href="`/actors/${actor.id}`">
                        <img :src="`https://image.tmdb.org/t/p/w500/${actor.profile_path}`" alt="profile image" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg hover:text-gray-300">{{ actor.name }}</a>
                        <div class="text-sm truncate text-gray-400">
                            <!-- {{ actor.known_for }} -->

                            <span v-for="movie in actor.known_for" :key="movie.id">{{ movie.name || movie.title }}, </span>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- end popular-actors -->

        <!-- <div class="page-load-status my-8">
            <div class="flex justify-center">
                <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
        </div> -->


        <!-- {{-- <div class="flex justify-between mt-16">
            @if ($previous)
                <a href="/actors/page/{{ $previous }}">Previous</a>
            @else
                <div></div>
            @endif
            @if ($next)
                <a href="/actors/page/{{ $next }}">Next</a>
            @else
                <div></div>
            @endif
        </div> --}} -->
    </div>

</template>

<script>
    export default {
        mounted() {
            this.fetchPopularActors();
        },

        props: {
            apiKey: String,
        },

        data() {
            return {
                actors: [],
            }
        },

        methods: {
            fetchPopularActors() {
                axios.get(`https://api.themoviedb.org/3/person/popular?api_key=${this.apiKey}&language=en-US&page=1`).then((res) => {
                    this.actors = res.data.results;
                }).catch((err) => {
                    console.log(err);
                });
            }
        }
    }
</script>
