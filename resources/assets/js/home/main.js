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