new Vue({
    el:'body',
    data: function () {
        return{
            toggleImg: false
        }
    },
    methods: {
        toggleSwitch: function() {
            this.toggleImg =! this.toggleImg;
        }
    }
});

Vue.validator('email', function (val) {
    return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(val)
});

hljs.initHighlightingOnLoad();