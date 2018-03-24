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
                                        {{thread.created_at}}
                                    </p>
                                </div>
                                <div class="is-clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-narrow">
                        <div id="carboncontainer">
                            <div id="carbon" class="box">
                                <div class="carbon-item">
                                    <div class="media">
                                        <div class="media-content is-clipped">
                                            <div class="is-pulled-left">
                                                <a :href="profileLink" class="is-size-5 has-text-info">
                                                    {{thread.owner.name}}
                                                </a>
                                                <p class="is-size-7 has-text-grey">
                                                    {{thread.owner.name}}@
                                                </p>
                                                <p class="is-size-7">
                                                    عضویت {{thread.owner.created_at}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="media-left is-pulled-left">
                                            <figure class="image is-64x64">
                                                <img :src="thread.owner.avatar_path" :alt="thread.owner.name">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

    export default {
        name: "thread-show-header",

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