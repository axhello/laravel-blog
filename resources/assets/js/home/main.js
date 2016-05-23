new Vue({
    el:'body',
    data: function () {
        return{
            toggleImg: false,
            sidebar: false
        }
    },
    methods: {
        toggleSwitch: function() {
            this.toggleImg =! this.toggleImg;
        },
        toggleSidebar: function() {
            this.sidebar =! this.sidebar;
        }
    }
});

Vue.validator('url', function (val) {
    return /^(http\:\/\/|https\:\/\/)(.{4,})$/.test(val);
});

Vue.validator('email', function (val) {
    return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(val);
});

hljs.initHighlightingOnLoad();