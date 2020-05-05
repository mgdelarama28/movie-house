<template>
    <div class="container mx-auto px-4 pt-16">
        <div v-if="loading" class="text-3xl text-center">Loading...</div>
        

        <div v-else>
            <div>
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-sembold">On The Air</h2>
            
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <TvShowCard v-for="onTheAirTvShow in onTheAirTvShows" :key="onTheAirTvShow.id"
                        :tvShow="onTheAirTvShow"
                        :genres="genres"
                    ></TvShowCard>
                </div>
            </div>

            <div class="py-24">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-sembold">Popular</h2>
            
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <TvShowCard v-for="popularTvShow in popularTvShows" :key="popularTvShow.id"
                        :tvShow="popularTvShow"
                        :genres="genres"
                    ></TvShowCard>
                </div>
            </div>

            <div>
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-sembold">Top Rated</h2>
            
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <TvShowCard v-for="topRatedTvShow in topRatedTvShows" :key="topRatedTvShow.id"
                        :tvShow="topRatedTvShow"
                        :genres="genres"
                    ></TvShowCard>
                </div>
            </div>
        </div>
        
    </div>    
</template>

<script>
    import TvShowCard from '../../components/TvShowCard';

    export default {
        components: {
            TvShowCard,
        },

        props: {
            apiKey: String,
        },

        mounted() {
            this.fetchGenres();
            this.fetchPopularTvShows();
            this.fetchOnTheAirTvShows();
            this.fetchTopRatedTvShows();
        },

        data() {
            return {
                loading: true,
                genres: [],
                onTheAirTvShows: [],
                popularTvShows: [],
                topRatedTvShows: [],
            }
        },

        methods: {
            fetchGenres() {
                axios.get(`https://api.themoviedb.org/3/genre/movie/list?api_key=${this.apiKey}&language=en-US`).then((res) => {
                    this.genres = res.data.genres;
                }).catch((err) => {
                    console.log(err);
                });
            },

            fetchOnTheAirTvShows() {
                axios.get(`https://api.themoviedb.org/3/tv/on_the_air?api_key=${this.apiKey}&language=en-US&page=1`).then((res) => {
                    this.onTheAirTvShows = res.data.results;
                    this.loading = false;
                }).catch((err) => {
                    console.log(err);
                });
            },

            fetchPopularTvShows() {
                axios.get(`https://api.themoviedb.org/3/tv/popular?api_key=${this.apiKey}&language=en-US&page=1`).then((res) => {
                    this.loading = false;
                    this.popularTvShows = res.data.results;
                }).catch((err) => {
                    console.log(err);
                });
            },

            fetchTopRatedTvShows() {
                axios.get(`https://api.themoviedb.org/3/tv/top_rated?api_key=${this.apiKey}&language=en-US&page=1`).then((res) => {
                    this.loading = false;
                    this.topRatedTvShows = res.data.results;
                    console.log(this.topRatedTvShows);
                }).catch((err) => {
                    console.log(err);
                });
            },
        }
    }
</script>
