<div id="disqus_thread"></div>
<script>
     var disqus_config = function () {
         this.page.url = '{{ url('/article') }}/{{ $slug }}';
         this.page.identifier = 'article-{{ $slug }}';
     };
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '//ciyuanai.disqus.com/embed.js';
        s.setAttribute('data-timestamp', + new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>