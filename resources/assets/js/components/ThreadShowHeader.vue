<template>
    <section class="hero is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column">
                        <div class="content">
                            <h3 class="has-text-white">
                                {{title}}
                            </h3>
                            <div class="is-inline-flex is-black">
                                <div class="tags has-addons">
                                    <span class="tag is-light">
                                        <span class="icon has-text-black">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </span>
                                    <span class="tag is-info">
                                        {{threadVisitsCount}}
                                    </span>
                                </div>
                                <div class="mg-r-5">
                                    <p class="has-text-light">
                                        {{thread.created_at | ago}}
                                    </p>
                                </div>
                                <div class="is-clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-narrow">
                        <div class="box">
                            <article class="media">
                                <figure class="media-left">
                                    <p class="image is-64x64">
                                        <a :href="profileLink">
                                            <img :src="thread.owner.avatar_path" :alt="thread.owner.name">
                                        </a>
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <a :href="profileLink">{{thread.owner.name}}</a>
                                            <small>@{{thread.owner.name}}</small>
                                            <br>
                                            <span class="text-muted">{{thread.owner.created_at | ago}}</span> عضویت
                                        </p>
                                    </div>
                                    <nav class="level is-mobile">
                                        <div class="level-left">
                                            <a class="level-item">
                                                <span class="icon is-small"><i class="fas fa-reply"></i></span>
                                            </a>
                                            <a class="level-item">
                                                <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                                            </a>
                                            <a class="level-item">
                                                <span class="icon is-small"><i class="fas fa-heart"></i></span>
                                            </a>
                                        </div>
                                    </nav>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

    import filters from './../mixins/filters';

    export default {
        name: "thread-show-header",

        mixins: [filters],

        props: ['thread', 'threadVisitsCount'],

        data() {
            return {
                title: this.thread.title,
            }
        },

        created() {

            Event.$on('ThreadUpdated', (data) => {
                this.title = data.title;
            });

        },

        computed: {

            profileLink() {
                return "/profiles/" + this.thread.owner.name;
            }

        }


    }
</script>

<style scoped>

</style>