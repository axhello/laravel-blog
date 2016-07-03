new Vue({
    el: 'body',
    data: {
        isOpen: false
    },
    methods: {
        toggleNav: function() {
            this.isOpen = !this.isOpen;
        }
    }
})