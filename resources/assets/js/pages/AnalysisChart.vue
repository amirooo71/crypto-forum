<template>
    <div>
        <div id="tv_chart_container"></div>
        <a class="float" @click="add">
            <i class="fa fa-plus my-float"></i>
        </a>
        <div class="label-container">
            <div class="label-text">ثبت آنالیز</div>
        </div>
    </div>
</template>

<script>

    export default {

        name: "analysis-chart",

        data() {

            return {

                data: {
                    
                },

            };

        },

        created() {

            this.onChartReady();

        },

        methods: {

            onChartReady() {

                TradingView.onready(this.prepareWidget);

            },

            prepareWidget() {

                let widget = window.tvWidget = new TradingView.widget({
                    // debug: true, // uncomment this line to see Library errors and warnings in the console
                    fullscreen: true,
                    symbol: 'AAPL',
                    interval: 'D',
                    container_id: "tv_chart_container",
                    //	BEWARE: no trailing slash is expected in feed URL
                    datafeed: new Datafeeds.UDFCompatibleDatafeed("https://demo_feed.tradingview.com"),
                    library_path: "/chart/charting_library/",
                    locale: this.getParameterByName('lang') || "en",
                    //	Regression Trend-related functionality is not implemented yet, so it's hidden for a while
                    drawings_access: {type: 'black', tools: [{name: "Regression Trend"}]},
                    disabled_features: ["use_localstorage_for_settings"],
                    enabled_features: ["study_templates"],
                    charts_storage_url: 'http://saveload.tradingview.com',
                    charts_storage_api_version: "1.1",
                    client_id: 'tradingview.com',
                    user_id: 'public_user_id'
                });
            },

            getParameterByName(name) {
                name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                let regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                    results = regex.exec(location.search);
                return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            },

            add() {

                tvWidget.onChartReady(function () {

                    tvWidget.save(function (data) {
                        console.log(data.charts);
                    });

                });
            }

        },
    }
</script>

<style scoped>

</style>