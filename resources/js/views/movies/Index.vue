<template>
    <div class="container mx-auto px-4 pt-16">
        <div v-if="loading" class="text-3xl text-center">Loading...</div>
        

        <div v-else>
            <div>
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-sembold">Now Showing</h2>
            
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <MovieCard v-for="nowPlayingMovie in nowPlayingMovies" :key="nowPlayingMovie.id"
                        :movie="nowPlayingMovie"
                        :genres="genres"
                    ></MovieCard>
                </div>
            </div>

            <div class="py-24">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-sembold">Popular</h2>
            
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <MovieCard v-for="popularMovie in popularMovies" :key="popularMovie.id"
                        :movie="popularMovie"
                        :genres="genres"
                    ></MovieCard>
                </div>
            </div>

            <div>
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-sembold">Top Rated</h2>
            
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <MovieCard v-for="topRatedMovie in topRatedMovies" :key="topRatedMovie.id"
                        :movie="topRatedMovie"
                        :genres="genres"
                    ></MovieCard>
                </div>
            </div>
        </div>
        
    </div>    
</template>

<script>
    import MovieCard from '../../components/MovieCard';

    export default {
        components: {
            MovieCard,
        },

        mounted() {
            this.fetchGenres();
            this.fetchPopularMovies();
            this.fetchNowPlayingMovies();
            this.fetchTopRatedMovies();
        },

        data() {
            return {
                loading: true,
                genres: [],
                nowPlayingMovies: [],
                popularMovies: [],
                topRatedMovies: [],
            }
        },

        methods: {
            fetchGenres() {
                axios.get('https://api.themoviedb.org/3/genre/movie/list?api_key=c2e68a00a417e16e82e7a9b1666fca2e&language=en-US').then((res) => {
                    this.genres = res.data.genres;
                }).catch((err) => {
                    console.log(err);
                });
            },

            fetchNowPlayingMovies() {
                axios.get('https://api.themoviedb.org/3/movie/now_playing?api_key=c2e68a00a417e16e82e7a9b1666fca2e&language=en-US&page=1').then((res) => {
                    this.nowPlayingMovies = res.data.results;
                    this.loading = false;
                }).catch((err) => {
                    console.log(err);
                });
            },

            fetchPopularMovies() {
                axios.get('https://api.themoviedb.org/3/movie/popular?api_key=c2e68a00a417e16e82e7a9b1666fca2e&language=en-US&page=1').then((res) => {
                    this.loading = false;
                    this.popularMovies = res.data.results;
                }).catch((err) => {
                    console.log(err);
                });
            },

            fetchTopRatedMovies() {
                axios.get('https://api.themoviedb.org/3/movie/top_rated?api_key=c2e68a00a417e16e82e7a9b1666fca2e&language=en-US&page=1').then((res) => {
                    this.loading = false;
                    this.topRatedMovies = res.data.results;
                }).catch((err) => {
                    console.log(err);
                });
            },
        }
    }
</script>
