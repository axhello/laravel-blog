//Menu Component
Vue.component('menu',{
    template: '#menu-list',
    data: function() {
        return{
            pagination: {
                total: 0,
                per_page: 6,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,
            pages: [],
            cates: [],
            taller: '',
            switch: false
        }
    },
    ready: function() {
        this.firstLoad();
    },
    methods:{
        firstLoad: function () {
            this.$http.get('/category').then(function(category) {
                this.cates = category.data;
                var Url= '/classification/'+this.cates[0].id;
                var data = { page: 1 };
                this.taller = this.cates[0].id;
                this.$broadcast('show-list', this.taller);
                this.$http.get(Url, data).then(function(response) {
                    this.$broadcast('child-list', response.data.data.data);
                    this.$set('pagination', response.data.pagination);
                    if (!this.pagination.to) {
                        return [];
                    }
                    var from = this.pagination.current_page - this.offset;
                    if (from < 1) {
                        from = 1;
                    }
                    var to = from + (this.offset * 2);
                    if (to >= this.pagination.last_page) {
                        to = this.pagination.last_page;
                    }
                    var pages = [];
                    while (from <= to) {
                        pages.push(from);
                        from++;
                    }
                    this.$set('pages',pages);
                });
            });
        },
        toggleHeight: function(id) {
            this.taller = id;
            var data = { page: 1 };
            this.$broadcast('show-list', this.taller);
            this.$http.get('/classification/'+id, data).then(function(resp) {
                this.$broadcast('for-list', resp.data.data.data);
                this.$set('pagination', resp.data.pagination);
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pages = [];
                while (from <= to) {
                    pages.push(from);
                    from++;
                }
                this.$set('pages',pages);
            });
        },
        toggleSwitch: function () {
            this.switch =! this.switch;
            this.$broadcast('toggle-switch', this.switch);
        },
        fetchItems: function (page) {
            var data = { page: page };
            this.$http.get('/classification/'+this.taller, data).then(function (response) {
                this.$broadcast('page-list', response.data.data.data);
            }, function (error) {
                // handle error
            });
        },
        changePage: function (page) {
            this.pagination.current_page = page;
            this.fetchItems(page);
        }
    }
});
//Articles Component
Vue.component('articles', {
    template: '#articles-template',
    data: function() {
        return {
            lists: [],
            tags: [],
            show: '',
            toggleImg: true,
            switch: false
        }
    },
    events: {
        'child-list': function (res) {
            this.lists = res;
        },
        'show-list': function(show) {
            this.show = show;
        },
        'for-list': function(data) {
            this.lists = data;
        },
        'page-list': function (pages) {
            this.lists = pages;
        },
        'toggle-switch': function (switchs) {
            this.switch = switchs;
        }
    }
});
//字符串过滤
Vue.filter('except', function (value, number) {
    //提取部分字符串作为摘要
    return value.slice(0, -(value.length - number)) + '...'
});
//makrdown过滤
Vue.filter('marked', function (content) {
    //markdown转为html后去掉html标签
    return marked(content).replace(/<[^>]+>/g,"");
});

Vue.validator('email', function (val) {
    return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(val)
});

Vue.component('custom-error', {
    props: ['field', 'validator', 'message'],
    template: '<p class="error-{{field}}-{{validator}}">{{message}}</p>'
});

//绑定到#app
new Vue({el:'#app'});
